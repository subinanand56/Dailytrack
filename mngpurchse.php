<?php
session_start();
$server = "localhost";
$username = "root";
$password = "";
$dbname="dashboard";


$conn = mysqli_connect($server, $username, $password, $dbname);

if (isset($_POST['submit'])) {

    if (!empty($_POST['branch']) && !empty($_POST['amount']) && !empty($_POST['pname']) && !empty($_POST['cname']) && !empty($_POST['date'])) {
        $branch = $_POST['branch'];
        $amount = $_POST['amount'];
        $pname = $_POST['pname'];
        $cname = $_POST['cname'];
        $date = $_POST['date'];
        $accepted = 'Accepted';
        $Ename = $_SESSION['name'];
        
       
        $qry= "INSERT INTO `purchase`(`branch`,`productName`,`companyName`,`price`,`accepted`,`date`,`Ename`) VALUES ('$branch','$pname','$cname','$amount','$accepted','$date','$Ename')";
        $run = mysqli_query($conn, $qry);

        if ($run) {
            echo "<script type='text/javascript'>alert('Successfully Added');window.location.href='mng-purchase-form.php';</script>";
        } else {
            echo "Form not submited,try again";
        }
    }
}
?>