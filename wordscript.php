<?php
include("config.php");
function startsWith($haystack, $needle)
{
     $length = strlen($needle);
     return (substr($haystack, 0, $length) === $needle);
}

function endsWith($haystack, $needle)
{
    $length = strlen($needle);
    if ($length == 0) {
        return true;
    }

    return (substr($haystack, -$length) === $needle);
}
$arr = json_decode(getopt('f:')['f'], true);
$sql = array();
foreach( $arr as $word => $count ) {
        $start = 0;
        $end = 0;
        if (startsWith($word,"0")){
                $start = $count;
                $word = substr($word, 1);
        }
        if (endsWith($word,"1")){
        $end = $count;
        $word = substr($word,0,-1);
        }
        $name = "words" . count(explode(" ",$word));
        $sql[$name][]= '("'.$word.'", ' . $count . ','. $start .','.$end.')';
}
foreach ($sql as $table => $values){
        $query = "INSERT INTO $table (word, count, start, end) VALUES ".implode(',', $values) ." ON DUPLICATE KEY UPDATE count = count + VALUES(count), start = start + VALUES(start), end = end + VALUES(end), created = NOW()";
        echo "\n".$query."\n";
        $result = $conn->query($query);
}
