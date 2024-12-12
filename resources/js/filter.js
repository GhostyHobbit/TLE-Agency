document.getElementById('filter-form').addEventListener('submit', function(e) {
    e.preventDefault();
    fetchVacancies();
});

function fetchVacancies() {
    const location = document.getElementById('location').value;
    const hours = document.getElementById('hours').value;

    fetch(`vacancies?location=${location}&hours=${hours}`, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
        .then(response => response.text())
        .then(data => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(data, 'text/html');
            const newVacancies = doc.getElementById('vacancies').innerHTML;
            document.getElementById('vacancies').innerHTML = newVacancies;
        });
}
