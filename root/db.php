<?php

function ConnectDB() {
	$link = mysql_connect('localhost', 'wordsearch', 'Gt7goJgVWzLXZrh');
	return $link;
}

function QueryDB($query) {
	mysql_select_db('wordsearch');
	return mysql_query($query);
}

function CloseDB() {
	mysql_close();
}

?>
