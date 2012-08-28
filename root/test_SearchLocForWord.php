<?php

require_once("./SearchLocForWord.php");

$data = file("Castle_Word_Find.txt");
# echo $data[row][col];

$word = "CRL";
$row = 6;
$col = 58;

if ( $count=SearchLocForWord($word, $row, $col, $data) )
	echo "Found \"" . $word . "\" at row=" . $row . " col=" . $col . " " . $count . " times \n";

?>

