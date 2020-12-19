<?php
session_start();

echo'<nav class="navbar navbar-expand-lg navbar-light bg-light">

<a class="navbar-brand text-info font-weight-bold" href="/forum" ><img src="img/scholarship.png" width="54px" class="mr-3" alt="..."></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link  text-info font-weight-bold" href="/forum"  >Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item ">
      <a class="nav-link text-info font-weight-bold" href="about.php">About</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle text-info font-weight-bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Top Categories
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">';

    $sql = "SELECT category_name, category_id FROM `categories` LIMIT 3";
    $result = mysqli_query($conn, $sql);
    $noResult = true;
    while($row = mysqli_fetch_assoc($result)){
        echo '<a class="dropdown-item" href="threadlist.php?catid=' .$row['category_id']. ' ">' .$row['category_name']. '</a>';
    }

      echo '</div>
    </li>
    <li class="nav-item">
      <a class="nav-link text-info font-weight-bold" href="contact.php" >Contact</a>
    </li>



    <a class="nav-link text-info font-weight-bold" href="admin.php" >Admin</a>




  </ul>
  <div class="row mx-2">';
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  echo '<form class="form-inline my-2 my-lg-0 " method="get" action="search.php">
    <input class="form-control mr-sm-2 " name="search" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-info my-2 my-sm-0" type="submit">Search</button>
    <p class="text-info my-0 mx-2 font-weight-bold"> 
    

    <a class="nav-link text-info font-weight-bold" href="profile.php">' .$_SESSION['useremail']. '</a>
    </p>
</li>
    <a href="partials/_logout.php" class="btn btn-outline-info ml-2">Logout</a>
    </form>';
}
else{
    echo '<form class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-info my-2 my-sm-0" type="submit">Search</button>
    </form>
    <button class="btn btn-outline-info ml-2" data-toggle="modal" data-target="#loginModal">Login</button>
    <button class="btn btn-outline-info mx-2" data-toggle="modal" data-target="#signupModal">SignUp</button>
    
    
    ';

}

  echo '</div>
      </div>
      </nav>';
      // concatinating closing tags
     

include 'partials/_loginModal.php';
include 'partials/_signupModal.php';
include 'partials/_adminSignupModal.php';
include 'partials/_adminLoginModal.php';
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
          <strong>Success!</strong> You can now login
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
</div>';
}
?>