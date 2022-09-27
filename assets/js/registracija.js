document.getElementById("btnReg").addEventListener("click", proveraReg);


function proveraReg(){
    let ime, prezime, email, username, password, validno;
    ime = $('#tbIme').val();
    prezime = $('#tbPrezime').val();
    email = $('#tbEmail').val();
    username = $('#tbUsername').val();
    password = $('#tbPassword').val();
    validno = true;

    let reImePrezime, reEmail;
    reImePrezime=/^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})*$/;
    reEmail=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

    let imeGreska, prezimeGreska, emailGreska, userGreska, passGreska;
    imeGreska=document.getElementById("imeGreska");
    prezimeGreska=document.getElementById("prezimeGreska");
    emailGreska=document.getElementById("emailGreska");
    userGreska=document.getElementById("userGreska");
    passGreska=document.getElementById("passGreska");


    if (ime == ""){
        validno = false;
        imeGreska.innerHTML = "Molimo unesite ime";
    }
    else if (!reImePrezime.test(ime)){
            validno = false;
            imeGreska.innerHTML = "Ime nije u ispravnom formatu";
    }
    else{
            imeGreska.innerHTML = "";
    }

    if (prezime == ""){
        validno = false;
        prezimeGreska.innerHTML = "Molimo unesite prezime";
    }
    else if (!reImePrezime.test(prezime)){
            validno = false;
            prezimeGreska.innerHTML = "Prezime nije u ispravnom formatu";
    }
    else{
        prezimeGreska.innerHTML = "";
    }
    if (email == ""){
        validno = false;
        emailGreska.innerHTML = "Molimo unesite email";
    }
    else if (!reEmail.test(email)){
            validno = false;
            emailGreska.innerHTML = "Email nije u ispravnom formatu";
    }
    else{
        emailGreska.innerHTML = "";
    }
    if (username == ""){
        validno = false;
        userGreska.innerHTML = "Molimo unesite username";
    }
    else if (username.length>50){
            validno = false;
            userGreska.innerHTML = "Username je predugacak";
    }
    else{
        userGreska.innerHTML = "";
    }
    if (password == ""){
        validno = false;
        passGreska.innerHTML = "Molimo unesite password";
    }
    else if (password.length>50){
            validno = false;
            passGreska.innerHTML = "Password je predugacak";
    }
    else{
        passGreska.innerHTML = "";
    }

    if(validno){
        var podaciZaSlanje={
            ime:ime,
            prezime:prezime,
            email:email,
            username:username,
            password:password
        }

        ajaxCallBack("models/registracija_upis.php","post",podaciZaSlanje,function(result){
            $("#odgovor").html(result.poruka);
        });
    }
}

function ajaxCallBack(url,method,data,result){
    $.ajax({
        url:url,
        method:method,
        data:data,
        dataType:"json",
        success:result,
        error: function(xhr){
            $("#odgovor").html(xhr.responseJSON.poruka);
        }
    });
}