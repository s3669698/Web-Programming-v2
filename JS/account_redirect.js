const toAccount = document.getElementById('myAccount');
toAccount.addEventListener("click", redirectAccount);

function redirectAccount (){
    if (typeof (Storage) !== 'undefined') {
        if (localStorage.getItem("userLogin") === null) {
            window.location.href = "login.html";
        }
        else {
            window.location.href = "logged-in.html"
        }
    }
}