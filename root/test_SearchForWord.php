<?php

require_once("./SearchForWord.php");

$data = file("Castle_Word_Find.txt");
# echo $data[row][col];

$word = "FANATIC";

if ( $count=SearchForWord($word, $data) )
	echo "Found \"" . $word . "\" " . $count . " times \n";

?>

