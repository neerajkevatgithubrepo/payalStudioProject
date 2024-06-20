<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>student file</title>
    <link rel="stylesheet" href="studioLoginShow.css" />
  </head>
  <body>
    <?php
    session_start();
    if($_SESSION['login']){
    include('databaseConnection.php');
    $school=$_REQUEST['diseCode'];
    $fetchdata ="SELECT * FROM $school";
    $data = mysqli_query($connection, $fetchdata) or die("data not fatch");
    $total = mysqli_num_rows($data);
    if($total){
    ?>
     <div id="mainBox">
      <h1><mark>Student Details List</mark></h1>
      <h3><mark>Total Student Listed--<?php echo 1-$total;?></mark></h3>
      
      <!-- <a class="ancher" href="http://localhost/payalStudioProject/card-temp-edit.php?diseCode=<?php echo $school ?>">Print Card</a> -->
      
      <?php
      
    $fetchCode ="SELECT * FROM `card_temp` WHERE `diseCode`='$school'";
    $cData = mysqli_query($connection, $fetchCode);
    $eOrF = mysqli_fetch_assoc($cData);
    // $frmt = $eOrF['formate'];
    if($eOrF['formate']!=''){
?>
      <a class="ancher" href="http://localhost/payalStudioProject/card-temp-show.php?diseCode=<?php echo $school ?>">Print Card</a>
<?php
    }
    else{
      ?>
      <a class="ancher" href="http://localhost/payalStudioProject/card-temp-edit.php?diseCode=<?php echo $school ?>">Print Card</a>
      <?php

    }
    ?>

      <table id="data">
        <tr id="row">
          <th class="colum">Serial Number</th>
          <th class="colum">Dise Code</th>
          <th class="colum">Samagra id</th>
          <th class="colum">Name</th>
          <th class="colum">Class</th>
          <th class="colum">Father Name</th>
          <th class="colum">Date of Birth</th>
          <th class="colum">Mobile</th>
          <th class="colum">Address</th>
          <th class="colum">Photo</th>
          <th class="colum">Action</th>
        </tr>
        <?php
        if($total > 0){

             while($result = mysqli_fetch_assoc($data))
              {
          ?>
      <tr class="drow">
          <td class="colum"><?php echo $result['sNo']?></td>
          <td class="colum"><?php echo $result['diseCode']?></td>
          <td class="colum"> <?php echo $result['ssmId']?></td>
          <td class="colum"><?php echo $result['sName']?></td>
          <td class="colum"> <?php echo $result['class']?></td>
          <td class="colum"><?php echo $result['fatherName']?></td>
          <td class="colum"><?php echo $result['dob']?></td>
          <td class="colum"><?php echo $result['sMobile']?></td>
          <td class="colum"><?php echo $result['sAdd']?></td>
          <td class="colum">
          <img class="image" src="studentImages/<?php echo $result['sPic']?>" />
          </td>
          <td class="colum"><a href="studentEdit.php?sNo=<?php echo $result['sNo']?>,?diseCode=<?php echo $result['diseCode']?>">edit</a></td>
        </tr>
       <?php
              
              }
            } 
              ?>
      </table>

      

    </div>

       <?php
    } 
    else{
      echo '<script>alert("This intitute is not registerd")</script>';
    }
  }
  else{
    header('location:departmentLogin.php');
  }
    ?>
  </body>
</html>
