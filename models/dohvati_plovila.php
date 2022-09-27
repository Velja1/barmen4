<?php
    session_start();
    include("../config/connection.php");

    if($_SERVER['REQUEST_METHOD']=='GET'){
        
        try{
            
            $uslov="";
            if(!empty($_GET['uslovTip'])){
                $uslov.=' AND t.id_tip='.$_GET['uslovTip'];
            }
            if(!empty($_GET['uslovModel'])){
                $uslov.=' AND m.id_proizvodjac='.$_GET['uslovModel'];
            }
            if(!empty($_GET['uslovSortiranje'])){
                $uslov.=' ORDER BY '.$_GET['uslovSortiranje'];
            }
            if(empty($_GET['uslovTip'])&&empty($_GET['uslovModel'])&&empty($_GET['uslovSortiranje'])){
                $uslov='';
            }
            global $conn;
            $upit="SELECT p.id_plovila AS id, p.model AS model, p.cena AS cena, p.duzina AS duzina,
                            p.sirina AS sirina, p.tezina AS tezina, p.kapacitetRezervoara AS kapacitetRezervoara,
                            p.opis AS opis, t.naziv AS tip, m.naziv AS proizvodjac, s.src AS src, s.alt AS alt
                    FROM plovila p 
                    INNER JOIN tipovi t ON p.id_tip=t.id_tip 
                    INNER JOIN proizvodjaci m ON p.id_proizvodjac=m.id_proizvodjac 
                    INNER JOIN slike s ON p.id_plovila=s.id_plovila WHERE s.tip='exterior' $uslov";
            $podaci=$conn->query($upit)->fetchAll();
            echo json_encode($podaci);
            http_response_code(200);
        }

        catch(PDOException $exception){
            $odgovor=["poruka"=>"Došlo je do greške sa serverom, molimo pokušajte ponovo za nekoliko minuta"];
            echo json_encode($odgovor);
            http_response_code(500);
        }
    }
    else{

        header('Location: ../index.php?page=proizvodi');
    }
?>