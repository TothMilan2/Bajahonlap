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