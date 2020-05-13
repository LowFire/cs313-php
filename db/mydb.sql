CREATE TABLE users (
	userID int NOT NULL PRIMARY KEY,
	username varchar(80) NOT NULL,
	password varchar(80) NOT NULL
);

CREATE TABLE calendar (
	eventID int NOT NULL,
	eventName varchar(255),
	eventDesc varchar(1024),
	eventDate date,
	eventHr int,
	eventMin int,
	eventAbbriv varchar(2),
	userid int,
	PRIMARY KEY (eventID),
	FOREIGN KEY (userid) REFERENCES users(userid)
);

CREATE TABLE subscribers (
	subscriber_id int NOT NULL,
	user_sub_id int,
	subscribee_id int,
	PRIMARY KEY (subscriber_id),
	FOREIGN KEY (user_sub_id) REFERENCES users(userid),
	FOREIGN KEY (subscribee_id) REFERENCES users(userid)
);