<?php
include("connex.php"); // Adjust the path to your connection script
include("Plan.php");   // Include the Plan class

// Create an instance of the Connection class
$connex = new Connection();
$connex->selectDatabase('crudp1'); 
$db = $connex->getConnection();

$plan = new Plan($db);

// Existing plans
$existingPlans = [
    ['Basic Plan', 16.00, 'Smart workout plan, At home workouts'],
    ['Weekly Plan', 25.00, 'PRO Gyms, Smart workout plan, At home workouts'],
    ['Monthly Plan', 45.00, 'ELITE Gyms & Classes, PRO Gyms, Smart workout plan, At home workouts, Personal Training']
];

// New plans from the HTML section
$newPlans = [
    ['Strength', 29.99, 'Embrace the essence of strength with physical, mental, and emotional training.'],
    ['Physical Fitness', 34.99, 'Range of activities for health, strength, flexibility, and overall well-being.'],
    ['Fat Lose', 39.99, 'Workout routines and expert guidance for reaching your fat loss goals.'],
    ['Weight Gain', 44.99, 'Effective approach to gaining weight in a sustainable manner.']
];

// Merge existing and new plans
$allPlans = array_merge($existingPlans, $newPlans);

// Insert each plan into the database
foreach ($allPlans as $p) {
    $plan->createPlan($p[0], $p[1], $p[2]);
}

echo "Plans populated successfully.";
?>
