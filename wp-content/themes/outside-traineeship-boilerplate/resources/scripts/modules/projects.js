document.addEventListener("DOMContentLoaded", function () {
    const filterButtons = document.querySelectorAll(".filter-btn");
    const filterDropdown = document.getElementById("filter__categories");
    const projectListContainer = document.querySelector(".project-wrapper");

    // Function to load filtered projects based on the filter selected
    function loadFilteredProjects(filter, page = 1) {
        const data = new FormData();
        data.append('action', 'filter_action');
        data.append('filter', filter);
        data.append('page', page);
        // Make the fetch request to WordPress AJAX handler
        
        fetch(ajax_object.ajax_url, {
            method: 'POST',
            body: data,
        })
        .then(response => response.text())
        .then(responseText => {
            projectListContainer.innerHTML = responseText;
        })
        .catch(error => console.error('Error fetching filtered projects:', error));
    }


    if (filterDropdown) {
        filterDropdown.addEventListener("change", function () {
            const filter = this.value;
            loadFilteredProjects(filter);
        });
    }

    // Handle filter button clicks (Desktop)
    filterButtons.forEach((button) => {
        button.addEventListener("click", (e) => {
            const clickedButton = e.currentTarget;
            let filter = clickedButton.getAttribute('data-filter');
            // Apply AJAX to filter the projects
            loadFilteredProjects(filter);

            filterButtons.forEach((btn) => {
                if (btn.classList.contains("text-neutral-600")) {
                    btn.classList.remove("text-neutral-600");
                    btn.classList.add("text-neutral-200");
                }
            });

            if (clickedButton.classList.contains("text-neutral-200")) {
                clickedButton.classList.remove("text-neutral-200");
                clickedButton.classList.add("text-neutral-600");
            }
        });
    });
});
