<?php
include("config.php");
for ($n = 1; $n <= 5; $n++){
        $table = "words".$n;
        $inv = $days * $n;
        $inv2 = $days * ($n * $n);
        $sens = intdiv($count, $n) + 1;
        $conn->query("DELETE FROM $table WHERE ((created < (NOW() - INTERVAL $inv DAY) AND count < $sens) OR created < (NOW() - INTERVAL $inv2 DAY))");
}
