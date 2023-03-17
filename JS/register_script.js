const regBtn = document.getElementById('register-btn');
regBtn.addEventListener("click", inputValidation);

function inputValidation () {
    var regEmail = document.getElementById('regEmail').value;

    var regPhone = document.getElementById('regPhone').value;

    var regPwd = document.getElementById('regPwd').value;
    var regRetype = document.getElementById('regRetype').value;

    var regFName = document.getElementById('regFName').value;
    var regLName = document.getElementById('regLName').value;

    var regAddress = document.getElementById('regAddress').value;
    var regCity = document.getElementById('regCity').value;

    var regZip = document.getElementById('regZip').value;

    // Email regex pattern (PSEUDO, works quite well except for edge cases, needs improvements)
    // (?!\.) = no dot at the beginning
    // (?!.*\.\.) = no consecutive dots 
    // ([\w.]+) = there must be some word character
    // [^.]@[^.] = no dot before and after '@' sign 
    // [\w]+(\.(\w+))* = domain followed by a dot and the the rest (optional)
    // (\.([A-Za-z]{2,5}))$ = making sure the last part after the last dot
    // has minimum of 2 and maximum of 5 characters

    var emailPattern = /^(?!\.)(?!.*\.\.)([\w.]+)[^.]@[^.](?!.*\.\.)[\w]+(\.(\w+))*(\.([A-Za-z]{2,5}))$/gm;
    if (!emailPattern.test(regEmail)){
        document.getElementById("alertEmail").innerHTML = '<p style="color: red; font-size: 14px; text-align: left">Email cannot begin/end with period (before/after @ sign), no consecutive periods and min of 2, max of 5 characters for last domain</p>'    }
    else {
        document.getElementById("alertEmail").innerHTML = ''
    }


    // Phone number regex pattern (PSEUDO ONLY, not fully working due to 
    // the complexity of the regex requirements)
    var phonePattern = /^(?!-| |\.)(?!.*(--|  |\.\.|-\.|- | -| \.|\.-|\. ))([0-9-. ]{9,22})(?<!(-| |\.))$/;

    if (!phonePattern.test(regPhone)){
        document.getElementById("alertPhone").innerHTML = '<p style="color: red; font-size: 14px; text-align: left">Must start and end with a digit, 9-12 digits total,no consecutive dash/space/dot!</p>'    }
    else {
        document.getElementById("alertPhone").innerHTML = ''
    }


    // Password regex pattern
    // (?!.*\s) = no whitespace characters
    // (?=.*\d) = at least 1 digit
    // (?=.*[!@#\$%\^&\*]) = at least 1 special character from set !@#$%^&*
    // (?=.*[A-Z]) = at least 1 upper-case letter
    // (?=.*[a-z]) = at least 1 lower-case letter
    // (.{8,20}) = minimum length 8 and maximum of 20
    var pwdPatern = /^(?!.*\s)(?=.*\d)(?=.*[!@#\$%\^&\*])(?=.*[A-Z])(?=.*[a-z])(.{8,20})$/;

    if (!pwdPatern.test(regPwd)){
        document.getElementById("alertPwd").innerHTML = '<p style="color: red; font-size: 14px; text-align: left">Password must contain lowercase, uppercase, digit and special characters!</p>'    }
    else {
        document.getElementById("alertPwd").innerHTML = ''
    }

    if (!(regRetype == regPwd)){
        document.getElementById("alertRetype").innerHTML = '<p style="color: red; font-size: 14px; text-align: left">Re-entered password does not match!</p>'  
    }
    else {
        document.getElementById("alertPwd").innerHTML = ''
    }    
    
    // Name regex pattern
    var generalPattern = /^(\D{3,})$/;
    
    if (!generalPattern.test(regFName) || !generalPattern.test(regLName)){
        document.getElementById("alertName").innerHTML = '<p style="color: red; font-size: 14px; text-align: left">Name can only contain letters, minimum of 3 characters!</p>'
    }
    else {
        document.getElementById("alertName").innerHTML = ''
    }

    if (!generalPattern.test(regAddress)){
        document.getElementById("alertAddress").innerHTML = '<p style="color: red; font-size: 14px; text-align: left">Address can only contain letters, minimum of 3 characters!</p>'
    }
    else {
        document.getElementById("alertAddress").innerHTML = ''
    }


    if (!generalPattern.test(regCity)){
        document.getElementById("alertCity").innerHTML = '<p style="color: red; font-size: 14px; text-align: left">City can only contain letters, minimum of 3 characters!</p>'
    }
    else {
        document.getElementById("alertCity").innerHTML = ''
    }

    // Zipcode regex pattern
    var zipPattern = /^(\d{4,6})$/;

    if (!zipPattern.test(regZip)){
        document.getElementById("alertZip").innerHTML = '<p style="color: red; font-size: 14px; text-align: left">Zipcode must contain minimum of 4 and maximum of 6 characters!</p>'
    }
    else {
        document.getElementById("alertZip").innerHTML = ''
    }

}