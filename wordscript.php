<?php
$conn = new mysqli("localhost", "words", "lOHzldtUbeT7SStQ", "words", 3306);
$text = explode(" ", preg_replace("/[^A-Z0-9 ]/", '', strtoupper($_GET['text'])));

for ($n = 3; $n > 0; $n--) {
        if (count($text) >= $n) {
                for ($i = 0; $i <= count($text) - $n; $i++) {
                        $word = trim($text[$i]);
                        for ($index = 1; $index < $n; $index++){
                                $word = $word." ".trim($text[$i+$index]);
                        }
                        if ($word != "" && $word != " " && strlen($word) < ($n * 30) && strpos($word, "HTTP") === false && strpos($word, "HTTPS") === false) {
                                if (count(explode(" ", trim($word))) == $n) {
                                        $word = trim($word);
                                        $name = "words".$n;
                                        $query = "INSERT INTO $name (word, count) VALUES ('$word','0')";
                                        $result = $conn->query($query);
                                        $query = "UPDATE $name SET count = count + 1 WHERE word='$word'";
                                        $result = $conn->query($query);
                                }
                        }
                }
        }
}
