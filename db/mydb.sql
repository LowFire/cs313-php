CREATE TABLE users (
	user_id serial NOT NULL PRIMARY KEY,
	username varchar(80) NOT NULL,
	password varchar(80) NOT NULL
);

CREATE TABLE calendar (
	event_id serial NOT NULL,
	eventName varchar(255),
	eventDesc varchar(1024),
	eventDate date,
	eventHr int,
	eventMin int,
	eventAbbriv varchar(2),
	user_id int,
	PRIMARY KEY (event_id),
	FOREIGN KEY (user_id) REFERENCES users(user_id)
);

CREATE TABLE subscribers (
	user_sub_id int,
	subscribee_id int,
	PRIMARY KEY (subscriber_id),
	FOREIGN KEY (user_sub_id) REFERENCES users(user_id),
	FOREIGN KEY (subscribee_id) REFERENCES users(user_id)
);