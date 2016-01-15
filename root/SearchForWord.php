<?php

require_once("./SearchLocForWord.php");
require_once("./db.php");


# $data = file("Castle_Word_Find.txt");
# echo $data[row][col];

function SearchForWord($word, $wordsearch) {
	$num_found = 0;
        $max_row = count($wordsearch) - 1;
        $max_col = strlen($wordsearch[0]) - 1;

	#print "max_row = " . $max_row . "\n";
	#print "max_col = " . $max_col . "\n";

	for ($row = 0; $row <= $max_row; $row++) {
		for ($col = 0; $col < $max_col; $col++) {
			$num_found += SearchLocForWord($word, $row, $col, $wordsearch);
  		}
  	}

	# write entry to known_words table
	$dblink = ConnectDB();
	$result=QueryDB($dblink,'DELETE FROM known_words WHERE word = "' . $word . '";');
	$result=QueryDB($dblink,'INSERT INTO known_words SET word = "' . $word . '", number_found = ' . $num_found . ';');
	CloseDB($dblink);

	return $num_found;
}


?>
