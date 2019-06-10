<?php
include "config.php";

$sql = "DROP TABLE data ";
$res = $conn->query($sql);
if($res){
	echo "Yes DROP";
}else{
	echo "No DROP";
}

$sql = "CREATE TABLE data (
    id int(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    keyword varchar(255),
    intent varchar(255)
    )";

if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully 1 ";
} else {
    echo "Error creating table: " . $conn->error;
}

?>