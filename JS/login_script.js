const loginBtn = document.getElementById('login-btn');
loginBtn.addEventListener("click", validLogin);

function validLogin() {
    let userLogin = document.getElementById('userLogin').value;
    let userPwd = document.getElementById('userPwd').value;
    if (typeof (Storage) !== 'undefined') {
        if (userPwd == "password") {
            document.getElementById("wrongPwd").innerHTML = '';
            localStorage.setItem("userLogin", userLogin);
            window.location.href = "logged-in.html";
        }
        else {
            document.getElementById("wrongPwd").innerHTML = '<p style="color: red; font-size: 14px"> Invalid password! (pst, it\'s "password")</p>'
            document.getElementById("userPwd").value = '';
        }
    }
}