

<?php 
session_start(); 
$server = "localhost";
$username = "uaaqxzmb_dashboard";
$password = "Powerband@2020";
$dbname = "uaaqxzmb_dashboard";


$conn = mysqli_connect($server, $username, $password, $dbname);

if (isset($_POST['email']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
	$password = validate($_POST['password']);

	if (empty($email)) {
		header("Location: index.php?error=User Name is required");
	    exit();
	}else if(empty($password)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM `register` WHERE `email`='$email' AND `password`='$password'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['email'] === $email && $row['password'] === $password) {
            	
                $_SESSION['role'] = $row['role'];
               $_SESSION['branch'] = $row['branch'];
               $_SESSION['id'] = $row['id'];
               $role=$_SESSION['role'];
            	//echo"<script type='text/javascript'>alert('Welcome to swallooalayaseen.com');window.location.href='profile.php';</script>";
            	//header("Location: index11.php");
            	if($role == "Admin"){ 
            	    header("location:index11.php"); 
            	 exit();
                }
               elseif($row['role'] == "Manager"){ 
                   header("location: managerdashboard.php"); exit();
                }
              elseif ($row['role'] == "Employee"){ 
                  header("location: employeedashboard.php"); 
            exit();
            }
       
				
		        exit();
            }else{
				header("Location: index.php?error=Incorrect User name or password");
		        exit();
			}
		}else{
			header("Location: index.php?error=Incorrect User name or password");
	        exit();
		}
	}

}else{
	header("Location: index.php");
	exit();
}

?>

