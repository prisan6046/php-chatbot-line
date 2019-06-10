<?php
include "config.php";

$id = $_GET['id'];
// echo $id;
$sql = "DELETE FROM data WHERE id=".$id;

if ($conn->query($sql) === TRUE) {
    echo "<center>ลบสำเร็จ</center>";
    header('refresh: 2; url=/admin');
    exit(0);
} else {
    echo "<center>ไม่สามารถลบได้</center>";
    header('refresh: 2; url=/admin');
    exit(0);
}

?>