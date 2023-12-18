

document.addEventListener('DOMContentLoaded', function () {
    // Fetch and inject the header content
    fetch('header.html')
        .then(response => response.text())
        .then(html => document.body.insertAdjacentHTML('afterbegin', html));
});

function redirectToordernow() {
    window.location.href = 'ordernow.html';
}
