<?php

include("./CheckForWord.php");

$data = file("Castle_Word_Find.txt");
# echo $data[row][col];

$word = "CFEH";
$row = 0;
$col = 0;
$dir = "E";

if ( CheckForWord($word, $row, $col, $dir, $data) )
	echo "Found \"" . $word . "\" at row=" . $row . " col=" . $col . " dir=" . $dir;

?>

