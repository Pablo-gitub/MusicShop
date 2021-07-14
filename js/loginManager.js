$(document).ready(function() {

    let snackbar = document.getElementById('snackbar');
    snackbar.textContent = 'Wrong credentials';
    snackbar.className = 'show';
    setTimeout(() => (snackbar.className = snackbar.className.replace('show', '')), 1000);

});