<?php
require_once('config.php');

function get_pdo() {
    try{
        $dsn = 'mysql:dbname='.DBNAME.';host='.DBHOST;
        $user = DBUSER;
        $password = DBPASS;
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ];
        $dbh = new PDO($dsn, $user, $password);
        return new PDO($dsn, $user, $password, $options);
    }catch (PDOException $e){
        print('Error:'.$e->getMessage());
        die();
    }
}


?>