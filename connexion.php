<?php
// Config Base
$server = 'localhost';
$login = 'root';
$pass = '';
$db = 'udc_omega';
$link = mysqli_connect($server , $login , $pass , $db);
if(!$link){
    echo 'Erreur: Impossible de se connecter a MYSQL';
}else {
    # code...
}
?>