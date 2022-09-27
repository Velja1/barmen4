<?php
session_start();

include("../config/connection.php");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        try{
            $username = $_POST['username'];
            $password = $_POST['password'];

            $greske=0;

            if(strlen($username)>50){
                $greske++;
            }
            if(strlen($password)>50){
                $greske++;
            }
            if($greske != 0){
                $odgovor=["poruka"=>"Došlo je do greške, pokušajte ponovo"];
                echo json_encode($odgovor);
                http_response_code(400);
            }

            if($greske==0){
                $sifrovanPassword = md5($password);
                $idUloga = 2;
                $korisnik=proveraKorisnika($username,$sifrovanPassword);
            }

            if($korisnik){
                $_SESSION['korisnik'] = $korisnik;
                echo json_encode(true);
                http_response_code(200);
            }
            
            else{
                $odgovor=["poruka"=>"Pogrešni kredencijali za logovanje, pokušajte ponovo"];
                echo json_encode($odgovor);
                http_response_code(400);
            }
        }
        
        catch(PDOException $exception){
            $odgovor=["poruka"=>"Došlo je do greške sa serverom, molimo pokušajte ponovo"];
            echo json_encode($odgovor);
            http_response_code(500);
        }
    }
    else{
        header('Location: ../index.php?page=logovanje');
    }

function proveraKorisnika($username,$sifrovanPassword){
    global $conn;
    $upit = "SELECT * FROM korisnici k JOIN uloga u ON k.id_uloga = u.id_uloga WHERE k.username = :username AND k.sifra = :sifra";

    $priprema = $conn->prepare($upit);
    $priprema->bindParam(':username', $username);
    $priprema->bindParam(':sifra', $sifrovanPassword);

    $priprema->execute();
    $rezultat=$priprema->fetch();
    return $rezultat;
}
?>