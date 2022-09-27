<?php
    session_start();
    include("../config/connection.php");

    if($_SERVER['REQUEST_METHOD']=='POST'){
        
        try{
            $korisnikId=$_SESSION['korisnik']->id_korisnik;
            $ploviloId=$_POST['ploviloId'];
            $ocena=$_POST['ocena'];
            $objasnjenje=$_POST['objasnjenje'];

            global $conn;

            $korisnikAnketaUpit="SELECT * FROM anketa WHERE id_korisnik=".$korisnikId;
            $korisnikAnketa=$conn->query($korisnikAnketaUpit)->fetch();

            if(!$korisnikAnketa){
                $upit="INSERT INTO anketa (id_korisnik, id_plovila, ocena, objasnjenje) VALUES (:id_korisnik, :id_plovila, :ocena, :objasnjenje)";
                $priprema=$conn->prepare($upit);

                $priprema->bindParam(':id_korisnik',$korisnikId);
                $priprema->bindParam(':id_plovila',$ploviloId);
                $priprema->bindParam(':ocena',$ocena);
                $priprema->bindParam(':objasnjenje',$objasnjenje);

                $rezultat=$priprema->execute();
                if($rezultat){
                    $odgovor=["poruka"=>"Uspešno popunjena anketa"];
                    echo json_encode($odgovor);
                    http_response_code(201);
                }
                else{
                    $odgovor=["poruka"=>"Došlo je do greške, molimo pokušajte ponovo"];
                    echo json_encode($odgovor);
                    http_response_code(500);
                }
            }
            else{
                $odgovor=["poruka"=>"Anketa se može popuniti samo jednom"];
                echo json_encode($odgovor);
                http_response_code(409);
            }
        }

        catch(PDOException $exception){
            $odgovor=["poruka"=>"Došlo je do greške sa serverom, molimo pokušajte ponovo za nekoliko minuta"];
            echo json_encode($odgovor);
            http_response_code(500);
        }
    }
    else{
        header('Location: ../index.php?page=plovila');
    }
?>