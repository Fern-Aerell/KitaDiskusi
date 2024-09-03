document.getElementById('search_form').addEventListener('submit', function(event) {
    event.preventDefault();

    const form = event.target;
    const currentUrl = new URL(window.location.href);
    const formData = new FormData(form);

    formData.forEach((value, key) => {
        currentUrl.searchParams.set(key, value);
    });

    window.location.href = currentUrl.toString();
});