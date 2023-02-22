-- database creation --
-- CREATE DATABASE library_diems;

-- use the database --
-- USE library_diems;

-- schema for the branch table--
-- CREATE TABLE branch(
--     branchId INT NOT NULL AUTO_INCREMENT,
--     branch CHAR NOT NULL,
--     PRIMARY KEY (branchId)
-- )

-- schema for the student table --
-- CREATE TABLE student(
--     srno INT NOT NULL AUTO_INCREMENT,
--     name VARCHAR(30) NOT NULL,
--     email VARCHAR(60) NOT NULL UNIQUE,
--     prn INT NOT NULL,
--     contact VARCHAR(10) NOT NULL,
--     class CHAR NOT NULL,
--     year ENUM('1','2','3','4') DEFAULT '1',
--     branchId INT,
--     CONSTRAINT pk_student PRIMARY KEY (srno, prn)
-- )

-- add foreign key to student schema
-- ALTER TABLE student
-- ADD FOREIGN KEY (branchId) REFERENCES branch(branchId);

-- add date column to student schema
-- ALTER TABLE student
-- ADD registeredOn DATE DEFAULT CURRENT_TIMESTAMP;

-- update in colums to student schema
-- ALTER TABLE student
-- MODIFY COLUMN class char(10);

-- ALTER TABLE student
-- MODIFY COLUMN prn INT NOT NULL UNIQUE;

-- update in column to branch schema
-- ALTER TABLE branch
-- MODIFY COLUMN branch CHAR(60);

-- 2nd update to branch table
-- ALTER TABLE branch
-- MODIFY COLUMN branch CHAR(60) NOT NULL UNIQUE;

-- dummy data
-- INSERT INTO branch (branch) VALUES ('COMPUTER SCIENCE');
-- INSERT INTO branch (branch) VALUES ('ELECTRONICS AND TELECOMMUNICATION ENGINEERING');

-- INSERT INTO student (name, email, prn, contact, class, year, branchId) VALUES ('yashwant', 'yash.mangt1@gmail.com', 1921100321, 8329659032,"ty-a", 4, 5);


-- schema for book table
-- CREATE TABLE book(
--     srno INT NOT NULL AUTO_INCREMENT,
--     accessionNo CHAR(20) NOT NULL UNIQUE,
--     author CHAR(100) NOT NULL,
--     availableQty TINYINT NOT NULL,
--     title VARCHAR(100) NOT NULL,
--     genre CHAR(50) DEFAULT "NULL",
--     publisher CHAR(100) DEFAULT "NULL",
--     qty TINYINT NOT NULL,
--     status BOOLEAN DEFAULT 0,
--     CONSTRAINT pk_book PRIMARY KEY (srno, accessionNo)
-- )

-- schema for issued table
-- CREATE TABLE issued(
--     srno INT NOT NULL AUTO_INCREMENT,
--     accessionNo CHAR(20) NOT NULL,
--     prn INT NOT NULL,
--     date DATE DEFAULT CURRENT_TIMESTAMP,
--     PRIMARY KEY (srno),
--     FOREIGN KEY (accessionNo) REFERENCES book (accessionNo),
--     FOREIGN KEY (prn) REFERENCES student (prn)
-- )

-- schema for returned table
-- CREATE TABLE returned(
--     srno INT NOT NULL AUTO_INCREMENT,
--     accessionNo CHAR(20) NOT NULL,
--     prn INT NOT NULL,
--     issedDate DATE NOT NULL,
--     date DATE DEFAULT CURRENT_TIMESTAMP,
--     PRIMARY KEY (srno),
--     FOREIGN KEY (accessionNo) REFERENCES book(accessionNo),
--     FOREIGN KEY (prn) REFERENCES student(prn)
-- );


---------- SCHEMA FOR CATEGORY TABLE -----------
-- CREATE TABLE category(
--     srno INT NOT NULL AUTO_INCREMENT,
--     category char(50) NOT NULL DEFAULT "motivational",
--     description char(100) NULL DEFAULT "any motivational book can be alloted here",
--     PRIMARY key (srno)
-- );

-- ALTER TABLE category
-- MODIFY COLUMN category CHAR(50) UNIQUE NOT NULL DEFAULT "motivational";


-- ALTER TABLE book
-- DROP COLUMN genre;

-- ALTER TABLE book
-- ADD category INT NOT NULL;

-- ALTER TABLE book
-- ADD registeredOn DATE DEFAULT CURRENT_TIMESTAMP;

-- ALTER TABLE book
-- ADD price INT;

-- ALTER TABLE book
-- ADD totalPages SMALLINT(255);

-- ALTER TABLE returned
-- ADD rating BIT(1) NOT NULL DEFAULT 1;