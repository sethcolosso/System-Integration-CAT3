<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--<link href="h.css" rel="stylesheet">-->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
  body{
   background-image:url("images/bg5.jpg");
   /*background-color:cyan;*/
  }
  .form-control{
  width:150px;}
	  
  #nav{
  background-color:white;
  opacity: .8;

  
}
</style>
<body>
<nav class="navbar navbar-transparent navbar-fixed-top navbar-padded app-navbar p-t-md">
  <a class="navbar-brand" href="#">
      <img src="https://www.w3schools.com/bootstrap5/img_avatar1.png" alt="Logo" style="width:40px;" class="rounded-pill">
    </a>
          
         <div class="text-center d-none d-md-block " id="nav">
           <ul class = "nav nav-pills">
           <li class="pull-right">
             <a class="nav-link font-weight-bold" href="index.php">Home</a>
             </li>
			  <li class="pull-right">
           <a class="nav-link  font-weight-bold" href="about.php">About</a>
             </li>
			  <li class="pull-right">
           <a class="nav-link  font-weight-bold" href="contact.php">Contact us</a>
             </li>
            <li class="pull-right">
             <a class="nav-link  font-weight-bold" href="adminlogin.php">Sign in</a>
             </li>
            
             
         </ul>
          </div><!--/.nav-collapse -->
          </nav>


<!--<div class="sidenav">

 <a class="navbar-brand" href="#">
      <img src="https://www.w3schools.com/bootstrap5/img_avatar1.png" alt="Logo" style="width:40px;" class="rounded-pill">
    </a>
	
 

  <a href="adminlogin.php">Log in</a>
   <a href="about.php">About</a>
  <a href="contact.php">Contact</a>
</div>-->

<div class="main" style="background-color:White; width:30%;margin:auto" align="center" >
  <h2>Admin Register</h2>
  
  <div class="container mt-5">
  <form action="admindb.php" method="POST">
    <div class="mb-3 mt-3">
      <label for="regno">Id:</label>
      <input type="text" class="form-control" id="idno" placeholder="Enter your id no" name="idno">
    </div>
	  <div class="mb-3 mt-3">
      <label for="email">User Name:</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter your  user name" name="uname">
    </div>
    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="paswd">
    </div>
	
	
    <div class="form-check mb-3">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
	<br><br>
	<div class="mb-3">
      <label>Already Registered</label>
      <br>
        <a href="adminlogin.php" class="btn btn-primary">Login </a>
      <br><br>
    </div>
  </form>
</div>

</div>
   
</body>
</html> 
