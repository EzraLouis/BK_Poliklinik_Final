<?php
include_once("../../../config/conn.php");
session_start();

if (!isset($_SESSION['login']) || $_SESSION['akses'] != 'dokter') {
    echo "<meta http-equiv='refresh' content='0; url=../auth/login.php'>";
    die();
}

if (!isset($_GET['id'])) {
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
    die();
}

$id = $_GET['id'];

// Hapus jadwal periksa dari database
$query = $pdo->prepare("DELETE FROM jadwal_periksa WHERE id = ?");
$query->execute([$id]);

echo "<meta http-equiv='refresh' content='0; url=index.php'>";
die();
?>
