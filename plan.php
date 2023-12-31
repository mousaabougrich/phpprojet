<?php class Plan {
    public $id;
    public $name;
    public $price;
    public $features;

    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function createPlan($name, $price, $features) {
        $stmt = $this->conn->prepare("INSERT INTO Plans (name, price, features) VALUES (?, ?, ?)");
        $stmt->bind_param("sds", $name, $price, $features);
        $stmt->execute();
        $stmt->close();
    }

    public function subscribeClient($clientId, $planId) {
        $stmt = $this->conn->prepare("INSERT INTO ClientPlans (client_id, plan_id) VALUES (?, ?)");
        $stmt->bind_param("ii", $clientId, $planId);
        $stmt->execute();
        $stmt->close();
    }
}
?>