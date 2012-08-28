#!/bin/sh

/bin/date >> /var/log/WordSearchDaemon.log

cd /root
/usr/bin/php /root/WordSearchDaemon.php >> /var/log/WordSearchDaemon.log
