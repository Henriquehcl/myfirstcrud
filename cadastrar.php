<?php
require_once "vendor/autoload.php";


if(isset($_POST['firstname'],$_POST['lastname'])){
$n = new \App\Control();
$nome = new \App\Crud();
$n->setFirstName($_POST['firstname']);
$n->setLastName($_POST['lastname']);
$nome->insert($n);

}

require_once "includes/header.php";
require_once "includes/include.php";
require_once "includes/footer.php";

?>
