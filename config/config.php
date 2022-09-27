<?php

    define("BASE_URL", $_SERVER['DOCUMENT_ROOT'].'/sajt');

    define("ENV_FAJL", BASE_URL. "/config/.env");
    define("LOG_FAJL", BASE_URL. "/data/log.txt");
    define("STUDENTI_XML", BASE_URL. "/data/studenti.xml");


    define("SERVER", env("SERVER"));
    define("DATABASE", env("DATABASE"));
    define("USERNAME", env("USERNAME"));
    define("PASSWORD", env("PASSWORD"));


    function env($marker){
        $dataArr = file(ENV_FAJL);
        $requiredValue = "";
    
        foreach($dataArr as $row){
            $row = trim($row);
    
            list($key, $value) = explode("=", $row);
    
            if($key == $marker){
                $requiredValue = $value;
                break;
            }
        }
    
        return $requiredValue;
    }
?>