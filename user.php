<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Plans</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container my-5">
    <h2>Your Plan Details</h2>
    <button class="btn btn-secondary mb-3" onclick="printPage()">Print this page</button>

    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Plan Name</th>
                <th>Price</th>
                <!-- Add other columns as necessary -->
            </tr>
        </thead>
        <tbody>
            <?php
            include('client_plan.php'); // Include the PHP script here
            $totalPrice = 0;
            foreach ($plans as $plan) {
                echo "<tr>
                        <td>{$plan['name']}</td>
                        <td>\${$plan['price']}</td>
                      </tr>";
                $totalPrice += $plan['price'];
            }
            ?>
        </tbody>
    </table>

    <div><strong>Total Price: </strong> $<?php echo $totalPrice; ?></div>
</div>

<script>
function printPage() {
    window.print();
}
</script>

</body>
</html>
