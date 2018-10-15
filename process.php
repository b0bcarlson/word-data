<?php
include("config.php");
$text = explode(" ", preg_replace("/[^A-Z0-9 ]/", '', strtoupper($_GET['text'])));
$n = intval($_GET["length"]);
if ($n != 1 && $n != 2 && $n !=2){
die();
}
$table="words".$n;

$query = "CREATE TEMPORARY TABLE `words` ( `id` int(11) NOT NULL, `word` varchar(255) NOT NULL, `datacount` int(11) NOT NULL, `anacount` int(11) NOT NULL)";
$conn->query($query);
$query = "ALTER TABLE `words` ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`), ADD UNIQUE KEY `word` (`word`), MODIFY `id` int(11) NOT NULL AUTO_INCREMENT";
$conn->query($query);

if (count($text) >= $n) {
        for ($i = 0; $i <= count($text) - $n; $i++) {
                $word = trim($text[$i]);
                for ($index = 1; $index < $n; $index++){
                        $word = $word." ".trim($text[$i+$index]);
                }
                if ($word != "" && $word != " " && strlen($word) < ($n * 30) && strpos($word, "HTTP") === false && strpos($word, "HTTPS") === false) {
                        if (count(explode(" ", trim($word))) == $n) {
                                $word = trim($word);
                                $query = "SELECT * FROM $table WHERE word='$word'";
                                $result = $conn->query($query);
                                if($result && $result->num_rows == 1){
                                        $row = $result->fetch_assoc();
                                        $datacount = $row["count"];
                                        $query = "INSERT INTO `words` (word, datacount, anacount) VALUES ('$word', '$datacount', 0)";
                                        $conn->query($query);
                                        $query = "UPDATE `words` SET anacount = anacount + 1 WHERE word = '$word'";
                                        $conn->query($query);
                                }
                        }
                }
        }
        $query = "SELECT SUM(datacount) AS data, SUM(anacount) AS ana FROM `words`";
        $result = $conn->query($query);
        if (!$result) {
                die("An error has occured");
        }
        else {
                $row = $result->fetch_assoc();
                $datatotal = $row["data"];
                $anatotal = $row["ana"];
                $word="";
                $score=0;
                $anascore=0;
                $datascore=0;
                $query = "SELECT * FROM `words`";
                $result = $conn->query($query);
                while ($row = $result->fetch_assoc()) {
                        if ((($row["anacount"] / $anatotal) / ($row["datacount"] / $datatotal)) > $score) {
                                $word = $row["word"];
                                $score = ($row["anacount"] / $anatotal) / ($row["datacount"] / $datatotal);
                                $anascore = $row["anacount"] / $anatotal;
                                $datascore = $row["datacount"] / $datatotal;
                        }
                }
                echo $word . " " . $score . " " . $anascore . "/" . $datascore;
        }
}
