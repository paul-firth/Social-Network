drop table if exists posts;
create table posts (    
    postid integer not null primary key autoincrement,  
    name varchar(80) not null,
    title varchar(80) not null,    
    message text default '',
    num_com integer
); 
insert into posts values (null, "Paul", "My Post",  "This is a post", "2");
insert into posts values (null, "Paul", "Another Post",  "This is a another post", "0");
insert into posts values (null, "Paul", "Tribute",  "This is not another post this is a tribute", "1");

drop table if exists comments;
create table comments (    
    commentid integer not null primary key autoincrement,  
    name varchar(80) not null,
    message text default '',
    post integer not null,
    FOREIGN KEY(post) REFERENCES posts(postid)
); 
insert into comments values (null, "Paul", "Great Post Paul", "1");
insert into comments values (null, "Paul", "This is a another comment", "1");
insert into comments values (null, "Paul", "This is not another comment this is a tribute", "3");

