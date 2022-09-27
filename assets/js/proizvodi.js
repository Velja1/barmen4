$(document).ready(function(){

    ajaxCallBack("models/dohvati_plovila.php","GET","",function(result){
        ispisiPlovila(result);
        $(".proizvod .item:even").css("backgroundColor","#aaa");
    });

    document.getElementById("ddlTip").addEventListener("change",filtriraj);
    document.getElementById("ddlModel").addEventListener("change",filtriraj);
    document.getElementById("ddlSortiranje").addEventListener("change",filtriraj);
    
    function filtriraj(){
        var uslovTip=document.getElementById("ddlTip").value;
        var uslovModel=document.getElementById("ddlModel").value;
        var uslovSortiranje=document.getElementById("ddlSortiranje").value;

        switch(uslovSortiranje) {
            case "1":
                uslovSortiranje="p.duzina ASC"
                break;
            case "2":
                uslovSortiranje="p.duzina DESC"
                break;
            case "3":
                uslovSortiranje="p.cena ASC"
                break;
            case "4":
                uslovSortiranje="p.cena DESC"
                break;
          } 

        var podaciZaSlanje={
            uslovTip:uslovTip,
            uslovModel:uslovModel,
            uslovSortiranje:uslovSortiranje
        }

        ajaxCallBack("models/dohvati_plovila.php","GET",podaciZaSlanje,function(result){
            ispisiPlovila(result);
        });
    }
});

function ispisiPlovila(plovila){
    if(plovila.length==0){
        $("#proizvodi").html(`<header class=;align-center major special;>
                                <p>Nema plovila za izabrane kriterijume</p>
                                </header>`);
    }
    else{
        var ispis="";
        plovila.forEach(el => {
            ispis+=
            `<div class="proizvod" data-id="${el.id}">
                <p class="nazivMasine">${el.proizvodjac+' '+el.model}</p>
                <img src="${el.src}" alt="${el.alt}"/>
                <div class="item"><div>Dužina</div><div>${el.duzina}m</div></div>
                <div class="item"><div>Širina</div><div>${el.sirina}m</div></div>
                <div class="item"><div>Težina</div><div>${el.tezina}kg</div></div>
                <div class="item"><div>Tip</div><div>${el.tip}</div></div>
                <div class="item"><div>Cena</div><div>${el.cena}€</div></div>
                <div class="item"><div>Kapacitet rezervoara</div><div>${el.kapacitetRezervoara}l</div></div>
            </div>`
        });
        $("#proizvodi").html(ispis);
        $(".proizvod .item:even").css("backgroundColor","#aaa");
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
            $("#proizvodi").html(xhr.responseJSON.poruka);
        }
    });
}