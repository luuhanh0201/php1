<?php
require_once '../../connection.php';

// Get id 
$id = $_GET['id'];

// SQL delete

$sql = "DELETE FROM category where id='$id'";

$stmt = $conn -> prepare($sql);
$stmt ->execute();

$mess = 'Delete success';

header("location: ./show.php?mess=$mess");
?>
