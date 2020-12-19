<?php 
$showError = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $admin_email = $_POST['signupAdminEmail'];
    $adminpass = $_POST['signupAdminPassword'];
    $admincpass= $_POST['signupcAdminPassword'];

    // check whether this email exists
    $existSql = "select * from `admin` where admin_email = '$admin_email'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);
    if($numRows>0){
        $showError = "Email already in use";
    }
    else{
        if($adminpass == $admincpass){
            $hash = password_hash($adminpass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `admin` ( `admin_email`, `admin_pass`, `timestamp`) VALUES ('$admin_email', '$hash', current_timestamp())";
            $result =  mysqli_query($conn, $sql);
            if($result){
                $showAlert = true;
                header("Location: /forum/admin.php?signupsuccess=true");
                exit();
            }
        }
        else{
        $showError = "Passwords do not match";
        }
    }
    header("Location: /forum/admin.php?signupsuccess=false&error=$showError");
}
?>