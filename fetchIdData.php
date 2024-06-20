<?php
 session_start();
 if($_SESSION['login']){
    include('databaseConnection.php');
    $school= $_SESSION['login'];
    $fetchdata ="SELECT * FROM $school";
    $query = mysqli_query($connection, $fetchdata) or die("data not fatch");
    $total = mysqli_num_rows($query);
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>id print page</title>
  <link rel="stylesheet" href="idPrint.css">
  <link rel="stylesheet" href="printing.css">
</head>

<body>
  <div class="printBtn">Pirnt Now</div>
  <div class="a4page">

    <?php
             while($result = mysqli_fetch_assoc($query)){
              if($result['sNo'] > 1){

          ?>
    <div class="idPage">
      <img src="studentImages/<?php echo $result['sPic']?>" class="photo"></img>
      <div class="heading">
        <p class="nameh det_field">Name</p>
        <p class="clash det_field">Class</p>
        <p class="fnameh det_field">Father Name</p>
        <p class="dobh det_field">Death Of Birth</p>
        <p class="moh det_field">Mobile</p>
        <p class="addh det_field">Address</p>
      </div><!--heading div and-->
      <div class="bodi">
        <p class="name det_field">:
          <?php echo $result['sName']?>
        </p>
        <p class="clas det_field">:
          <?php echo $result['class']?>
        </p>
        <p class="fname det_field">:
          <?php echo $result['fatherName']?>
        </p>
        <p class="dob det_field">:
          <?php echo $result['dob']?>
        </p>
        <p class="mo det_field">:
          <?php echo $result['sMobile']?>
        </p>
        <p class="add det_field">:
          <?php echo $result['sAdd']?>
        </p>
      </div><!--bodi div and-->
    </div><!--idPage div and-->
    <?php
              
              }
            } 
          }
          else{
            header('location:departmentLogin.php');
          }
              ?>
  </div><!--a4page div and-->
</body>

</html>