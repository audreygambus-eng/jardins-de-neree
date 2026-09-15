const burger = document.querySelector('.nav-burger');
const liens = document.querySelector('.nav-liens');

burger.addEventListener('click', () => {
    const ouvert = liens.classList.toggle('ouvert');
    burger.setAttribute('aria-expanded', ouvert);
    burger.setAttribute('aria-label', ouvert ? 'Fermer le menu' : 'Ouvrir le menu');
});