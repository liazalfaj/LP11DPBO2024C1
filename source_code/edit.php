<?php
include("model/Template.class.php");
include("model/DB.class.php");
include("model/Pasien.class.php");
include("model/TabelPasien.class.php");
include("view/TampilPasien.php");

$tp = new TampilPasien();
$id = $_GET['id'];
// var_dump($id);
// die();	
// if ($id !== null) {
//     $tp->edit($id);
// } else {
//     $tp->tampil();
// }

$tp->edit($id);
