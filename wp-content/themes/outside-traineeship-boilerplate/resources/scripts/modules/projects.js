document.addEventListener("DOMContentLoaded", function () {
    const filterButtons = document.querySelectorAll(".filter-btn");
    const filterDropdown = document.getElementById("filter__categories");
    const projectListContainer = document.querySelector(".project-wrapper");

    let currentFilter = getUrlParameter('project-type') || 'all';
    let currentPage = parseInt(getUrlParameter('page')) || 1;

    let screenWidth = window.innerWidth;

 
    function loadFilteredProjects(filter, page, updateUrl = false) {
        currentFilter = filter || 'all';
        currentPage = page || 1;

        const data = new FormData();
        data.append('action', 'filter_action');
        data.append('filter', currentFilter);
        data.append('page', currentPage);
        data.append('screen', screenWidth);

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

            initPaginationClick();
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
        let newUrl = `${window.location.origin}${window.location.pathname}`;
        const params = new URLSearchParams();

        if (filter !== 'all') {
            params.append('project-type', filter);
        }

        if (page > 1) {
            params.append('page', page);
        }

        const queryString = params.toString();
        if (queryString) {
            newUrl += `?${queryString}`;
        }

        history.pushState({ filter }, '', newUrl);
    }

    function getUrlParameter(name) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(name);
    }

    if (filterDropdown) {
        filterDropdown.addEventListener("change", function () {
            const filter = this.value;
            currentPage = 1; // Reset to page 1
            loadFilteredProjects(filter, currentPage, true);
        });
    }

    filterButtons.forEach((button) => {
        button.addEventListener("click", (e) => {
            const filter = e.currentTarget.getAttribute('data-filter');

            // Setting the current page to 1 when a filter is clicked
            currentPage = 1;

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
        highlightActivePagination(currentPage);
    }


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


    window.addEventListener('resize', () => {
        screenWidth = window.innerWidth;

        loadFilteredProjects(currentFilter, currentPage);

        if (filterDropdown) {
            filterDropdown.value = currentFilter;
        }
    });


    loadFilteredProjects(currentFilter, currentPage);
});
