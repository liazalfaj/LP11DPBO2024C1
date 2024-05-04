<?php
include("model/Template.class.php");
include("model/DB.class.php");
include("model/Pasien.class.php");
include("model/TabelPasien.class.php");
include("view/TampilPasien.php");

$tp = new TampilPasien();
$id = $_GET['id'];
if ($id !== null) {
    $tp->delete($id);
} else {
    $tp->tampil();
}

