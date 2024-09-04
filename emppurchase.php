<?php
session_start();
include 'dbcon.php';

if (isset($_POST['submit'])) {
    $target_dir = "uploads/";
    $newfilename = "";

    if ($_FILES['file']['name'] != '') {
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        $check = filesize($_FILES["file"]["tmp_name"]);

        if ($check !== false) {
            $uploadOk = 1;
        } else {
            ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                File is not an image.
            </div>
            <?php
            $uploadOk = 0;
        }

        if (file_exists($target_file)) {
            ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Sorry, file already exists
            </div>
            <?php
            $uploadOk = 0;
        }

        $imageName = $_FILES['file']['name'];
        $ext = substr($imageName, strrpos($imageName, '.') + 1);
        $imgname = str_replace('.' . $ext, '', $imageName);
        $imgname = preg_replace('/[^A-Za-z0-9]/', '', str_replace('.', '_', $imgname));
        $imgname = substr($imgname, 0, 10);
        $_FILES['file']['name'] = time() . rand(1, 100) . str_replace(' ', '_', $imgname) . '.' . $ext;

        $newfilename = date('Y-m-d H:i:s') . $_FILES["file"]["name"];

        if ($uploadOk == 0) {
            ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Sorry, your file was not uploaded.
            </div>
            <?php
        } else {
            $newfilename = rand(1, 99999) . $_FILES["file"]["name"];
        }

        if (move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/" . $newfilename)) {
        }
    }
    
    $amount = $_POST['amount'];
    $pname = $_POST['pname'];
    $cname = $_POST['cname'];
    $date = $_POST['date'];
    $Eid = $_SESSION['id'];
    $Ename = $_SESSION['name'];
    $rs = $_SESSION["branch"];

   
    $qry = "INSERT INTO purchase(`branch`, `Eid`, `Ename`, `productName`, `companyName`, `price`, `date`,`image`, `accepted`) VALUES ('$rs','$Eid','$Ename','$pname','$cname','$amount','$date','$newfilename', 'Pending')";

    $res1 = mysqli_query($conn, $qry);

    if ($res1 > 0) {
        ?>
        echo "<script type='text/javascript'>alert('Successfully Added');window.location.href='emp-purchase-form.php';</script>";
        
        <?php
        
    } else {
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="myDiv1">
            <i class="mdi mdi-block-helper mr-2"></i>Sorry, Please try again..[1]

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
    }
}
?>