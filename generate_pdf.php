<?php
use Mpdf\Mpdf;
require_once 'C:\xampp\1\htdocs\clone1\vendor\autoload.php';

// Create an instance of the Mpdf class
$mpdf = new Mpdf();

// Rest of your code...


// Start buffering the output
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Content</title>
    <!-- Include Bootstrap CSS for styling -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; line-height: 1.6; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

<div class="container my-5">
    <h2 class="mb-4">List of Users and Their Plans</h2>
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Plan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include('connex.php');
            include('Client.php');

            $connex = new Connection();
            $connex->selectDatabase('crudp1');
            
            $clientsWithPlans = Client::getClientsWithPlans($connex->conn);

            foreach ($clientsWithPlans as $row) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['firstname']}</td>
                        <td>{$row['lastname']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['plan_name']}</td>
                        <td>Edit/Delete</td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>

<?php
// Get the content of the buffer
$html = ob_get_contents();
ob_end_clean();

// Write the HTML content to the PDF
$mpdf->WriteHTML($html);

// Output the PDF to the browser
$mpdf->Output('users_plans.pdf', 'I');
?>
