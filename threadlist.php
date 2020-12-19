<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
    #ques {
        min-height: 433px;
    }
    #applyNow{
        color: white;
        background-color: #17a2b8;
        text-decoration: none;
    }
    </style>
    <title>Welcome to iDiscuss - Coding Forums</title>
</head>

<body>
    <?php include 'partials/_dbconnect.php';?>
    <?php include 'partials/_header.php';?>
    <?php
    $id =  $_GET['catid'];
    $sql = "SELECT * FROM `categories` WHERE category_id=$id";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $catname = $row['category_name'];
        $catdesc = $row['category_description'];


    }
    ?>











    <?php  
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        //Insert into thread db
        $th_title = $_POST['title'];
        $th_desc = $_POST['desc'];

        $th_title = str_replace("<", "&lt;", $th_title);
        $th_title = str_replace(">", "&gt;", $th_title);

        $th_desc = str_replace("<", "&lt;", $th_desc);
        $th_desc = str_replace(">", "&gt;", $th_desc);


        $sno = $_POST['sno'];
        $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$th_title', '$th_desc', '$id', '$sno', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;









        
        if($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success! </strong>Your thread has been added! Please wait for community to respond
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
    </div>';
        }
    }
    ?>



<img src="img/slider-1.jpg" class="card-img-top" alt="image for this category">






    <!-- Category container starts here -->
    <!-- same photo for now -->
    <div class="container my-4">
        <div class="jumbotron my-4">

            <!-- Know more starts here -->


            <?php
    $id =  $_GET['catid'];
    $sql = "SELECT * FROM `categories` WHERE category_id=$id";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $catname = $row['category_name'];
        $catdesc = $row['category_description'];


    }
    ?>



            </span> <span class="my-0 font-weight-bold ">
                <h1>Applying for <?php echo $catname; ?> Scholarship</h1>
            </span>

            <p class="lead"><?php echo $catdesc; ?></p>
            <hr class="my-4">


            <a class="btn btn-info btn-lg" data-toggle="collapse" href="#collapseExample" href="#" role="button"
                aria-expanded="false" aria-controls="collapseExample">How can you apply?</a>

            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <p><span class="font-weight-bold"><?php echo $catname; ?>, Follow the steps below to apply for
                            the fellowship:</span></p>

                    <p>Step 1: Fill your valid details below</p>
                    <p>Step 2: Submit the required documents mentioned</p>
                    <p>Step 3: Click on the Apply Now button</p>
                    <span class="font-weight-bold">Your application will be conformed and Notified if eligible via
                        Email, Thank you!</span></p>
                    </p>
                </div>
            </div>

            <br>
            <button class="btn btn-info my-4" type="submit" ><a href="/forum/profile.php" id="applyNow">Apply Now</a></button>
        </div>
    </div>

    <!-- Know more ends here -->







    <?php

    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    echo '<div class="container">
        <h1 class="py-2 text-center">See what other students have to say</h1>
        <form action="' .$_SERVER["REQUEST_URI"]. '" method="post" enctype="">
    <div class="form-group">
        <label for="exampleInputEmail1">Feedback Title</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">Keep your title as short as
            possible</small>
    </div>
    <input type="hidden" name="sno" value="'. $_SESSION['sno']. '">
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Elaborate Your Feedback</label>
        <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-info">Post</button>
    </form>
    </div>';
    }
    else{
    echo '
    <div class="container">
    <h1 class="py-2">See what other students have to say</h1>
    <p class="lead">You are not logged in. Please login to share your feedback!</p>
    </div>
    ';

    }

    ?>

    <div class="container mb-5" id="ques">
        <h1 class="py-2">Browse Feedback</h1>
        <?php
        $id =  $_GET['catid'];
        $sql = "SELECT * FROM `threads` WHERE thread_cat_id = $id";
        $result = mysqli_query($conn, $sql);
        $noResult = true;
        while($row = mysqli_fetch_assoc($result)){
            $noResult = false;
            $id = $row['thread_id'];
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            $thread_time = $row['timestamp'];
            $thread_user_id = $row['thread_user_id'];
            $sql2 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);


        echo '<div class="media my-3">
                <img src="img/userdefault1.png" width="54px" class="mr-3" alt="...">
                <div class="media-body">'.
            
                '<h5 class="mt-0"><a class="text-dark" href="thread.php?threadid=' .$id. '">' .$title. '</a></h5>
                '. $desc .'</div>' .'<div class="font-weight-bold my-0"> Asked by: ' .$row2['user_email']. ' at ' .$thread_time. '</div>'.
        '</div>';

        }
        // echo var_dump($noResult);
        if($noResult){
            echo '<div class="jumbotron jumbotron-fluid">
            <div class="container">
              <p class="display-4">No Feedback Found</p>
              <p class="lead">Be the first person to give a feedback!</p>
            </div>
          </div>';
        }
        ?>



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
</body>


</html>