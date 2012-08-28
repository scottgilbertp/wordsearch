<?php

require_once("./PrintWordSearch.php");

$data = file("Castle_Word_Find.txt");
# echo $data[row][col];

$highlights = array(9999,9999);

array_push($highlights, array(2,8));
array_push($highlights, array(2,9));
array_push($highlights, array(2,10));
array_push($highlights, array(3,20));
array_push($highlights, array(3,21));

PrintWordSearch($data, $highlights);

?>

