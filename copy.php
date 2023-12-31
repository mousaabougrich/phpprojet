<?php
session_start();
include("connex.php"); // Adjust the path to your connection script

if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header('Location: login.php');
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['plan_id'])) {
    $clientId = $_SESSION['user_id']; // Get the client's ID from the session
    $planId = $_POST['plan_id']; // Get the plan ID from the submitted form

    $conn = new Connection(); // Assuming this creates a database connection
    $db = $conn->getConnection();

    // Select the database
    mysqli_select_db($db, 'crudp1'); // Replace 'crudp1' with your actual database name

    // Prepare and execute the SQL query
    $stmt = $db->prepare("INSERT INTO ClientPlans (client_id, plan_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $clientId, $planId);

    if ($stmt->execute()) {
        echo "You have successfully subscribed to the plan!";
    
header('Location: index.php');
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $db->close();
} else {
    echo "Invalid request";
}
?>
<?php
include("connex.php");

// Create an instance of your connection class
$connex = new Connection();
$connex->selectDatabase('crudp1'); 
$db = $connex->getConnection();

$plans = [
    ['Basic Plan', 16.00, 'Smart workout plan, At home workouts'],
    ['Weekly Plan', 25.00, 'PRO Gyms, Smart workout plan, At home workouts'],
    ['Monthly Plan', 45.00, 'ELITE Gyms & Classes, PRO Gyms, Smart workout plan, At home workouts, Personal Training']
];

foreach ($plans as $plan) {
    $query = "INSERT INTO plans (name, price, features) VALUES (?, ?, ?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param("sds", $plan[0], $plan[1], $plan[2]);
    $stmt->execute();
    $stmt->close();
}

echo "Plans populated successfully.";

?>