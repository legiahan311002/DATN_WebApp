function checkPasswordMatch() {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("password-confirm").value;
    var errorElement = document.getElementById("password-match-error");

    if (password !== confirmPassword) {
        errorElement.textContent = "Mật khẩu không khớp.";
    } else {
        errorElement.textContent = "";
    }
}