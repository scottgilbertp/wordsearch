<?php

require_once("./NewLocInDir.php");

#
# Parameters:
# start_loc_row
# start_loc_col
# direction
# length
#
# return: array of (row,col) pairs
#
# note: This function does no bounds checking - it just trusts that the parameters passed will not
#       extend past the boundaries of the wordsearch puzzle.

function LocsUsedByWord($start_loc_row, $start_loc_col, $direction, $length) {
	$locs = array(9999,9999);  # seem to need to initialize the array
	unset($locs[0]);
	unset($locs[1]);

	for ($dist = 0; $dist < $length; $dist++) {
		#print_r( NewLocInDir($start_loc_row, $start_loc_col, $direction, $dist) ) ;
		array_push($locs, NewLocInDir($start_loc_row, $start_loc_col, $direction, $dist)  );

	}
	return $locs;

}

?>
