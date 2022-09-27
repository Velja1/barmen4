<?php
    session_start();
    include("../config/connection.php");

    if($_SERVER['REQUEST_METHOD']=='POST'){
        try{
            $korisnikId=$_SESSION['korisnik']->id_korisnik;
            $datum=$_POST["datum"];
            $plovilo=$_POST["plovilo"];
            $dodatniZahtevi=$_POST["dodatniZahtevi"];

            $greske=0;

            
            if($datum==""){
                $greske++;
            }
           
            if(!preg_match("/^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))$/",$datum)){
                $greske++;
            }

            if($plovilo=="0"){
                $greske++;
            }

            if($greske != 0){
                $odgovor=["poruka"=>"Došlo je do greške, pokušajte ponovo"];
                echo json_encode($odgovor);
                http_response_code(400);
            }

            else{
                global $conn;
                $upit="INSERT INTO posete (datum, dodatni_zahtevi, plovilo_id, korisnik_id) VALUES (:datum, :dodatni_zahtevi, :plovilo_id, :korisnik_id)";
                $priprema=$conn->prepare($upit);

                $priprema->bindParam(':datum',$datum);
                $priprema->bindParam(':dodatni_zahtevi',$dodatniZahtevi);
                $priprema->bindParam(':plovilo_id',$plovilo);
                $priprema->bindParam(':korisnik_id',$korisnikId);

                $rezultat=$priprema->execute();

                if($rezultat){
                    $odgovor=["poruka"=>"Uspešno ste zakazali posetu"];
                    echo json_encode($odgovor);
                    http_response_code(201);
                }
                else{
                    $odgovor=["poruka"=>"Doslo je do greske prilikom rezervacije, molimo pokusajte ponovo"];
                    echo json_encode($odgovor);
                    http_response_code(500);
                }
            }
        }
        catch(PDOException $exception){
            $odgovor=["poruka"=>"Došlo je do greške sa serverom, pokušajte ponovo za nekoliko minuta"];
            echo json_encode($odgovor);
            http_response_code(500);
            }
        }

    else{
        header('Location: ../index.php?page=prodaja');
    }
?>