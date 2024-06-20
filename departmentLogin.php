
<html>
      <head>
            <title>Payal studio login page</title>
            <meta name="keyword" content="payal studio,id card,prakash patel,school id card,sironj,studio,photography,video shooting">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" type="text/css" href="departmentLoginStyle.css">
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
      </head>

    <body>
           
             <form class="main-div" method="POST" action="#">

                 <div class="heading">
                      <h2>LOGIN HERE</h2>
                 </div><hr><br><br>

                 <span class="input-div">

                 <div class="input" name="id">
                    <i class="fa-solid fa-user" style="font-size: 25px; padding:5px"></i>
                    <input type="text" name="diseCode" placeholder="Enter School Disecode" required>
                 </div>

                 <div class="input" name="password">
                      <i class="fa-solid fa-lock" style="font-size:25px; padding:5px"></i>
                      <input type="password" name="pass"  placeholder="Enter password" required>
                 </div>

                 <div class="forgot-pass-link">
                    <p><a style="font-size: 20px;font-style: none;" href="#">Forgot password</a></p>
                 </div><br><br>

                 <div class="submit-button" name="" style="margin-left: 30px;">
                    <input type="submit" name="login" value="Login" style="background-color: blue;color:white; cursor:pointer;:hover:background-color:green">
                  </div>

               </span>

               <div class="pragraph">
                       <p> New User ?
                          <a style="font-size: 20px;" href="signup.php">Sign Up</a></p>
               </div>        
          </form>
     </body>
</html>

<?php
    session_start();
    include('databaseConnection.php');
    if(isset($_REQUEST['login'])){ 
    $sdc="sdc";
    $pass=$_REQUEST['pass'];
    $school=trim(strtolower($sdc . $_REQUEST['diseCode']));
    $_SESSION['login']= $school;
    $fetchdata ="SELECT * FROM $school";
    $data = mysqli_query($connection, $fetchdata) or die("data not fatch");
    $total = mysqli_num_rows($data);
    $result = mysqli_fetch_assoc($data);
   
    if($pass==$result['spwd']){
      header("location:studioLoginhow.php?diseCode=$school");
      }
    elseif($pass==$result['ipwd']){
      header("location:departmentLoginShow.php?diseCode=$school");
    }
    else{
      echo "<script>alert('invalid user and password please try again') </script>";
    }
  }
    ?>