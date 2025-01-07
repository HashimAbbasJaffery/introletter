<?php
session_start();
include "../config.php";

if(isset($_POST['login']))
{
    $name = $_POST['name'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM users WHERE name = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $name, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    
    if(!empty($data))
    {
        $_SESSION['user_role'] = $data['role'];
        $_SESSION['name'] = $data['name'];
        
        if ($data['role'] == 'Admin') {
            header('location:manage_member.php');
        }else if($data['role'] === 'User'){
            header('location: dashboard.php');
        } else {
            header('location: find_address.php');
        }
        exit();
    } else {
        echo "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>User Name</label>
     	<input type="text" name="name" placeholder="User Name"><br>
		
     	<label>User Name</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<button type="submit" name="login">Login</button>
     </form>
</body>
</html>