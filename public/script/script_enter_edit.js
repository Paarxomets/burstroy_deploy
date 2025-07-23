document.addEventListener('DOMContentLoaded', () => {
    const enterButton = document.getElementById('enter_button'); 
    const login = 'admin';
    const pass = 'admin';

    enterButton.addEventListener('click', function() {
        const inputLogin = document.getElementById("usernameInput").value;
        const inputPass = document.getElementById("passInput").value;      

        if (login === inputLogin && pass === inputPass) {
            sessionStorage.setItem('isAuthenticated', 'true');
            window.location.href = "ad_edit_articles.html";   
        } else {
            setTimeout(() => { window.location.href = "index.html"; }, 100);
            alert('Неверный логин или пароль!');
        }
    });
});