<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin login</title>
    <link rel="stylesheet" href="..\css\signin.css">
    <?php
$errmsg="";
    if ($_SERVER['REQUEST_METHOD']=='POST'){
         session_start();
        
$servername = "localhost";
$username = "root";
$password = "Gobi@1234";

// Create connection
$conn = new mysqli($servername, $username, $password,'hms');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
    $employeeid = $_POST['employeeid'];
    $password = $_POST['password'];
    $sql= "SELECT * FROM admin WHERE employeeid = '$employeeid' AND password = '$password' ";
    $result = mysqli_query($conn,$sql);
    $check = mysqli_fetch_array($result);
    if(isset($check)){
          $_SESSION['employeeid'] = $employeeid;
      header('Location: admindashboard.php');

    }
    else{
    $errmsg="*Username or password is wrong";
    }
    }


     ?>
  </head>
  <body>
    <div class="center">
      <h1>Admin Login</h1>
      <form action="adminlogin.php" method="post">
      <div class="txt_field">
          <input id="empname" name="empname" type="text" required>
          <span></span>
          <label>Name</label>
        </div>
        <div class="txt_field">
          <input id="employeeid" name="employeeid" type="text" pattern="[0-9]" required>
          <span></span>
          <label>Employee ID</label>
        </div>
        <div class="txt_field">
          <input id="password" name="password" type="password" required>
          <span></span>
          <label>Password</label>
        </div>
        <div class="pass">Forgot Password?</div>
        <input type="submit" name="submit" id="submit" value="submit">
        <div class="signup_link">
          Forgot? <a href="#">Contact</a>
        </div>
      </form>
        <span style="color:red;margin-left: 15px;"><?php echo "$errmsg"; ?></span>
    </div>

  </body>
</html>
