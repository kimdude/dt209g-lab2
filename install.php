<?php

include("includes/config.php");

//Connecting to database
$db = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);  
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

//Creating table
$sql = "
DROP TABLE IF EXISTS dt209g_bucketlist;
CREATE TABLE dt209g_bucketlist (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    description VARCHAR(70),
    priority TINYINT NOT NULL,
    created_at timestamp NOT NULL DEFAULT current_timestamp()
);";

//Adding data
$sql .= "
INSERT INTO dt209g_bucketlist (name, description, priority) VALUES 
('Jobba med webbutveckling','Examinera och hitta jobb.', 1),
('Lära mig drejning','Dreja med lera.', 2);
";

//Sending SQL to database
echo "Creating table 'bucketlist'... ";
if ($db->multi_query($sql)) {
    echo "Table created successfully.";
} else {
    echo "Error creating table: " . $db->error;
}

$db->close();