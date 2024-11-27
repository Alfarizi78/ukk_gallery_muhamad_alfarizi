import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

function setTheme(theme) {
    document.body.classList.remove('dark', 'light');
    document.body.classList.add(theme);
    localStorage.setItem('theme', theme);
}

const toggleButton = document.getElementById('theme-toggle');
const icon = document.getElementById('icon');
const toggleText = document.getElementById('toggle-text');

document.addEventListener('DOMContentLoaded', () => {
    const savedTheme = localStorage.getItem('theme') || 'light';
    setTheme(savedTheme);

    if (savedTheme === 'dark') {
        icon.classList.remove('fa-sun');
        icon.classList.add('fa-moon');
        toggleText.textContent = 'Dark';
    } else {
        icon.classList.remove('fa-moon');
        icon.classList.add('fa-sun');
        toggleText.textContent = 'Light';
    }
});

toggleButton?.addEventListener('click', () => {
    const currentTheme = document.body.classList.contains('dark') ? 'light' : 'dark';
    setTheme(currentTheme);

    if (currentTheme === 'dark') {
        icon.classList.remove('fa-sun');
        icon.classList.add('fa-moon');
        toggleText.textContent = 'Dark';
    } else {
        icon.classList.remove('fa-moon');
        icon.classList.add('fa-sun');
        toggleText.textContent = 'Light';
    }
});
