<?php

require_once("./FindSeq.php");
require_once("./db.php");

$skiplist = file("./words_to_skip_in_FindAllSeqs.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$dblink = ConnectDB();

$query = "SELECT * FROM found_words;";
$result=QueryDB($dblink,$query);
while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	if ( ! in_array( $line['word'], $skiplist) ) {
		FindSeq($line['start_loc_row'], $line['start_loc_col'], $line['word'], $line['direction']);
	}
}

CloseDB($dblink);

?>

