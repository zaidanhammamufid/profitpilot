document.getElementById('signupForm').addEventListener('submit', function (event) {
    let username = document.getElementById('username').value.trim();
    let password = document.getElementById('password').value.trim();
    let confirmPassword = document.getElementById('confirmPassword').value.trim();

    if (username === '' || password === '' || confirmPassword === '') {
        event.preventDefault();
        alert('Semua data harus diisi!');
        return;
    }

    if (password !== confirmPassword) {
        event.preventDefault();
        alert('Konfirmasi password tidak cocok!');
        return;
    }
});
