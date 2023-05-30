navbar = document.querySelector('.header .flex .navbar');

document.querySelector('#menu-btn').onclick = () => {
    navbar.classList.toggle('active');
    profile.classList.remove('active');
}



profile = document.querySelector('.header .flex .profile');

document.querySelector('#user-btn').onclick = () => {
    profile.classList.toggle('active');
    navbar.classList.remove('active');

}


window.onscroll = () => {
    navbar.classList.remove('active');
    profile.classList.remove('active');
}




document.querySelectorAll('input[type="number"]').forEach(input => {
    input.oninput = () => {
        if (input.ariaValueMax.length > input.maxLength) input.value = input.value.slice(0, input.maxLength);
    }
});