<?php
include("config.php");
for ($n = 1; n <= 3; n++){
        $table = "words".$n;
        $conn->query("DELETE FROM $table WHERE ((created < (NOW() - INTERVAL $days DAY)))");
}
