<!-- INSERT INTO `profile` (`profile_no`, `first_name`, `last_name`, `dob`, `email`, `phone`, `city`, `state`, `tstamp`,
`profile_id`) VALUES (NULL, 'Elon', 'Musk', '2020-12-22', 'elon@musk.com', '777777777', 'mars', 'jupiter',
current_timestamp(), ''); -->

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

    <title>Welcome to iDiscuss - Coding Forums</title>

    <style>
    .container {
        min-height: 100vh;
    }
    </style>
</head>

<body>


    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">
Edit Modal
</button> -->

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLable" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLable">Edit Changes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>



                <form aciton="/forum/profile.php" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="snoEdit" id="snoEdit">

                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="emailEdit" name="emailEdit">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phoneEdit" name="phoneEdit">
                        </div>

                    </div>
                    <div class="modal-footer d-block mr-auto">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <?php include 'partials/_dbconnect.php';?>
    <?php include 'partials/_header.php';?>












    <?php  
    $showAlert = false;
    $update = false;
    $delete = false;

    if(isset($_GET['delete'])){
        $sno = $_GET['delete']; 
        $delete = true;
        $sql = "DELETE FROM `profile` WHERE `profile_no` = $sno";
        $result = mysqli_query($conn,$sql);
    }
    $method = $_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
    if(isset($_POST['snoEdit'])){
        // Update the Form
        $sno = $_POST['snoEdit'];
        $email = $_POST['emailEdit'];
        $phone = $_POST['phoneEdit'];


        $sql = "UPDATE `profile` SET `email` = '$email' , `phone` = '$phone'  WHERE `profile`.`profile_no` = $sno";
        $result = mysqli_query($conn, $sql);
        if($result){
            $update = true;
        }
    }
    else{
        //Insert into thread db
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $city = $_POST['city'];
        $state = $_POST['state'];


        // $profile_no = $_POST['profile_no'];
        $sql = "INSERT INTO `profile` (`first_name`, `last_name`, `dob`, `email`, `phone`, `city`, `state`, `profile_cat_id`, `profile_user_id`, `tstamp`) VALUES ('$first_name', '$last_name', '$dob', '$email', '$phone', '$city', '$state', '', '', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success! </strong>Your form has been submitted successfully!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>';
        }
  
    }
    }
    ?>
    <?php

      if($update){
            echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Success! </strong>Your form has been updated!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>';
        }

      if($delete){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Success! </strong>Your form has been deleted.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>';
        }

    ?>



    <div class="container my-4">



        <?php include 'partials/_profileForm.php';?>

        <hr>
        <h1 class="text-center">Applied Scolarships</h1>
        <table class="table my-4" id="myTable">
            <thead>
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">First name</th>
                    <th scope="col">Last name</th>
                    <th scope="col">DOB</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">City</th>
                    <th scope="col">State</th>
                    <th scope="col"></th>
                    <th scope="col">Actions</th>

                </tr>
            </thead>
            <tbody>

                <?php
            $sql = "SELECT * FROM `profile`";
            $result = mysqli_query($conn, $sql);
            $profile_no = 0;
            while($row = mysqli_fetch_assoc($result)){
                $profile_no = $profile_no + 1;
                echo "<tr>
                <th scope='row'>".$profile_no."</th>
                <td>".$row['first_name']."</td>
                <td>".$row['last_name']."</td>
                <td>".$row['dob']."</td>
                <td>".$row['email']."</td>
                <td>".$row['phone']."</td>
                <td>".$row['city']."</td>
                <td>".$row['state']."</td>
                <td>".$row['tstamp']."</td>

                <td> <button class='edit btn btn-sm btn-info'id=". $row['profile_no'] .">Edit</button> <button class='delete btn btn-sm btn-danger'id=d". $row['profile_no'] .">Delete</button> </td>
                </tr>";
            }

            
            
        ?>

            </tbody>
        </table>


    </div>

    <?php include 'partials/_footer.php';?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    </script>
    <script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
        element.addEventListener("click", (e) => {
            console.log("edit", );
            tr = e.target.parentNode.parentNode;
            email = tr.getElementsByTagName("td")[3].innerText;
            phone = tr.getElementsByTagName("td")[4].innerText;
            console.log(email, phone)
            emailEdit.value = email;
            phoneEdit.value = phone;
            snoEdit.value = e.target.id;
            console.log(e.target.id)
            $('#editModal').modal('toggle');
        })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
        element.addEventListener("click", (e) => {
            console.log("edit", );
            sno = e.target.id.substr(1, );

            if (confirm("Are you sure you want to delete the form?")) {
                console.log("yes");
                window.location = `/forum/profile.php?delete=${sno}`;
                // TODO: Create a form and use post request to submit a form
            } else {
                console.log("no");
            }
        })
    })
    </script>
</body>

</html>