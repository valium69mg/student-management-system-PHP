CREATE TABLE IF NOT EXISTS students( 
    studentid int AUTO_INCREMENT,
    name varchar(25) NOT NULL,
    p1 int NOT NULL DEFAULT 0,
    p2 int NOT NULL DEFAULT 0,
    p3 int NOT NULL DEFAULT 0,
    cf int NOT NULL DEFAULT 0,
    userid int,
    PRIMARY KEY (studentid),
    FOREIGN KEY (userid) REFERENCES users(userid)
);