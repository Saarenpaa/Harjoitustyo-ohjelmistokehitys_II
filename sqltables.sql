CREATE TABLE Threads (
    post_topic varchar(100) NOT NULL,
    post_summary varchar (100) NOT NULL,
    post_content varchar (1500) NOT NULL,
    post_date datetime NOT NULL,
    post_img BLOB,
    post_userID varchar(100) NOT NULL
);