<html>
<head>
<title>The Worlds Largest Wordsearch - Solved!</title>
</head>
<body>
<!-- Hello World!! -->
<h2> The Worlds Largest Wordsearch - Solved!</h2>

Enter a word or phrase to find in the Worlds Largest Wordsearch:
<br>
<br>
<form action="/" method="get"/>
<input type="text" name="word"/>
<input type="submit" value="Search"/>
</form>

<!-- Yes, this is probably the most basic, lame website you have ever seen.  Sorry, I suck at graphical design. -->

<?php

require_once("./db.php");
require_once("./LocsUsedByWord.php");
require_once("./PrintWordSearch.php");

$word = 'AE';

if ($word <> '') {
	# Convert to all uppercase
	$word = strtoupper($word);
	# Strip out all whitespace and anything outside of the A-Z range
	$word = preg_replace("(\W|[^A-Z])", '', $word);

	$dblink = ConnectDB();
	$result=QueryDB($dblink,'SELECT * FROM known_words WHERE word = "'. $word . '" LIMIT 1;');
	if ($line = mysqli_fetch_array($result, MYSQL_ASSOC)) {
		$number_found = $line['number_found'];
		if ($number_found == 0) {
			print "<b>$word</b> does not exist in the Wordsearch. <br>\n";
		} else {
			if ($number_found > 1 ) { $plural = 's' ;} else { $plural = ''; }
			print "<b>$word</b> is found in the Wordsearch <b>$number_found</b> time$plural:<br>\n<br>\n";
			#print "(Row , Column) Direction<br>\n";

			$locs = array(9999,9999);  # seem to need to initialize the array
			unset($locs[0]);
			unset($locs[1]);

			$result_locs=QueryDB($dblink,'SELECT * FROM found_words WHERE word = "'. $word . '";');
			while ($line_locs = mysqli_fetch_array($result_locs, MYSQL_ASSOC)) {
				$row = $line_locs['start_loc_row'];
				$col = $line_locs['start_loc_col'];
				$dir = $line_locs['direction'];
				#print "($row  , $col)  $dir<br>\n";
				
				$locs = array_merge( (array)$locs, (array)LocsUsedByWord($row, $col, $dir, strlen($word) ) );
				
			}
			
			# print the puzzle with the words highlighted
			#print "<pre>\n"; print_r($locs); print "</pre>\n";
			$data = file("Castle_Word_Find.txt");
			PrintWordSearch($data, $locs);

		}

	} else {
		print "Thats a new one! I haven't searched for <b>$word</b> yet - I've added it to list to search.<br><br>\n";
		print "Check back in a minute or two - I should have results by then!<br>\n";
		#QueryDB('INSERT INTO search_queue set word ="' . $word . '" ON DUPLICATE KEY UPDATE;');
		QueryDB($dblink,'INSERT INTO search_queue set word ="' . $word . '";');
	}
	CloseDB($dblink);

}

?>

<!-- Why are you still reading this nonsense? -->
</body>
</html>
