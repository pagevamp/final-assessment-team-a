document.addEventListener("DOMContentLoaded", function () {
    const filterButtons = document.querySelectorAll(".filter-btn");
    const filterDropdown = document.getElementById("filter__categories");
    const projectListContainer = document.querySelector(".project-wrapper");
    const paginationContainer = document.getElementById("pagination");

    function loadFilteredProjects(filter, page) {
        const data = new FormData();
        data.append('action', 'filter_action');
        data.append('filter', filter || 'all'); // Default to 'all' if no filter is provided
        data.append('page', page || 1); // Default to page 1 if no page is provided

        // Update the URL with the selected filter and page
        updateUrlSlug(filter, page);

        // Make the fetch request to WordPress AJAX handler
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

    function updateUrlSlug(filter, page) {
        const newUrl = `${window.location.origin}${window.location.pathname}?project-type=${filter}&page=${page}`;
        history.pushState({ filter, page }, '', newUrl);
    }

    function getUrlParameter(name) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(name);
    }

    const initialFilter = getUrlParameter('project-type') || 'all';
    const initialPage = parseInt(getUrlParameter('page')) || 1;

    loadFilteredProjects(initialFilter, initialPage);

    if (filterDropdown) {
        filterDropdown.addEventListener("change", function () {
            const filter = this.value;
            loadFilteredProjects(filter, 1);
        });
    }

    filterButtons.forEach((button) => {
        button.addEventListener("click", (e) => {
            const filter = e.currentTarget.getAttribute('data-filter');
            loadFilteredProjects(filter, 1);
        });
    });

    function initPaginationClick() {
        const paginationLinks = document.querySelectorAll("#pagination a");
        paginationLinks.forEach((link) => {
            link.addEventListener("click", (e) => {
                e.preventDefault();
                const page = new URL(link.href).searchParams.get('paged');
                loadFilteredProjects(initialFilter, page);
            });
        });
    }

    initPaginationClick();
});
