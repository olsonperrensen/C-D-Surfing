CREATE TABLE adsCats (
     id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    categoryID int not null ,
    ownerID int not null,
    name VARCHAR(255) not null,
    gender VARCHAR(255) not null,
    age int not null,
    size VARCHAR(255) not null,
    color VARCHAR(255) not null,
    story text not null,
    diet text not null,
    
    CONSTRAINT `fk_ads_cats_categoryID`
    FOREIGN KEY (categoryID) REFERENCES cats (id),
    CONSTRAINT `fk_ads_cats_ownerID`
    FOREIGN KEY (ownerID) REFERENCES users (id)
    ON DELETE CASCADE
    ON UPDATE RESTRICT
 );