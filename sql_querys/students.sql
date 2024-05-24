CREATE TABLE IF NOT EXISTS students( 
    studentid int AUTO_INCREMENT,
    name varchar(25) NOT NULL,
    userid int,
    PRIMARY KEY (studentid),
    FOREIGN KEY (userid) REFERENCES users(userid)
);