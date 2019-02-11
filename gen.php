<?php
$plen=4;
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
        $rand = sha1(serialize($sen));
        $searchstring=implode(" ",array_slice($sen,-1*($plen)));
        $query="SELECT `count`,`end` FROM `$name` WHERE `word`='$searchstring' LIMIT 1";
        $result=$conn->query($query);
        if($result->num_rows==1){
                $row=$result->fetch_assoc();
                if(rand(1,$row['count'])<=$row['end'])
                        return $sen;
        }
        $searchstring=implode(" ",array_slice($sen,-1*($plen-1)))." %";
        $query="SELECT `id`,`count` FROM `$name` WHERE `word` LIKE '$searchstring' AND `count` > 5 ORDER BY `count` DESC LIMIT 10";
        $result=$conn->query($query);
        for ($set = array (); $row = $result->fetch_assoc(); $set[$row['id']] = $row['count']);
        if($result->num_rows==0)
                return False;
        while(True){
                $id = getRandomWeightedElement($set);
                $query = "SELECT `word`,`count`,`end` FROM `$name` WHERE `id`=$id LIMIT 1";
                $result=$conn->query($query);
                $row=$result->fetch_assoc();
                $word=explode(" ", $row['word']);
                $tsen=$sen;
                $tsen[]=end($word);
                $helperresult=helper($tsen,$conn,$plen,$name);
                if($helperresult===False)
                        unset($set[$id]);
                else
                        return $helperresult;
                if(count($set)==0)
                        return False;
        }
}
$name="words".$plen;
$query = "SELECT `word`,`count` FROM `$name` ORDER BY `start` DESC LIMIT 100";
$result = $conn->query($query);
for ($set = array (); $row = $result->fetch_assoc(); $set[$row['word']] = $row['count']);
$word=getRandomWeightedElement($set);
$sen=explode(" ",$word);
var_dump(helper($sen, $conn,$plen,$name));
