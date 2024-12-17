document.addEventListener("DOMContentLoaded", function () {
    const filterButtons = document.querySelectorAll(".filter-btn");
    const filterDropdown = document.getElementById("filter__categories");
    const projectListContainer = document.querySelector(".project-wrapper");
    const paginationContainer = document.getElementById("pagination");

    let currentFilter = getUrlParameter('project-type') || 'all'; // Track the active filter
    let currentPage = parseInt(getUrlParameter('page')) || 1; // Track the active page

    // Function to load filtered projects
    function loadFilteredProjects(filter, page) {
        currentFilter = filter || 'all';
        currentPage = page || 1;

        const data = new FormData();
        data.append('action', 'filter_action');
        data.append('filter', currentFilter);
        data.append('page', currentPage);

        // Update the URL slug to reflect filter and page
        updateUrlSlug(currentFilter, currentPage);

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
        })
        .catch(error => console.error('Error fetching filtered projects:', error));
    }

    // Function to update the URL
    function updateUrlSlug(filter) {
        const newUrl = `${window.location.origin}${window.location.pathname}?project-type=${filter}`;
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
            loadFilteredProjects(filter, currentPage);
        });
    }

    // Initialize filter buttons
    filterButtons.forEach((button) => {
        button.addEventListener("click", (e) => {
            const filter = e.currentTarget.getAttribute('data-filter');
            loadFilteredProjects(filter, currentPage);
        });
    });

    // Initialize pagination click listeners
    function initPaginationClick() {
        const paginationLinks = document.querySelectorAll(".pagination .pagination-link");
        paginationLinks.forEach((link) => {

            link.addEventListener("click", () => {
                let page = link.getAttribute('data-page');
                if (page) {
                    loadFilteredProjects(currentFilter, page);
                }
            })
        });

        const prevPage = document.querySelector(".pagination .prev-page");
        prevPage.addEventListener("click", () => {
            let page = ((currentPage - 1) < 1) ? 1 : (currentPage - 1);
            loadFilteredProjects(currentFilter, page)
        })
        const nextPage = document.querySelector(".pagination .next-page");
        nextPage.addEventListener("click", () => {
            let page = currentPage + 1;
            loadFilteredProjects(currentFilter, page)
        })
    }

    // Initial load based on URL parameters
    loadFilteredProjects(currentFilter, currentPage);
});
