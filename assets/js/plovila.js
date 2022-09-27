//Dodavanje jQuery Plugin-a Colorbox
$(document).ready(function(){
    try{
        $(".plovilo .group1").colorbox({rel:'group1',transition:'fade'});
        $(".plovilo .group2").colorbox({rel:'group2',transition:'fade'});
    }
    catch(error){
        console.log("Efekat nad galerijom nije dostupan zbog: "+error);
    }
});

document.getElementById("btnPosalji").addEventListener("click",proveraAnketa);

function proveraAnketa(){
    let validno=true;

    let ploviloId=document.getElementById("selectPlovilo").value;
    let ocena=document.getElementsByName("rbOcena");
    let objasnjenje=document.getElementById("taObjasnjenje").value;

    let ploviloGreska=document.getElementById("ploviloGreska");
    let ocenaGreska=document.getElementById("ocenaGreska");
    let objasnjenjeGreska=document.getElementById("objasnjenjeGreska");

    if(ploviloId == "0"){
        validno = false;
        ploviloGreska.innerHTML = "Niste izabrali plovilo";
    }
    else{
        ploviloGreska.innerHTML = "";
    }
    
    let ocenaIzbor = "";
    for(let i=0;i<ocena.length;i++){
        if(ocena[i].checked){
            ocenaIzbor = ocena[i].value;
            break;
        }
    }

    if(ocenaIzbor == ""){
        validno = false;
        ocenaGreska.innerHTML = "Niste izabrali ocenu";
    }
    else{
        ocenaGreska.innerHTML = "";
    }

    if (objasnjenje.length>1000){
        validno = false;
        objasnjenjeGreska.innerHTML = "Maksimalan broj karaktera je 1000";
    }
    else{
        objasnjenjeGreska.innerHTML = "";
    }

    if(validno){
        var podaciZaSlanje={
            ploviloId:ploviloId,
            ocena:ocenaIzbor,
            objasnjenje:objasnjenje
        }

        ajaxCallBack("models/anketa_upis.php","post",podaciZaSlanje,function(result){
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