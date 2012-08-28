<?php

# $data = file("Castle_Word_Find.txt");
# echo $data[row][col];

function NewLocInDir($loc_row, $loc_col, $direction, $distance) {

	# Returns two element array of (new_loc_row, new_loc_col)
	# loc_row - starting row location to check
	# loc_col - starting col location to check
	# direction to check (N, NE, E, SE, S, SW, W, NW)
	# distance - distance to go

	switch ($direction) {
	        case 'N':
			$new_loc_row = $loc_row - $distance;
			$new_loc_col = $loc_col;
			break;
	        case 'NE':
			$new_loc_row = $loc_row - $distance;
			$new_loc_col = $loc_col + $distance;
			break;
	        case 'E':
			$new_loc_row = $loc_row;
			$new_loc_col = $loc_col + $distance;
			break;
	        case 'SE':
			$new_loc_row = $loc_row + $distance;
			$new_loc_col = $loc_col + $distance;
			break;
	        case 'S':
			$new_loc_row = $loc_row + $distance;
			$new_loc_col = $loc_col;
			break;
	        case 'SW':
			$new_loc_row = $loc_row + $distance;
			$new_loc_col = $loc_col - $distance;
			break;
	        case 'W':
			$new_loc_row = $loc_row;
			$new_loc_col = $loc_col - $distance;
			break;
	        case 'NW':
			$new_loc_row = $loc_row - $distance;
			$new_loc_col = $loc_col - $distance;
			break;
		default:
			#Yikes this should never happen!
			echo "NewLocInDir function was passed invalid direction of" . $direction ; 
	}
	return array ($new_loc_row, $new_loc_col);
			
}


?>
