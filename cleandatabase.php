<?php
include("config.php");
for ($n = 1; $n <= 3; $n++){
        $table = "words".$n;
        $inv = $days * $n;
        $sens = intdiv($count, $n) + 1;
        $conn->query("DELETE FROM $table WHERE ((created < (NOW() - INTERVAL $days DAY) AND count < $sens))");
}
