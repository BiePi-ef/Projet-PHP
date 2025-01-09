-- Creer une base de donnée 'mini_projet'
DROP DATABASE IF EXISTS toDoList;
CREATE DATABASE toDoList;

CREATE TABLE users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    userName VARCHAR(30) NOT NULL,
    mdp VARCHAR(1024) NOT NULL
);

CREATE TABLE taches (
    tache_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    tache_name VARCHAR(50) NOT NULL,
    user_id INT REFERENCES users(user_id),
    tache_date DATE DEFAULT(Now())
);

CREATE TABLE fields (
    field_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    field_name VARCHAR(50),
    field_value TINYINT(1) NOT NULL,
    tache_id INT NOT NULL REFERENCES taches(tache_id)
);

-- SELECT m.message_id, m.message_content, u.userName FROM messages AS m JOIN users AS u ON m.user_id = u.user_id;