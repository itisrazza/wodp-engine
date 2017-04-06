CREATE TABLE blog_posts (

	id int(10) NOT NULL auto_increment,
	pname varchar(64) NOT NULL,
	title varchar(64) NOT NULL,
	header mediumtext NOT NULL,
	body longtext NOT NULL,
	footer mediumtext NOT NULL, 
	tags mediumtext NOT NULL,

	PRIMARY KEY (id)

);