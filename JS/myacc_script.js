document.getElementById('currentUser').value = localStorage.getItem('userLogin');

const logoutBtn = document.getElementById('logout-btn');
logoutBtn.addEventListener("click", logOut);

function logOut() {
    if (typeof (Storage) !== 'undefined') {
        localStorage.removeItem('userLogin');
        window.location.href = "login.html";
    }
}