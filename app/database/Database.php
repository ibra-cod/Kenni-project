<?php 

DEFINE("DBHOST","localhost");
DEFINE("DBNAME","kenni");
DEFINE("DBUSER","root");
DEFINE("DBPASS","root");


function getPDO() {
    try {
    
        $pdo = new PDO("mysql:host=" . DBHOST .";dbname=" . DBNAME, DBUSER, DBPASS);
        $pdo->setAttribute( PDO::ATTR_ERRMODE,  PDO::ERRMODE_EXCEPTION);

        return $pdo;
    
    } catch (\Throwable $th) {
       $th->getMessage("pas connecter");
    }
     
}