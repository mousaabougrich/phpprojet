<?php

include("connex.php");

$connex = new Connection(); // Create an instance of Connection class

// Create and select the database
$connex->createDatabase('crudp1');
$connex->selectDatabase('crudp1');

// SQL to create Clients table
$clientsTableQuery = "
CREATE TABLE IF NOT EXISTS Clients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50) UNIQUE,
    password VARCHAR(80) NOT NULL
);";

// SQL to create Plans table
$plansTableQuery = "
CREATE TABLE IF NOT EXISTS Plans (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    features TEXT NOT NULL
);";

// Ensure the Clients and Plans tables are created first
$connex->createTable($clientsTableQuery);
$connex->createTable($plansTableQuery);

// SQL to create ClientPlans table
$clientPlansTableQuery = "
CREATE TABLE IF NOT EXISTS ClientPlans (
    client_id INT(6) UNSIGNED NOT NULL,
    plan_id INT(6) UNSIGNED NOT NULL,
    PRIMARY KEY(client_id, plan_id),
    FOREIGN KEY (client_id) REFERENCES Clients(id),
    FOREIGN KEY (plan_id) REFERENCES Plans(id)
);";

// Create the ClientPlans table after the Clients and Plans tables
$connex->createTable($clientPlansTableQuery);

?>
