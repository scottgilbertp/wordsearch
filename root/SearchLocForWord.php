<?php

require_once("./CheckForWord.php");
require_once("./db.php");


# $data = file("Castle_Word_Find.txt");
# echo $data[row][col];

function SearchLocForWord($word, $loc_row, $loc_col, $wordsearch) {
	if ( $wordsearch[$loc_row][$loc_col] == $word[0] ) {
		$num_found = 0;
		foreach( array("N","NE","E","SE","S","SW","W","NW") as $dir) {
			If (CheckForWord($word, $loc_row, $loc_col, $dir, $wordsearch)) {
				echo "FOUND!: " . $word . " at " . $loc_row . "," . $loc_col . " in direction " . $dir . "\n";
				# write entry to found words table
				$dblink = ConnectDB();
				$result=QueryDB($dblink,'INSERT INTO found_words SET word = "' . $word . 
					'", start_loc_row = ' . $loc_row . 
					', start_loc_col = ' . $loc_col . 
					', direction = "' . $dir . '";');
				CloseDB($dblink);

				++$num_found;
			}
		}
		return $num_found;

	} else {
		return 0;
	}     
}


?>
