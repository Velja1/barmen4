<?php
    session_start();
    include("../config/connection.php");

    if($_SERVER['REQUEST_METHOD']=='POST'){
        
        try{
            $plovilo=$_POST['ploviloId'];
            $tipId=$_POST['tipId'];
            $model=$_POST['model'];
            $cena=$_POST['cena'];
            $duzina=$_POST['duzina'];
            $sirina=$_POST['sirina'];
            $tezina=$_POST['tezina'];
            $kapacitetRezervoara=$_POST['kapacitetRezervoara'];
            $opis=$_POST['opis'];

            global $conn;
            $upit="UPDATE plovila SET id_tip=:id_tip, model=:model, cena=:cena, duzina=:duzina, sirina=:sirina, tezina=:tezina, kapacitetRezervoara=:kapacitetRezervoara, opis=:opis WHERE id_plovila=:id_plovila";

            $priprema=$conn->prepare($upit);

            $priprema->bindParam(':id_plovila',$plovilo);
            $priprema->bindParam(':id_tip',$tipId);
            $priprema->bindParam(':model',$model);
            $priprema->bindParam(':cena',$cena);
            $priprema->bindParam(':duzina',$duzina);
            $priprema->bindParam(':sirina',$sirina);
            $priprema->bindParam(':tezina',$tezina);
            $priprema->bindParam(':kapacitetRezervoara',$kapacitetRezervoara);
            $priprema->bindParam(':opis',$opis);

            $rezultat=$priprema->execute();
            if($rezultat){
                $odgovor=["poruka"=>"Uspešno izmenjeno plovilo"];
                echo json_encode($odgovor);
                http_response_code(200);
            }
        }

        catch(PDOException $exception){
            $odgovor=["poruka"=>"Došlo je do greške sa serverom, molimo pokušajte ponovo za nekoliko minuta"];
            echo json_encode($odgovor);
            http_response_code(500);
        }
    }
    else{
        header('Location: ../index.php?page=admin');
    }
?>