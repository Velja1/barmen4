//Efekat zebre na tabeli
$(document).ready(function(){
    $('#tabela tbody tr:even').css('background-color','#dddddd');
    
    $('#tabela tbody tr:odd').hover(function(){
        $(this).css('background-color','#f0f0f0');
    },
    function(){
        $(this).css('background-color','#fff');
    });
});

//Provera forme
try{
    document.getElementById("btnPosalji").addEventListener("click", provera);
}
catch{
}

function provera(){
    let validno=true;
    
    let datum, plovilo, dodatniZahtevi;
    datum=document.getElementById("tbDatum").value.trim();
    plovilo=document.getElementById("selectPlovilo").value;
    dodatniZahtevi=document.getElementById("tbDodatni").value.trim();

    let reDatum;
    reDatum=/^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))$/;

    let datumGreska, ploviloGreska, dodatniZahteviGreska;
    datumGreska=document.getElementById("datumGreska");
    ploviloGreska=document.getElementById("ploviloGreska");
    dodatniZahteviGreska=document.getElementById("dodatniGreska");


    if (datum == ""){
        validno = false;
        datumGreska.innerHTML = "Molimo unesite datum posete";
    }
    else if (!reDatum.test(datum)){
            validno = false;
            datumGreska.innerHTML = "Datum posete nije u ispravnom formatu";
    }
    else{
        datumGreska.innerHTML = "";
    }

    if(plovilo == "0"){
        validno = false;
        ploviloGreska.innerHTML = "Niste izabrali plovilo";
    }
    else{
        ploviloGreska.innerHTML = "";
    }


    if (dodatniZahtevi.length>1000){
        validno = false;
        dodatniZahteviGreska.innerHTML = "Maksimalan broj karaktera je 1000";
    }
    else{
        dodatniZahteviGreska.innerHTML = "";
    }

    if(validno){
        var podaciZaSlanje={
            datum:datum,
            plovilo:plovilo,
            dodatniZahtevi:dodatniZahtevi
        }

        ajaxCallBack("models/obrada_forme.php","post",podaciZaSlanje,function(result){
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