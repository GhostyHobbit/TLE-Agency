document.addEventListener('DOMContentLoaded', function() {
    let page = 1;
    const vacanciesContainer = document.getElementById('vacancies');

    window.addEventListener('scroll', () => {
        if (window.innerHeight + window.scrollY >= document.body.offsetHeight) {
            page++;
            loadMoreVacancies(page);
        }
    });

    function loadMoreVacancies(page) {
        fetch(`/vacancies?page=${page}`)
            .then(response => response.text())
            .then(data => {
                const parser = new DOMParser();
                const htmlDocument = parser.parseFromString(data, 'text/html');
                const newVacancies = htmlDocument.getElementById('vacancies').innerHTML;
                vacanciesContainer.insertAdjacentHTML('beforeend', newVacancies);
            })
            .catch(error => console.error('Error loading more vacancies:', error));
    }
});
