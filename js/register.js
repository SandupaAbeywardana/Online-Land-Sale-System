function myFunction(){

    var statuschk = document.getElementById("viewPassword").checked;

    if(statuschk == true){
        document.getElementById("pwd").type = "text";
        document.getElementById("confirmPwd").type = "text";
    }

    else if(statuschk == false){
        document.getElementById("pwd").type = "password";
        document.getElementById("confirmPwd").type = "password";
    }

}

var regForm = document.getElementById("regForm");
regForm.addEventListener('submit', function (e) {
    e.preventDefault();

    var pwd = document.getElementById('pwd').value;
    var confirmPwd = document.getElementById('confirmPwd').value;

    if(pwd == confirmPwd){
        regForm.submit();
    }
    else{
        alert("Passwords do not Match!");
    }

});
