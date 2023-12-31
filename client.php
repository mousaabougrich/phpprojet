<?php


class Client{


public $id;
public $firstname;
public $lastname;
public $email;
public $password;
public $reg_date; 


public static $errorMsg = "";


public static $successMsg="";

/*public static function getClientsWithPlans($conn) {
    $sql = "SELECT Clients.id, Clients.firstname, Clients.lastname, Clients.email, Plans.name AS plan_name
            FROM Clients
            LEFT JOIN ClientPlans ON Clients.id = ClientPlans.client_id
            LEFT JOIN Plans ON ClientPlans.plan_id = Plans.id";

    $result = mysqli_query($conn, $sql);
    $data = [];
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }
    return $data;
}*/
public static function getClientsWithPlans($conn) {
    $sql = "SELECT Clients.id, Clients.firstname, Clients.lastname, Clients.email, 
                   GROUP_CONCAT(Plans.name ORDER BY Plans.name SEPARATOR ', ') AS plan_names, 
                   COUNT(ClientPlans.plan_id) as plan_count
            FROM Clients
            LEFT JOIN ClientPlans ON Clients.id = ClientPlans.client_id
            LEFT JOIN Plans ON ClientPlans.plan_id = Plans.id
            GROUP BY Clients.id";

    $result = mysqli_query($conn, $sql);
    $data = [];
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }
    return $data;
}


public function __construct($firstname,$lastname,$email,$password){


    //initialize the attributs of the class with the parameters, and hash the password
    $this->firstname=$firstname;
    $this->lastname=$lastname;
    $this->email=$email;
    $this->password=password_hash($password,PASSWORD_DEFAULT);

}


public function insertClient($tableName,$conn){


//insert a client in the database, and give a message to $successMsg and $errorMsg

$sql = "INSERT INTO $tableName(firstname, lastname, email,password)
VALUES ('$this->firstname', '$this->lastname', '$this->email','$this->password')";
if (mysqli_query($conn, $sql)) {
self::$successMsg= "New record created successfully";
//header("Location:loging.php");
} else {
self::$successMsg= "Error: " . $sql . "<br>" . mysqli_error($conn);
}



}


/*public static function  selectAllClients($tableName,$conn){


//select all the client from database, and inset the rows results in an array $data[]
$sql = "SELECT id, firstname,email ,lastname,password FROM $tableName";
$result = mysqli_query($conn, $sql);
 if (mysqli_num_rows($result) > 0) {
$data=[];
 while($row = mysqli_fetch_assoc($result)) {
$data[]=$row;
 }
 return $data;
}
}*/

static function selectClientById($tableName,$conn,$id){
    //select a client by id, and return the row result
    $sql = "SELECT firstname, lastname,email FROM $tableName WHERE id='$id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
// output data of each row
$row = mysqli_fetch_assoc($result);


}
return  $row; 
}


static function updateClient($client,$tableName,$conn,$id){
    //update a client of $id, with the values of $client in parameter
    //and send the user to read.php
    $sql = "UPDATE $tableName SET lastname='{$client->lastname}', firstname='{$client->firstname}', email='{$client->email}' WHERE id='$id'";

        if (mysqli_query($conn, $sql)) {
           self::$successMsg= "New record updated successfully";

header("Location:read.php");

        } else {
       self::$errorMsg= "Error updating record: " . mysqli_error($conn);
        }


}


public static function deleteClient($tableName, $conn, $id) {
    // First delete any associated plans in the ClientPlans table
    $stmt = $conn->prepare("DELETE FROM ClientPlans WHERE client_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    
    $stmt = $conn->prepare("DELETE FROM $tableName WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    header("Location:read.php");
}
public static function getAllPlans($conn) {
    $plans = [];
    $result = mysqli_query($conn, "SELECT * FROM Plans");
    while ($row = mysqli_fetch_assoc($result)) {
        $plans[] = $row;
    }
    return $plans;
}

}
?>
