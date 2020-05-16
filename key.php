<?php

DEFINE ('DB_USER', '');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', '');
DEFINE ('DB_NAME', '');

$mysqli =mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
if ($mysqli->connect_errno) 
	{
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


if(isset($_GET['key'])) { 
    
$mykey = filter_var($_GET['key'], FILTER_SANITIZE_STRING);

$table = "key";

        $sql = $mysqli->prepare("SELECT * FROM `mykey` WHERE mykey = ?");
        $sql->bind_param("s",$mykey);
        $sql->execute();
        $result = $sql->get_result();

            if($result->num_rows  > 0){
                echo "TRUE!";
            
            }
            else{
                echo "FALSE!";
            }
        
    }
else{
    echo "There No Key!";
}
