CREATE TABLE album (
  id int(3) NOT NULL AUTO_INCREMENT,
  artist varchar(100)  NOT NULL,
  name varchar(100) NOT NULL,
  artwork varchar(200) NOT NULL,
  purchase varchar(200) NOT NULL,
  description varchar(1000) NOT NULL,
  review varchar(2000) NOT NULL,
  PRIMARY KEY (id)
);