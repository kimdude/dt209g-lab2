<?php

include("includes/config.php");

$db = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);  
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$sql = "
DROP TABLE IF EXISTS bucketlist;
CREATE TABLE bucketlist (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    description VARCHAR(70),
    priority TINYINT NOT NULL,
    created_at timestamp NOT NULL DEFAULT current_timestamp()
);";

echo "Creating table 'bucketlist'... ";
if ($db->multi_query($sql)) {
    echo "Table created successfully.";
} else {
    echo "Error creating table: " . $db->error;
}

$db->close();