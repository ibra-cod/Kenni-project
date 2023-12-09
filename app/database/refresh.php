<?php 

require_once './bootstrap.php';
getPDO();


$request = getpdo()->prepare("DROP TABLE `users`");
$request->execute();
$request = getpdo()->prepare("create table `users`(
    
    id primary key not null auto_increment,
    name varvhar(255),
    email varchar(255),
    created_at DATETIME CURRENT_TIMESTAMP
);
");
$request->execute();

$request = getpdo()->prepare("DROP TABLE `products`");
$request->execute();
$request = getpdo()->prepare("create table `products`(
    
    id INT primary key not null auto_increment,
    description LONGTEXT NOT NULL,
    price DECIMAL(5,2) NOT NULL,
    image LONGBLOB NULL,
    created_at DATETIME CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES Persons(id)
);
");
$request->execute();



