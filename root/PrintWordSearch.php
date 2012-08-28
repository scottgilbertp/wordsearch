<?php


# Print WordSearch puzzle with specified locations highlighted
#
# Parameters:
# wordsearch - array containing wordsearch puzzle
# $highlitecells - array of (row,col) pairs to highlite

# $data = file("Castle_Word_Find.txt");
# echo $data[row][col];

function PrintWordSearch($wordsearch, $highlitecells) {
        $max_row = count($wordsearch) - 1;
        $max_col = strlen($wordsearch[0]) - 1;

	#print "max_row = " . $max_row . "\n";
	#print "max_col = " . $max_col . "\n";

	print '<table cellpadding="0" cellspacing="0" style="font-size:60%;font-family:courier">' . "\n";

	for ($row = 0; $row <= $max_row; $row++) {
		print "<tr>";
		for ($col = 0; $col < $max_col; $col++) {

			# if current location is in list to be highlighted, then highlight it!
			if ( in_array( array($row,$col), $highlitecells) ) {
				print '<td style="background-color:orange;font-weight:bold">';
			} else {
				print '<td>';
			}

			print $wordsearch[$row][$col] . '</td>';
  		}
		print "</tr>\n";
  	}

	print "</table>\n";
	return 0;
}


?>

