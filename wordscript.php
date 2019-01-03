<?php
include("config.php");
$arr = json_decode(getopt('f:')['f'], true);
$sql = array();
foreach( $arr as $word => $count ) {
        $name = "words" . count(explode(" ",$word));
        $sql[$name][]= '("'.$word.'", ' . $count . ')';
}
foreach ($sql as $table => $values){
        $query = "INSERT INTO $table (word, count) VALUES ".implode(',', $values) ." ON DUPLICATE KEY UPDATE count = count + VALUES(count), created = NOW()";
        $result = $conn->query($query);
}
