<?php
// client_plan.php - This is a hypothetical script

include('connex.php');
include('Client.php');

session_start(); // Start the session to access session variables

function getUserPlans($userId) {
    $connex = new Connection();
    $connex->selectDatabase('crudp1');
    $db = $connex->getConnection();

    $stmt = $db->prepare("SELECT * FROM ClientPlans JOIN Plans ON ClientPlans.plan_id = Plans.id WHERE ClientPlans.client_id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    $plans = [];
    while ($row = $result->fetch_assoc()) {
        $plans[] = $row;
    }

    $stmt->close();
    return $plans;
}

// Check if the user is logged in (i.e., user_id is set in the session)
if (isset($_SESSION['user_id'])) {
    $currentUserId = $_SESSION['user_id']; // Get user ID from session
    $plans = getUserPlans($currentUserId); // Retrieve plans for the user
} else {
    // Redirect to the login page if the user is not logged in
    header('Location: loging.php');
    exit;
}

// Proceed with the rest of your script, such as displaying the plans
?>
