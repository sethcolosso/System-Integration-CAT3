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
          
         <div class="text-center d-none d-md-block  "id="nav">
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
             <a class="nav-link  font-weight-bold" href="adminreg.php">Sign in</a>
             </li>
            
             
         </ul>
          </div><!--/.nav-collapse -->
          </nav>



<!--<div class="sidenav">

 <a class="navbar-brand" href="#">
      <img src="https://www.w3schools.com/bootstrap5/img_avatar1.png" alt="Logo" style="width:40px;" class="rounded-pill">
    </a>
	
  <a href="about.php">About</a>
  <a href="services.php">Services</a>

  
</div>-->


<div class="main"  style="background-color:White;width:30%;margin:auto" align="center">
<div class="container mt-5">
  <h2>Admin Login</h2>
  <form action="admnloginback.php" method="POST"  style="background-color:White">
    <div class="mb-3 mt-3">
      <label for="regno">Id no:</label>
      <input type="text" class="form-control" id="idno" placeholder="Enter your idno" name="idno">
    </div>
	
    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
    </div>
	
	
    <div class="form-check mb-3">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
  </form>
  <br>
</div>

</div>
   
</body>
</html> 