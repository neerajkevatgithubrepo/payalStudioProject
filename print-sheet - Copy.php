<!DOCTYPE html>
<?php
    include('databaseConnection.php');
    
    $diseCode = $_GET['diseCode'];
    $fetchdata ="SELECT * FROM `card_temp` WHERE `diseCode`='$diseCode'";
    $data = mysqli_query($connection, $fetchdata);
    $getInfo = mysqli_fetch_assoc($data);

    $fetchdet ="SELECT * FROM $diseCode";
    $query = mysqli_query($connection, $fetchdet);
    $total = mysqli_num_rows($query);
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="print-sheet.css">
    <title>Print Sheet</title>
</head>
<style>
    * {
        margin: 0%;
        padding: 0%;
        box-sizing: border-box;
    }

    /* Card ke view ke liye a4 sheet ki conditio  */

    <?php
    if($getInfo['view']=='V') {
        ?>
        
    .temp-card {

        rotate: 90deg;

    }

    <?php
    }
    ?>

    /* Card ke view ke liye a4 sheet ki conditio  */

</style>

<body id="page-body">
    <button id="print-btn" print>Print Now</button>
    <?php
    for($aw=1; $aw<=$total;$aw+=10){
        ?>

    <div id="a4sheet">

        <?php
             while($result = mysqli_fetch_assoc($query)){
              if($result['sNo'] > 1){
                
          ?>

        <main class="temp-card"
            style="background-image: url(/payalStudioProject/card-formate/<?php echo $getInfo['formate'] ?>);width:<?php if($getInfo['view']=='H'){echo "
            85mm"; } else{echo "55mm" ; } ?>;height:
            <?php if($getInfo['view']=='H'){echo "55mm"; } else{echo "85mm"; } ?>;">

            <small class="s-class" id="s_class"
                style="font-size:<?php echo $getInfo['class_size'] ?>px;margin:<?php if ($getInfo['class_x']==0){ echo 'auto'; }else{ echo $getInfo['class_x'].'px'; } ?>;;margin-top:<?php echo $getInfo['class_y'] ?>px;">
                <?php echo $result['class'] ?>
            </small>
            <strong class="s-name" id="s_name"
                style="font-size:<?php echo $getInfo['name_size'] ?>px;margin:<?php if ($getInfo['name_x']==0){ echo 'auto'; }else{ echo $getInfo['name_x'].'px'; } ?>;margin-top:<?php echo $getInfo['name_y'] ?>px;color:<?php echo $getInfo['name_color'] ?>;">
                <?php echo $result['sName'] ?>
            </strong>

            <img class="s-photo" id="s_photo" src="studentImages/<?php echo $result['sPic'] ?>" alt=""
                style="width:<?php echo $getInfo['photo_size']*0.7; ?>px;height:<?php echo $getInfo['photo_size']*0.9; ?>px;margin-top:<?php echo $getInfo['photo_y'] ?>px;margin-left:<?php echo $getInfo['photo_x'] ?>px;border-radius:<?php echo $getInfo['photo_corner'] ?>px;">

            <div class="text-details" id="text_details"
                style="font-size:<?php echo $getInfo['details_size'] ?>px;margin-top:<?php echo $getInfo['details_y'] ?>px;margin-left:<?php echo $getInfo['details_x'] ?>px;">
                <span class="details required-details">
                    <p>Father Name</p>
                    <p>DOB</p>
                    <p>Blood Group</p>
                    <p>Mobile</p>
                    <p>Add.</p>
                </span>
                <span class="details provide-details">
                    <p>:
                        <?php echo $result['fatherName'] ?>
                    </p>
                    <p>:
                        <?php echo $result['dob'] ?>
                    </p>
                    <p>:
                        <?php echo $result['sName'] ?>
                    </p>
                    <p>:
                        <?php echo $result['sMobile'] ?>
                    </p>
                    <p>:
                        <?php echo $result['sAdd'] ?>
                    </p>
                </span>

            </div>
        </main>

        <?php
              }
            }
        ?>

    </div>

    <?php
    }
    ?>
    <script src="printSheet.js"></script>
</body>

</html>