<?php
$plen=4;
$min=10;
include("config.php");

function getRandomWeightedElement(array $weightedValues) {
	$rand = mt_rand(1, (int) array_sum($weightedValues));
	foreach ($weightedValues as $key => $value) {
		$rand -= $value;
		if ($rand <= 0)
			return $key;
	}
}
function helper($sen, $conn, $plen, $name) {
	global $min;
	$searchstring=implode(" ",array_slice($sen,-1*($plen)));
	if(count($sen) > $min){
		$query="SELECT `count`,`end` FROM `$name` WHERE `word`='$searchstring' LIMIT 1";
		$result=$conn->query($query);
		if($result->num_rows==1){
			$row=$result->fetch_assoc();
			if(rand(1,$row['count'])<=$row['end'])
				return $sen;
		}
	}
	$searchstring=implode(" ",array_slice($sen,-1*($plen-1)))." %";
	$c = 10 - $plen;
	$query="SELECT `count`, `word` FROM `$name` WHERE `word` LIKE '$searchstring' AND `count` > $c";
	$result=$conn->query($query);
	if($result->num_rows<=$c)
		return False;
	for ($set = array (); $row = $result->fetch_assoc(); $set[$row['word']] = $row['count']);
	while(True){
		$id = getRandomWeightedElement($set);
        $word = explode(" ", $id);
			$tsen=$sen;
		$tsen[]=end($word);
		$helperresult=helper($tsen,$conn,$plen,$name);
		if($helperresult===False)
			unset($set[$id]);
		else
			return $helperresult;
		if(count($set)<=1)
			return False;
	}
}
$name="words".$plen;
$ready=False;
$query = "SELECT `word`,`count` FROM `$name` ORDER BY `start` DESC LIMIT 1000";
$result = $conn->query($query);
for ($set = array (); $row = $result->fetch_assoc(); $set[$row['word']] = $row['count']);
while(!$ready){
	$word=getRandomWeightedElement($set);
	unset($set[$word]);
	$sen=explode(" ",$word);
	$ready = helper($sen, $conn,$plen,$name);
}
echo implode(" ",$ready);
