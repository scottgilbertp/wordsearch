<?php

include("./db.php");

ConnectDB();

$result=QueryDB('select * from known_words');

while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    #echo "\t<tr>\n";
    #foreach ($line as $col_value) {
    #    echo "\t\t<td>$col_value</td>\n";
    #}
    #echo "\t</tr>\n";
    echo $line['word'] . "\n";
}

QueryDB('INSERT INTO known_words SET word = "test";');

$result=QueryDB('select * from known_words');

while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    #echo "\t<tr>\n";
    #foreach ($line as $col_value) {
    #    echo "\t\t<td>$col_value</td>\n";
    #}
    #echo "\t</tr>\n";
    echo $line['word'] . "\n";
}

QueryDB('DELETE FROM known_words WHERE word = "test";');

$result=QueryDB('select * from known_words');

while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    #echo "\t<tr>\n";
    #foreach ($line as $col_value) {
    #    echo "\t\t<td>$col_value</td>\n";
    #}
    #echo "\t</tr>\n";
    echo $line['word'] . "\n";
}


CloseDB();


?>

