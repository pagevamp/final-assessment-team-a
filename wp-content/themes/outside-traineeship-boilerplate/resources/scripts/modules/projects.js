document.addEventListener("DOMContentLoaded", function () {
    const filterButtons = document.querySelectorAll(".filter-btn");
    const filterDropdown = document.getElementById("filter__categories");
    const projectListContainer = document.querySelector(".project-wrapper");

    let currentFilter = getUrlParameter('project-type') || 'all'; 
    let currentPage = parseInt(getUrlParameter('page')) || 1; 

    var screenWidth = window.innerWidth;

    // Function to load filtered projects
    function loadFilteredProjects(filter, page, updateUrl = false) {
        currentFilter = filter || 'all';
        currentPage = page || 1;

        const data = new FormData();
        data.append('action', 'filter_action');
        data.append('filter', currentFilter);
        data.append('page', currentPage);
        data.append('screen', screenWidth); // Pass the dynamic screen width here

        // Update the URL slug only if `updateUrl` is true
        if (updateUrl) {
            updateUrlSlug(currentFilter, currentPage);
        }

        // Fetch the filtered projects
        fetch(ajax_object.ajax_url, {
            method: 'POST',
            body: data,
        })
        .then(response => response.text())
        .then(responseText => {
            projectListContainer.innerHTML = responseText;

            // Reinitialize pagination click listeners after content is replaced
            initPaginationClick();

            // Highlight the selected filter button after the projects are loaded
            highlightSelectedFilterButton(currentFilter);

            // Update dropdown to match selected filter
            if (filterDropdown) {
                filterDropdown.value = currentFilter;
            }
        })
        .catch(error => console.error('Error fetching filtered projects:', error));
    }

    // Function to update the URL
    function updateUrlSlug(filter, page) {
        const newUrl = `${window.location.origin}${window.location.pathname}?project-type=${filter}&page=${page}`;
        history.pushState({ filter }, '', newUrl);
    }

    // Function to get URL parameters
    function getUrlParameter(name) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(name);
    }

    // Initialize filter dropdown
    if (filterDropdown) {
        filterDropdown.addEventListener("change", function () {
            const filter = this.value;
            loadFilteredProjects(filter, currentPage, true); 
        });
    }

    // Initialize filter buttons
    filterButtons.forEach((button) => {
        button.addEventListener("click", (e) => {
            const filter = e.currentTarget.getAttribute('data-filter');

            filterButtons.forEach((btn) => {
                btn.classList.remove("text-neutral-600");
                btn.classList.add("text-neutral-200");
            });

            const clickedButton = e.currentTarget;
            clickedButton.classList.remove("text-neutral-200");
            clickedButton.classList.add("text-neutral-600");

            loadFilteredProjects(filter, currentPage, true); 
        });
    });

    // Function to highlight the active filter button
    function highlightSelectedFilterButton(filter) {
        filterButtons.forEach((button) => {
            if (button.getAttribute('data-filter') === filter) {
                button.classList.remove("text-neutral-200");
                button.classList.add("text-neutral-600");
            } else {
                button.classList.remove("text-neutral-600");
                button.classList.add("text-neutral-200");
            }
        });
    }

    // Initialize pagination click listeners
    function initPaginationClick() {
        const paginationLinks = document.querySelectorAll(".pagination .pagination-link");
        paginationLinks.forEach((link) => {
            link.addEventListener("click", () => {
                let page = parseInt(link.getAttribute('data-page'));
                if (page) {
                    currentPage = page; 
                    highlightActivePagination(page); 
                    loadFilteredProjects(currentFilter, page, true); 
                }
            });
        });

        const prevPage = document.querySelector(".pagination .prev-page");
        if (prevPage) {
            prevPage.addEventListener("click", () => {
                let page = ((currentPage - 1) < 1) ? 1 : (currentPage - 1);
                currentPage = page; 
                highlightActivePagination(page); 
                loadFilteredProjects(currentFilter, page, true); 
            });
        }

        const nextPage = document.querySelector(".pagination .next-page");
        if (nextPage) {
            nextPage.addEventListener("click", () => {
                let page = currentPage + 1;
                currentPage = page; 
                highlightActivePagination(page);
                loadFilteredProjects(currentFilter, page, true); 
            });
        }

        // Highlight the current active page on initial load
        highlightActivePagination(currentPage);
    }

    // Function to highlight the active pagination button
     function highlightActivePagination(activePage) {
        const paginationLinks = document.querySelectorAll(".pagination-link");
        paginationLinks.forEach(link => {
            const page = parseInt(link.getAttribute('data-page'));
            if (page === activePage) {
                link.style.backgroundColor = "#D72027"; 
                link.style.borderColor = "#D72027"; 
                link.style.color = "#FFFFFF"; 
            } else {
                link.style.backgroundColor = ""; 
                link.style.color = ""; 
            }
        });
    }

    // Event listener for screen resize
    window.addEventListener('resize', () => {
        screenWidth = window.innerWidth; // Update the screen width

        // Trigger a reload of posts with the updated screen width
        loadFilteredProjects(currentFilter, currentPage);

        // Ensure the dropdown stays selected
        if (filterDropdown) {
            filterDropdown.value = currentFilter;
        }
    });

    // Initial call to load projects
    loadFilteredProjects(currentFilter, currentPage);
});
