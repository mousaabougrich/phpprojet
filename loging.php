<?php
include('connex.php');
include('client.php');
session_start();

// Redirect if user is already logged in
//if (isset($_SESSION['user_id'])) {
 //   header('Location: index.php');
  //  exit;
//}

// Initialize $login_err only when there's an error
$login_err = null;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['password'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $conn = new Connection();
    $link = $conn->conn;
    mysqli_select_db($link, 'crudp1');

    $query = "SELECT id, password FROM Clients WHERE email = ?";
    if ($stmt = mysqli_prepare($link, $query)) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) == 1) {
            mysqli_stmt_bind_result($stmt, $id, $hashed_password);
            if (mysqli_stmt_fetch($stmt)) {
                if (password_verify($password, $hashed_password)) {
                    // Correct password, start the session
                    $_SESSION['user_id'] = $id;
                    $_SESSION['email'] = $email;
                    
                    // Fetch and store the client's name in the session
                    $query = "SELECT firstname, lastname FROM Clients WHERE id = ?";
                    if ($stmt = mysqli_prepare($link, $query)) {
                        mysqli_stmt_bind_param($stmt, "i", $id);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_bind_result($stmt, $firstname, $lastname);
                        if (mysqli_stmt_fetch($stmt)) {
                            $_SESSION['name'] = $firstname . " " . $lastname;
                        }
                        mysqli_stmt_close($stmt);
                    }
                    
                    header("location: index.php");
                    exit;
                } else {
                    // Incorrect password
                    $login_err = "Invalid email or password.";
                }
            }
        } else {
            // Email doesn't exist
            $login_err = "Invalid email or password.";
        }
        mysqli_stmt_close($stmt);
    } else {
        // Database error
        $login_err = "Oops! Something went wrong. Please try again later.";
    }
    mysqli_close($link);
    $_SESSION['name'] = $userName; // The user's name
$_SESSION['userId'] = $userId; // The user's ID

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="mb-3">Login</h2>
                <!-- Only display the error message if $login_err is not null -->
                <?php if ($login_err !== null && $login_err !== '') {
                    echo '<div class="alert alert-danger">' . $login_err . '</div>';
                } ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>    
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Login">
                    </div>
                    <p>Don't have an account? <a href="create.php">Sign up now</a>.</p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
