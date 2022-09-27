<?php
    session_start();
    include("../config/connection.php");

    if($_SERVER['REQUEST_METHOD']=='POST'){
        
        try{
            $ploviloId=$_POST['ploviloId'];

            global $conn;
            $upit="SELECT * FROM anketa WHERE id_plovila=".$ploviloId;
            $rezultat=$conn->query($upit)->fetchAll();
            if($rezultat!=null){
                echo json_encode($rezultat);
                http_response_code(200);
            }
            else{
                $odgovor=["poruka"=>"Nema ocena za izabrano plovilo"];
                echo json_encode($odgovor);
                http_response_code(200);
            }
        }

        catch(PDOException $exception){
            $odgovor=["poruka"=>"Došlo je do greške sa serverom, molimo pokušajte ponovo"];
            echo json_encode($odgovor);
            http_response_code(500);
        }
    }
    else{
        header('Location: ../index.php?page=admin');
    }
?>