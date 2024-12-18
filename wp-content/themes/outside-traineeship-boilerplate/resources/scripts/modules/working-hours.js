document.addEventListener('DOMContentLoaded', ()=> {
    let workingHoursDescriptions = document.querySelectorAll('.working-hours__desc');

    workingHoursDescriptions.forEach(workingHoursDescription => {
        if (window.innerWidth < 700) {
            workingHoursDescription.classList.remove('h6');
            workingHoursDescription.classList.add('sh3');
        } else {
            workingHoursDescription.classList.remove('sh3');
            workingHoursDescription.classList.add('h6');
        }
    });
});