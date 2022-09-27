<?php
    session_start();
    include("../config/connection.php");

    if($_SERVER['REQUEST_METHOD']=='POST'){
        
        try{
            $plovilo=$_POST['ploviloId'];

            global $conn;
            $upit="DELETE FROM plovila WHERE id_plovila=:id_plovila";
            

            $priprema=$conn->prepare($upit);

            $priprema->bindParam(':id_plovila',$plovilo);

            $rezultat=$priprema->execute();
            if($rezultat){
                $odgovor=["poruka"=>"Uspesno izbrisano plovilo"];
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