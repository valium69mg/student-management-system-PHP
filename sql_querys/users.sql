CREATE TABLE IF NOT EXISTS users( 
    userid int AUTO_INCREMENT,
    username varchar(25) NOT NULL,
    password varchar(30) NOT NULL,
    PRIMARY KEY (userid)
);