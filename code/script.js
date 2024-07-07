function scrollToSection(sectionId) {
    const section = document.getElementById(sectionId);
    section.scrollIntoView({ behavior: 'smooth' });
}

const accountButton = document.querySelector('.account');
const accountContainer = accountButton.parentNode;

const options = document.createElement('div');
options.innerHTML = `
    <div class="option-card"><a href="#">Gmail</a></div>
    <div class="option-card"><a href="#">Logout</a></div>
`;
options.style.display = 'none';

accountButton.addEventListener('click', () => {
    if (options.style.display === 'none') {
        options.style.display = 'block';
        accountContainer.classList.add('hide-account');
    } else {
        options.style.display = 'none';
        accountContainer.classList.remove('hide-account');
    }
});

accountContainer.insertBefore(options, accountButton.nextSibling);
