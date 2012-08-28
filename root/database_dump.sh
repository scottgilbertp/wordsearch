#!/bin/sh

/usr/bin/mysqldump -A | /bin/gzip  > /root/database_dumps/database_dump-`date +%d`.sql.gz
