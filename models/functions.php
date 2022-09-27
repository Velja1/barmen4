<?php
    function logPage($typeOfAction){

        $visitedPage = $_SERVER['REQUEST_URI'];
        $datetime = time();
        $ip = $_SERVER['REMOTE_ADDR'];

        $user = "guest";

        if(isset($_SESSION['korisnik'])){
            $user = $_SESSION['korisnik']->id_korisnik;
        }

        $content = $visitedPage."__".$datetime."__".$ip."__".$user."__".$typeOfAction."\n";

        $file = fopen("data/log.txt", "a");
        $write = fwrite($file, $content);
        if($write){
            fclose($file);
        }  
    }

    function getData($filePath){
        $file = fopen($filePath, "r");
        $data = fread($file, filesize($filePath));
        fclose($file);
        return $data;
    }
?>