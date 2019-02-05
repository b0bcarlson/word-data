<?php
$plen=4;
include("config.php");

  function getRandomWeightedElement(array $weightedValues) {
    $rand = mt_rand(1, (int) array_sum($weightedValues));

    foreach ($weightedValues as $key => $value) {
      $rand -= $value;
      if ($rand <= 0) {
        return $key;
      }
    }
  }
$name="words".$plen;
$query = "SELECT `word`,`count` FROM `$name` ORDER BY `start` DESC LIMIT 100";
$result = $conn->query($query);
for ($set = array (); $row = $result->fetch_assoc(); $set[$row['word']] = $row['count']);
$word=getRandomWeightedElement($set);
$sen=explode(" ",$word);
while(True){
        $searchstring=implode(" ",array_slice($sen,-1*($plen-1)))." %";
        $query="SELECT `id`,`count` FROM `$name` WHERE `word` LIKE '$searchstring' ORDER BY `count` DESC LIMIT 10";
        $result=$conn->query($query);
        for ($set = array (); $row = $result->fetch_assoc(); $set[$row['id']] = $row['count']);
        $id = getRandomWeightedElement($set);
        $query = "SELECT `word`,`count`,`end` FROM `$name` WHERE `id`=$id LIMIT 1";
        $result=$conn->query($query);
        $row=$result->fetch_assoc();
        $word=explode(" ", $row['word']);
        $sen[]=end($word);
        echo implode(" ",$sen)."\n";
        echo $row['end']."/".$row['count']."\n";
        if(rand(1,$row['count'])<=$row['end'])
                break;
}
