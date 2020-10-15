CREATE DATABASE forummvc;

USE forummvc;

CREATE TABLE admins(
    id INT AUTO_INCREMENT,
    name VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(id)
);

CREATE TABLE users(
    id INT AUTO_INCREMENT,
    name VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(id)
);

CREATE TABLE categories(
    id INT AUTO_INCREMENT,
    name VARCHAR(255),
    is_active BOOLEAN NOT NULL DEFAULT 1,
    PRIMARY KEY(id)
);

CREATE TABLE posts(
    id INT AUTO_INCREMENT,
    user_id INT,
    category_id INT,
    title VARCHAR(255),
    body TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(id),
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

