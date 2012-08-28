<?php

require_once("./FindSeq.php");
require_once("./db.php");

$skiplist = file("./words_to_skip_in_FindAllSeqs.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

ConnectDB();

$query = "SELECT * FROM found_words;";
$result=QueryDB($query);
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
	if ( ! in_array( $line['word'], $skiplist) ) {
		FindSeq($line['start_loc_row'], $line['start_loc_col'], $line['word'], $line['direction']);
	}
}

CloseDB();

?>

