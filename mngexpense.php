<?php
session_start();
$server = "localhost";
$username = "root";
$password = "";
$dbname="dashboard";

$conn = mysqli_connect($server, $username, $password, $dbname);

if (isset($_POST['submit'])) {
    if (!empty($_POST['branch']) && !empty($_POST['amount']) && !empty($_POST['item']) && !empty($_POST['date']) && !empty($_POST['text'])) {
        $branch = $_POST['branch'];
        $amount = $_POST['amount'];
        $item = $_POST['item'];
        $date = $_POST['date'];
        $text = $_POST['text'];
        $Eid=$_SESSION['id'];
        $Ename = $_SESSION['name'];

        $qry = "INSERT INTO `expense`( `branch`, `price`,`item`, `date`, `Eid`,`Ename`,`text`) VALUES ('$branch','$amount','$item','$date','$Eid','$Ename','$text')";
        $run = mysqli_query($conn, $qry);

        if ($run) {
            echo "<script type='text/javascript'>alert('Successfully Added');window.location.href='mng-expense-form.php';</script>";
        } else {
            echo "Form not submited,try again";
        }
    }
}
?>