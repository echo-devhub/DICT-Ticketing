
// menu bar

const menu_bar = document.querySelector('.menu_bar');

menu_bar.addEventListener('click', function () {

    // get ref app navigation
    const app_nav = document.querySelector('.app_navigation');

    app_nav.classList.toggle('toggle');
    
});