<?php
include("config.php");
$arr = json_decode(getopt('f:')['f'], true);
foreach ($arr as $word => $count) {
        $name = "words" . count(explode(" ", $word));
        $query = "INSERT INTO $name (word, count) VALUES ('$word', '$count') ON DUPLICATE KEY UPDATE count = count + $count, created = NOW()";
        $result = $conn->query($query);
}
