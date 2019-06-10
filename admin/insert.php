<?php
include "config.php";

$keyword = $_POST['keyword'];
$intent = $_POST['intent'];

$sql = "INSERT INTO data (id,keyword, intent) VALUES ('','".$keyword."', '".$intent."')";
if ($conn->query($sql) === TRUE) {
    echo "<center>บันทึกสำเร็จ</center>";
    header('refresh: 2; url=/admin');
    exit(0);
} else {
    echo "<center>ไม่สามารถบันทึกได้</center>";
    header('refresh: 2; url=/admin');
    exit(0);
}

?>