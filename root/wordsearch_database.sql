
# search_queue (contains queue of words we want to search for)

DROP TABLE IF EXISTS `search_queue`;
CREATE TABLE search_queue (
	word VARCHAR(128),
	date_submitted TIMESTAMP(8) DEFAULT NOW(),
	PRIMARY KEY (`date_submitted`,`word`),
	UNIQUE KEY `word` (`word`)
       ) TYPE=innodb;

# known_words  (list of words for which we have performed searches)

DROP TABLE IF EXISTS `known_words`;
CREATE TABLE known_words (
        word VARCHAR(128),
	number_found INT,
	date_searched TIMESTAMP(8) DEFAULT NOW(),
	PRIMARY KEY (`word`)
       ) TYPE=innodb;


# found_words  (location of all found words)

DROP TABLE IF EXISTS `found_words`;
CREATE TABLE found_words (
        word VARCHAR(128),
	start_loc_row INT,
	start_loc_col INT,
	direction   enum('N','NE','E','SE','S','SW','W','NW'),
	date_found TIMESTAMP(8) DEFAULT NOW(),
	PRIMARY KEY (`word`,`start_loc_row`,`start_loc_col`,`direction`),
	KEY `start_loc_row` (`start_loc_row`,`start_loc_col`,`direction`)
       ) TYPE=innodb;

