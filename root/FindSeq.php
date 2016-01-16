<?php

require_once("./NewLocInDir.php");
require_once("./db.php");

# $data = file("Castle_Word_Find.txt");
# echo $data[row][col];


function FindSeq($row, $col, $word, $dir) {
	
	$skiplist = file("./words_to_skip_in_FindAllSeqs.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

	$dblink = ConnectDB();
	$new_locs = NewLocInDir($row, $col, $dir, strlen(str_replace(' ', '', $word)) );
	$new_row = $new_locs[0]; 
	$new_col = $new_locs[1]; 
	#print $new_row . "  " . $new_col . "\n";
	$query = "SELECT * FROM found_words WHERE start_loc_row = $new_row AND start_loc_col = $new_col AND direction = \"$dir\" ;";
	#print $query . "\n";
        $result=QueryDB($dblink,$query);
        while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		$found_row = $line['start_loc_row'];
                $found_col = $line['start_loc_col'];
                $found_dir = $dir;
		$found_word = $line['word'];
                                
		
		if ( ! in_array( $found_word, $skiplist) ) {
			#print "Sequence Found: " . $word . " " . $found_word . " starting at (" . $row . ", " . $col . ") in direction " . $dir . "\n";
			print $word . " " . $found_word  . "\n";
			FindSeq($row, $col, $word . ' ' . $found_word, $dir);
		}
                                
         }
	CloseDB($dblink);

}


?>
