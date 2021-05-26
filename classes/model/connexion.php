<?php 
function connexion()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    // $dbname= "immo";
    $dbname= "immoTest";

    try {
        $bdd = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $bdd;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        return FALSE;
        exit();
    }
}
?>