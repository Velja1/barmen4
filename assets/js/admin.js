document.getElementById("ddlAdmin").addEventListener("change",provera);

function provera(){
    var selectAdmin=document.getElementById("ddlAdmin").selectedIndex;
    if (selectAdmin==0){
        $("#formaUpis").css("display", "none");
        $("#formaIzmena").css("display", "none");
        $("#formaBrisanje").css("display", "none");
    }
    if (selectAdmin==1){
        $("#formaUpis").css("display", "block");
        $("#formaIzmena").css("display", "none");
        $("#formaBrisanje").css("display", "none");

    }
    if (selectAdmin==2){
        $("#formaUpis").css("display", "none");
        $("#formaIzmena").css("display", "block");
        $("#formaBrisanje").css("display", "none");

    }
    if (selectAdmin==3){
        $("#formaUpis").css("display", "none");
        $("#formaIzmena").css("display", "none");
        $("#formaBrisanje").css("display", "block");

    }
}

document.getElementById("btnDodaj").addEventListener("click",proveraUpis);

function proveraUpis(){
    let proizvodjacId, tipId, model, cena, duzina, sirina, tezina, kapacitetRezervoara, opis;
    proizvodjacId=document.getElementById("ddlAdminProizvodjac").value;
    tipId=document.getElementById("ddlAdminTip").value;
    model=document.getElementById("tbDodajModel").value;
    cena=document.getElementById("tbDodajCena").value;
    duzina=document.getElementById("tbDodajDuzina").value;
    sirina=document.getElementById("tbDodajSirina").value;
    tezina=document.getElementById("tbDodajTezina").value;
    kapacitetRezervoara=document.getElementById("tbDodajKapacitet").value;
    opis=document.getElementById("taDodajOpis").value;

    var podaciZaSlanje={
        proizvodjacId:proizvodjacId,
        tipId:tipId,
        model:model,
        cena:cena,
        duzina:duzina,
        sirina:sirina,
        tezina:tezina,
        kapacitetRezervoara:kapacitetRezervoara,
        opis:opis
    }


ajaxCallBack("models/upis.php","post",podaciZaSlanje,function(result){
    $("#odgovorUpis").html(result.poruka);
});
}

document.getElementById("ddlIzmenaPloviloiz").addEventListener("change",proveraPlovilaIzmena);

function proveraPlovilaIzmena(){
    var izabranoPlovilo=document.getElementById("ddlIzmenaPloviloiz").value;
    var izabranoPloviloSlanje={
        izabranoPlovilo:izabranoPlovilo
    }
    if(izabranoPlovilo!=0){
        ajaxCallBack("models/izmena.php", "post", izabranoPloviloSlanje, function(result){
            document.getElementById("ddlIzmenaTip").value=result.id_tip
            document.getElementById("tbIzmeniModel").value=result.model
            document.getElementById("tbIzmeniCena").value=result.cena
            document.getElementById("tbIzmeniDuzina").value=result.duzina
            document.getElementById("tbIzmeniSirina").value=result.sirina
            document.getElementById("tbIzmeniTezina").value=result.tezina
            document.getElementById("tbIzmeniKapacitet").value=result.kapacitetRezervoara
            document.getElementById("taIzmeniOpis").value=result.opis
        });
    }
}

document.getElementById("btnIzmeni").addEventListener("click",proveraIzmena);

function proveraIzmena(){
    let ploviloId, tipId, model, cena, duzina, sirina, tezina, kapacitetRezervoara, opis;
    ploviloId=document.getElementById("ddlIzmenaPloviloiz").value;
    tipId=document.getElementById("ddlIzmenaTip").value;
    model=document.getElementById("tbIzmeniModel").value;
    cena=document.getElementById("tbIzmeniCena").value;
    duzina=document.getElementById("tbIzmeniDuzina").value;
    sirina=document.getElementById("tbIzmeniSirina").value;
    tezina=document.getElementById("tbIzmeniTezina").value;
    kapacitetRezervoara=document.getElementById("tbIzmeniKapacitet").value;
    opis=document.getElementById("taIzmeniOpis").value;

    var podaciZaSlanje={
        ploviloId:ploviloId,
        tipId:tipId,
        model:model,
        cena:cena,
        duzina:duzina,
        sirina:sirina,
        tezina:tezina,
        kapacitetRezervoara:kapacitetRezervoara,
        opis:opis
    }

ajaxCallBack("models/izmena_upis.php","post",podaciZaSlanje,function(result){
    $("#odgovorIzmena").html(result.poruka);
});
}

document.getElementById("btnIzbrisi").addEventListener("click",proveraBrisanje);

function proveraBrisanje(){
    let ploviloId=document.getElementById("ddlBrisanjePlovila").value;

    var podaciZaSlanje={
        ploviloId:ploviloId
    }

    ajaxCallBack("models/brisanje.php","post",podaciZaSlanje,function(result){
        $("#odgovorBrisanje").html(result.poruka);
    });
}

var ddlAnketa=document.getElementById("ddlAnketa");
ddlAnketa.addEventListener("change",proveraAnketa);

function proveraAnketa(){
    let ploviloId=document.getElementById("ddlAnketa").value;

    if(ploviloId!=0){
        
        var podaciZaSlanje={
            ploviloId:ploviloId
        }

        ajaxCallBack("models/anketa_provera.php","post",podaciZaSlanje,function(result){
        
            if(result.poruka){
                $("#ocene").html(result.poruka);
            }
            
            else{
                var preporuka=0;
                var nePreporuka=0;
                var misljenje=0;
                result.forEach(red=>{
                    if(red.ocena==1){
                        preporuka++;
                    }
                    if(red.ocena==2){
                        nePreporuka++;
                    }
                    if(red.ocena==3){
                        misljenje++;
                    }
                });
                $("#ocene").html(`<label for="preporuka">Preporucuju</label>
                <p id="preporuka"></p>
                <label for="nePreporuka">Ne preporucuju</label>
                <p id="nePreporuka"></p>
                <label for="misljenje">Nemaju misljenje</label>
                <p id="misljenje"></p>`);
                
                $("#preporuka").html(preporuka);
                $("#nePreporuka").html(nePreporuka);
                $("#misljenje").html(misljenje);
            }
        });
    }

    else{
        $("#ocene").html("");
    }
};

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