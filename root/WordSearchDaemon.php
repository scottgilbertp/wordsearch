<?php

require_once("./SearchForWord.php");
require_once("./db.php");

$data = file("Castle_Word_Find.txt");
# echo $data[row][col];

$start_time = time();
$max_run_time = 275; # a little under 5 minutes


ConnectDB();

function QueueCount() {
	$queue_count_result=QueryDB('SELECT count(*) AS count FROM search_queue;');
	$queue_count_line =  mysql_fetch_array($queue_count_result, MYSQL_ASSOC);
	return $queue_count_line['count'];
}


while ( time() - $start_time < $max_run_time ) {

	while ( (QueueCount() > 0) && (time() - $start_time < $max_run_time) ) {

		if ( $result=QueryDB('SELECT word FROM search_queue ORDER BY date_submitted LIMIT 1 FOR UPDATE;') ) {
	
			$line = mysql_fetch_array($result, MYSQL_ASSOC);
			$word = $line['word'];
			print 'Searching for: ' . $word . "\n";
	
			if ( $count=SearchForWord($word, $data) )
				print "Found \"" . $word . "\" " . $count . " times \n";
	
			#print 'DELETE FROM search_queue WHERE word = "' . $word . '";' . "\n";
			QueryDB('DELETE FROM search_queue WHERE word = "' . $word . '";') or die(mysql_error()); 
		}
		print "sleeping 1\n";
		sleep(1);
	}
	print "sleeping 20\n";
	sleep(20);
}

print "Exiting...\n";
CloseDB();

?>
