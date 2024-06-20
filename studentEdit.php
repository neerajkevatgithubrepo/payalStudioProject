<?php
include('databaseConnection.php');
$sNo=$_GET['sNo'];
$sdc=$_GET['diseCode'];
$school="sdc".$sdc;
$fetchdata ="SELECT * FROM $school where sNo=$sNo";
$data = mysqli_query($connection, $fetchdata) or die("data not fatch");
$total = mysqli_num_rows($data);



?>

<html>

<head>
   <title>Payal studio sironj registration page</title>
   <link rel="stylesheet" type="text/css" href="idRegistrationStyle.css">
   <meta name="keyword" content="payal studio,id card,prakash patel,school id card,sironj,studio,photography,video shooting">
   <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
   <div class="style">
      <h1 style=" padding:3px; font-size:30px">Id Card Registration Form </h1>
      <hr>
      <div><br><br>

         <div class="form-style">

            <!-- <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data"> -->
           
            <form method="POST" action="idRegistrationBackend.php" enctype="multipart/form-data">
            <?php
        if($total > 0){
             while($result = mysqli_fetch_assoc($data))
              {
          ?>  
            <div class="input">
                  <input class="input" name="diseCode" type="text" placeholder="Enter your School Disecode" required />
               </div><br>
               
               <div class="input">
                  <input class="input" name="class" type="text" placeholder="Enter your Class" required />
               </div><br>

               <div class="input">
                  <input class="input" name="ssmId" value="<?php echo $result['ssmId']?>" type="text" placeholder="Enter your samagra id" required />
               </div><br>

               <div class="input">
                  <input class="input" name="sName" type="text" placeholder="Enter your full name" required />
               </div><br>

               <div class="input">
                  <input class="input" name="fatherName" type="text" placeholder="Enter your father name" required />
               </div><br>

               <div class="input">
                  <label style="width: 40%;">Date Of Birth :</label>
                  <input class="input" name="dob" type="date" style="width: 60%;" required />
               </div><br>

               <div class="input">
                  <input class="input" name="sMobile" type="text" placeholder="Enter your mobile number" />
               </div><br>

               <div class="input">
                  <input class="input" name="sAdd" type="text" placeholder="Enter your address" required />
               </div><br>

               <div class="formate" style="border:1px">
                  <label> Passport sise photo </label>
                  <input type="file" name="sPic" required />
               </div><br>
               <?php
              
            }
          } 
            ?>
               <div class="submit">
                  <input class="input" type="submit" name="submit" velue="Upload" style="background-color: blue;color:white; cursor:pointer;" /></div>

            </form>
         </div>
</body>

</html>
