<?php

require_once("./NewLocInDir.php");

# $data = file("Castle_Word_Find.txt");
# echo $data[row][col];

function CheckForWord($word, $loc_row, $loc_col, $direction, $wordsearch) {

	# word - word to search for
	# loc_row - starting row location to check
	# loc_col - starting col location to check
	# direction to check (N, NE, E, SE, S, SW, W, NW)
	# wordsearch - array containing the wordsearch puzzle

	$check_loc_row = $loc_row;
	$check_loc_col = $loc_col;
	$char_count = 0;

	$max_col = strlen($wordsearch[0]) - 1;
	$max_row = count($wordsearch) - 1;

	foreach(str_split($word) as $char) {
		++$char_count;
		
		#echo "word=" . $word . "\n";
		#echo "char_count=" . $char_count . "\n";
		#echo "char=" . $char . "\n";
		#echo "wordsearch[check_loc_row][check_loc_col] = wordsearch[" . $check_loc_row . "][" . $check_loc_col . "] = " . $wordsearch[$check_loc_row][$check_loc_col] . "\n\n"; 

		if ( $wordsearch[$check_loc_row][$check_loc_col] != $char ) {
			#echo "FAIL: found mismatched char at pos " . $char_count . " char=" . $char . "\n";
			return False;
		}	

		# if not the last character, determine the location of the next char
		if ($char_count < strlen($word) ) {
			list ($check_loc_row, $check_loc_col) = NewLocInDir($check_loc_row, $check_loc_col, $direction, 1);
			
			if ($check_loc_col < 0 || $check_loc_row < 0 || $check_loc_col > $max_col || $check_loc_row > $max_row ) {
				#echo "FAIL: Hit edge of puzzle: check_loc_col=" . $check_loc_col  . " max_col=" . $max_col;
				#echo " check_loc_row=" . $check_loc_row . " max_row=" . $max_row . "\n";
				return False;
			}
		}
	}
	# if we've made it to here, then we must have found every char - its a hit!
	return True;
}


?>
