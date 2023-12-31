<?PHP class ClientPlan {
    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }
// Connection script

    public function subscribe($clientId, $planId) {
        $stmt = $this->db->prepare("INSERT INTO ClientPlans (client_id, plan_id) VALUES (?, ?)");
        $stmt->bind_param("ii", $clientId, $planId);
        if (!$stmt->execute()) {
            return "Error: " . $stmt->error;
        }
        $stmt->close();
        return true;
    }
    public function updatePlan($clientId, $planId) {
        $stmt = $this->db->prepare("UPDATE ClientPlans SET plan_id = ? WHERE client_id = ?");
        $stmt->bind_param("ii", $planId, $clientId);
        if (!$stmt->execute()) {
            return "Error: " . $stmt->error;
        }
        $stmt->close();
        return true;
    }
    public function deleteClientPlan($clientId, $planId) {
        $query = "DELETE FROM ClientPlans WHERE client_id = ? AND plan_id = ?";
        
        if ($stmt = $this->db->prepare($query)) {
            $stmt->bind_param("ii", $clientId, $planId);

            if (!$stmt->execute()) {
                // Handle execution error
                error_log("Error executing query: " . $stmt->error);
                return false;
            }

            $stmt->close();
            return true;
        } else {
            // Handle preparation error
            error_log("Error preparing query: " . $this->db->error);
            return false;
        }
    }
}
?>