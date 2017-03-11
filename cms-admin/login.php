<?php 
session_start();
//important vars
$noNav = '';
$pageTitle = 'Login';
if(isset($_SESSION['username'])){
     header('Location: index.php');
}
require 'config/core.inc.php';
require $inc.'login_head.inc.php'; 
	
        
        //check if user comming from the post request
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $username = $_POST['username'];
            $password = $_POST['pass'];
            $hashPass = sha1($password);
            
            //check if the user exists in database
            $stmt  = $conn->prepare("SELECT * From admin WHERE username = ? AND pass = ? AND admin_sts = 1 LIMIT 1");
            $stmt->execute(array($username, $hashPass));
            $row   = $stmt->fetch();
            $count = $stmt->rowCount();
            
            //if the count > 0 then the admin exist
            if($count > 0){
                $_SESSION['username'] = $username;
                $_SESSION['adminId'] = $row['admin_id'];
                $_SESSION['name'] = $row['admin_first_name'].' '.$row['admin_last_name'];
                header('Location: index.php');
                exit();
            }
        }
        ?>
<body class="login-body">  
	<form method="POST" action="<?php $_SERVER['PHP_SELF']?>" class="login">
		<h4 class="text-center">Admin Login</h4>
		<input type="text" name="username" class="form-control" placeholder="Username" autocomplete="off" required />
		<input type="password" name="pass" class="form-control" placeholder="Password" autocomplete="new-password" required />
		<input type="submit" name="login" class="btn btn-primary btn-block" value="Login" />
	</form>

<?php require $inc.'ending.inc.php'; ?>


