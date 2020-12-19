<?php 
$showError = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $adminemail = $_POST['loginAdminEmail'];
    $adminpass = $_POST['loginAdminPass'];

    $sql = "Select * from admin where admin_email='$adminemail'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    if($numRows==1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($adminpass, $row['admin_pass'])){
        session_start();
        $_SESSION['adminloggedin']= true;
        $_SESSION['sno']= $row['sno'];
        $_SESSION['adminemail']= $adminemail;
        echo "logged in". $adminemail;
        }
            header("Location: /forum/admin.php");
    }
    header("Location: /forum/admin.php");
}
?>