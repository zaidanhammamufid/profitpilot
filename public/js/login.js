document.getElementById('loginForm').addEventListener('submit', function (event) {
    let username = document.getElementById('username').value.trim();
    let password = document.getElementById('password').value.trim();

    if (username === '' || password === '') {
        event.preventDefault();
        alert('Username dan password harus diisi!');
    }
});
