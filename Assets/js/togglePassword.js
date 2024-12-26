
const passwordInput = document.getElementById("password");
const togglePassword = document.getElementById("togglePassword");

togglePassword.addEventListener("click", function () {
    // Toggle jenis input antara 'password' dan 'text'
    const type = passwordInput.type === "password" ? "text" : "password";
    passwordInput.type = type;

    // Ganti icon atau teks pada tombol
    this.textContent = type === "password" ? "👁️" : "🙈";
});