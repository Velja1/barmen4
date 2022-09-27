<?php
    function unosKorisnika($ime,$prezime,$email,$username,$sifrovanPassword,$idUloga){
        global $conn;
        $upit = "INSERT INTO korisnici(ime, prezime, email, username, sifra, id_uloga) VALUES (:ime, :prezime, :email, :username, :sifra, :idUloga)";

        $priprema = $conn->prepare($upit);
        $priprema->bindParam(':ime', $ime);
        $priprema->bindParam(':prezime', $prezime);
        $priprema->bindParam(':email', $email);
        $priprema->bindParam(':username', $username);
        $priprema->bindParam(':sifra', $sifrovanPassword);
        $priprema->bindParam(':idUloga', $idUloga);

        $rezultat = $priprema->execute();
        return $rezultat;
    }
    
    session_start();
    include("../config/connection.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        try{
            $ime = $_POST['ime'];
            $prezime = $_POST['prezime'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            $greske=0;

            if($ime==""){
                $greske++;
            }
            if($prezime==""){
                $greske++;
            }
            if($email==""){
                $greske++;
            }
            if(!preg_match("/^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})*$/",$ime)){
                $greske++;
            }
            if(!preg_match("/^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})*$/",$prezime)){
                $greske++;
            }
            if(!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/",$email)){
                $greske++;
            }
            if(strlen($username)>50){
                $greske++;
            }
            if(strlen($password)>50){
                $greske++;
            }

            if($greske != 0){
                $odgovor=["poruka"=>"Doslo je do greske, pokusajte ponovo"];
                echo json_encode($odgovor);
                http_response_code(400);
            }

            else{
                $usernamePostojiUpit="SELECT * FROM korisnici WHERE username='".$username."'";
                $korisnikPostoji=$conn->query($usernamePostojiUpit)->fetch();
                
                if(!$korisnikPostoji){
                    $sifrovanPassword = md5($password);
                    $idUloga = 2;

                    $unosKorisnika=unosKorisnika($ime,$prezime,$email,$username,$sifrovanPassword,$idUloga);

                    if($unosKorisnika){
                        $odgovor=["poruka"=>"Uspešno ste se registrovali"];
                        echo json_encode($odgovor);
                        http_response_code(201);
                    }
                    else{
                        $odgovor=["poruka"=>"Došlo je do greške sa serverom prilikom registracije, pokušajte ponovo"];
                        echo json_encode($odgovor);
                        http_response_code(500);
                    }
                }
                else{
                    $odgovor=["poruka"=>"Username je zauzet"];
                    echo json_encode($odgovor);
                    http_response_code(409);
                }
            }
        }
        catch(PDOException $exception){
            $odgovor=["poruka"=>"Došlo je do greške sa serverom, molimo pokušajte ponovo za nekoliko minuta"];
            echo json_encode($odgovor);
            http_response_code(500);
        }
    }

    else{
        header('Location: ../index.php?page=registracija');
    }
?>