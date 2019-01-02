<?php
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
$query = "SELECT `word`,`count` FROM `words1` ORDER BY `count` DESC LIMIT 100";
$result = $conn->query($query);
for ($set = array (); $row = $result->fetch_assoc(); $set[$row['word']] = $row['count']);
$word=getRandomWeightedElement($set);
$sen=$word;
$query = "SELECT `word`,`count` FROM `words2` WHERE `word` LIKE '$word %' ORDER BY `count` DESC LIMIT 100";
$result = $conn->query($query);
for ($set = array (); $row = $result->fetch_assoc(); $set[$row['word']] = $row['count']);
$word=substr(getRandomWeightedElement($set), strlen($word)+1);
$sen=$sen." ".$word;
for($i=0;$i<10;$i++){
        $query = "SELECT `word`,`count` FROM `words3` WHERE `word` LIKE '$word %' ORDER BY `count` DESC LIMIT 100";
        $result = $conn->query($query);
        for ($set = array (); $row = $result->fetch_assoc(); $set[$row['word']] = $row['count']);
        $word=substr(getRandomWeightedElement($set), strlen($word)+1);
        $sen=$sen." ".$word;
}
echo $sen;
