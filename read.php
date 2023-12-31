<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container my-5">
    <h2 class="mb-4">List of Users and Their Plans</h2>
    <a class="btn btn-primary mb-3" href="create.php" role="button">Signup</a>
    <a class="btn btn-info mb-3" href="generate_pdf.php" role="button">Download as PDF</a>
    <button class="btn btn-secondary mb-3" onclick="printPage()">Print this page</button>

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
                        <td>{$row['plan_names']}</td> <!-- Updated from plan_name to plan_names -->
                        <td>
                            <a class='btn btn-success btn-sm' href='update.php?id={$row['id']}'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='delete.php?id={$row['id']}'>Delete</a>";
            
                // Check if the client has two plans
                if ($row['plan_count'] >= 2) {
                    echo "<a class='btn btn-warning btn-sm' href='delete_plan.php?id={$row['id']}'>Delete Plan</a>";
                }
            
                echo "</td>
                    </tr>";
            }
            
            
            

            ?>
        </tbody>
    </table>
</div>

<script>
function printPage() {
    window.print();
}
</script>


</body>
</html>
