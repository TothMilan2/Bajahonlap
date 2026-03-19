// Jelszó megjelenítése/elrejtése
function togglePassword(inputId, iconElement) {
    const passwordInput = document.getElementById(inputId);
    
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        iconElement.classList.replace("bi-eye", "bi-eye-slash");
    } else {
        passwordInput.type = "password";
        iconElement.classList.replace("bi-eye-slash", "bi-eye");
    }

}

const registerBtn = document.getElementById('register-btn');
const loginBtn = document.getElementById('login-btn');
const loginForm = document.getElementById('login-form');
const registerForm = document.getElementById('register-form');

registerBtn.addEventListener('click', () => {
    loginForm.style.display = 'block';
    registerForm.style.display = 'none';
});

loginBtn.addEventListener('click', () => {
    registerForm.style.display = 'block';
    loginForm.style.display = 'none';
});