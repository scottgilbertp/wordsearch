<?php

function ConnectDB() {
	$link = mysql_connect('localhost', 'wordsearch', 'password');
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
