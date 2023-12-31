<?php
if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Include connection and client files
    include('connex.php');
    include('client.php');

    // Create an instance of the Connection class and select the database
    $connex = new Connection();
    $connex->selectDatabase('crudp1');

    // Call the static deleteClient method
    Client::deleteClient('Clients', $connex->conn, $id);

    // Redirect back to the list page after deletion
    header('Location: read.php'); // Replace with your actual list page
    exit;
}
?>


