<!DOCTYPE html>
<?php
    include('databaseConnection.php');
    
    $diseCode = $_GET['diseCode'];
    $fetchdata ="SELECT * FROM `card_temp` WHERE `diseCode`='$diseCode'";
    $data = mysqli_query($connection, $fetchdata);
    $getInfo = mysqli_fetch_assoc($data);
    // echo $getInfo['view'];
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Card Template</title>
    <link rel="stylesheet" href="card-temp-edit.css">
</head>

<body id="page-body">
    <header class="header"></header>
    <main class="main">
        <span class="tool-container">
        <form action="" method="post" enctype="multipart/form-data" class="temp-form">
            <div class="tool-point formate-point">
                <h4>Formate</h4>
                <div class="formate-point-body tool-point-body">
                    <span class="formate-input-box">
                        <label for="formate">Copy</label>
                        <input type="file" name="formate" id="formate"/>
                    </span>

                    <span class="formate-input-box">
                        <label for="view">id card</label>
                        <span class="radio-input">
                            <input type="radio" name="view" id="" value="V"> Portrait
                            <input type="radio" name="view" id="" value="H"> Landscape
                        </span>

                    </span>
                </div>
            </div>
            <input type="submit" name="submit_frmt" value="Save-Fotmate" class="submit" id="submit_frmt">
            </form>
            
            <?php
            if(isset($_POST['submit_frmt'])){

                if(!empty($_FILES['formate']['name'])){
                    
                    $del_formate = unlink("card-formate/" . $getInfo['formate']);

                    $formate        = $_FILES['formate']['name'];
                    $tempphoto    = $_FILES['formate']['tmp_name'];
                    $imagePath    = "card-formate/" . $formate;
                    $photo_upload = move_uploaded_file($tempphoto, $imagePath);

                }
                else{
                    $formate = $getInfo['formate']; 
                }
                    
                
                
                $view = $_POST['view'];

                if($view=='H'){

                    $class_size = "32";
                    $class_x = "0";
                    $class_y = "66";
                    $name_size = "18";
                    $name_color = "#004CFF";
                    $name_x = "0";
                    $name_y = "82";
                    $photo_size = "87";
                    $photo_x = "-147";
                    $photo_y = "112";
                    $photo_corner = "0";
                    $details_size = "13";
                    $details_x = "92";
                    $details_y = "113";
                    
                }

                if($view=='V'){

                    $class_size = "18";
                    $class_x = "0";
                    $class_y = "178";
                    $name_size = "20";
                    $name_color = "#FF0055";
                    $name_x = "0";
                    $name_y = "38";
                    $photo_size = "194";
                    $photo_x = "-33";
                    $photo_y = "76";
                    $photo_corner = "0";
                    $details_size = "12";
                    $details_x = "20";
                    $details_y = "230";
                    
                }

                if($formate!='' && $view!=''){
                    
                    if($getInfo['formate']==''){
                        
                        $frmt_det = "UPDATE `card_temp` SET `formate` = '$formate', `view` = '$view', `class_size` = '$class_size', `class_x` = '$class_x', `class_y` = '$class_y', `name_size` = '$name_size', `name_color` = '$name_color', `name_x` = '$name_x', `name_y` = '$name_y', `photo_size` = '$photo_size', `photo_x` = '$photo_x', `photo_y` = '$photo_y', `photo_corner` = '$photo_corner', `details_size` = '$details_size', `details_x` = '$details_x', `details_y` = '$details_y' WHERE `diseCode` = '$diseCode'";
                        $frmt_upl = mysqli_query($connection, $frmt_det);

                        if($frmt_upl){
                            
                            ?>
                <meta http-equiv="refresh" content="0, http://localhost/payalStudioProject/card-temp-edit.php?diseCode=<?php echo $diseCode ?>">
                <?php
                }
                    }
                    else{
                                                
                        $frmt_det = "UPDATE `card_temp` SET `formate` = '$formate', `view` = '$view' WHERE `diseCode` = '$diseCode'";
                        $frmt_upl = mysqli_query($connection, $frmt_det);
                        
                        if($frmt_upl){
                            
                            ?>
                <meta http-equiv="refresh" content="0, http://localhost/payalStudioProject/card-temp-edit.php?diseCode=<?php echo $diseCode ?>">
                <?php
                }
                    }

                }
 
            }
            ?>

            <form action="" method="post" enctype="multipart/form-data" class="temp-form">

                <div class="tool-point class-point">
                    <h4>Class</h4>
                    <div class="class-point-body tool-point-body">
                        <span class="input-box">
                            <label for="class_size">Font Size</label>
                            <input type="number" name="class_size" id="class_size" min="10" max="86" step="1" value="<?php echo $getInfo['class_size'] ?>" oninput="classSize()">
                        </span>
                        <span class="input-box">
                            <label for="class_x">Left-Right</label>
                            <input type="number" name="class_x" id="class_x" min="0" max="276" step="1" value="<?php echo $getInfo['class_x'] ?>" oninput="classX()">
                        </span>
        
                        <span class="input-box">
                            <label for="class_y">Top-Bottom</label>
                            <input type="number" name="class_y" id="class_y" min="0" max="310" step="1" value="<?php echo $getInfo['class_y'] ?>"oninput="classY()">
                        </span>
                    </div>
                </div>

                <div class="tool-point name-point">
                    <h4>Name</h4>
                    <div class="name-point-body tool-point-body">
                        <span class="input-box">
                            <label for="name_size">Font Size</label>
                            <input type="number" name="name_size" id="name_size" min="10" max="40" step="1" value="<?php echo $getInfo['name_size'] ?>" oninput="nameSize()">
                        </span>
                        <span class="input-box">
                            <label for="name_color">Font Colour</label>
                            <input type="color" name="name_color" id="name_color" value="<?php echo $getInfo['name_color'] ?>" oninput="nameColor()">
                        </span>
                        <span class="input-box">
                            <label for="name_x">Left-Right</label>
                            <input type="number" name="name_x" id="name_x" min="0" max="250" step="1" value="<?php echo $getInfo['name_x'] ?>" oninput="nameX()">
                        </span>
                        <span class="input-box">
                            <label for="name_y">Top-Bottom</label>
                            <input type="number" name="name_y" id="name_y" min="0" max="310" step="1" value="<?php echo $getInfo['name_y'] ?>" oninput="nameY()">
                        </span>
                    </div>
                </div>

                <div class="tool-point photo-point">
                    <h4>Photo</h4>
                    <div class="photo-point-body tool-point-body">
                        <span class="input-box">
                            <label for="photo_size">Size</label>
                            <input type="number" name="photo_size" id="photo_size" min="50" max="150" step="1" value="<?php echo $getInfo['photo_size'] ?>" oninput="photoSize()">
                        </span>
                        <span class="input-box">
                            <label for="photo_x">Left-Right</label>
                            <input type="number" name="photo_x" id="photo_x" min="-161" max="116" step="1" value="<?php echo $getInfo['photo_x'] ?>" oninput="photoX()">
                        </span>
                        <span class="input-box">
                            <label for="photo_y">Top-Bottom</label>
                            <input type="number" name="photo_y" id="photo_y" min="0" max="260" step="1" value="<?php echo $getInfo['photo_y'] ?>" oninput="photoY()">
                        </span>
                        <span class="input-box">
                            <label for="photo_corner">Corner</label>
                            <input type="number" name="photo_corner" id="photo_corner" min="0" max="34" step="1" value="<?php echo $getInfo['photo_corner'] ?>" oninput="photoCorner()">
                        </span>
                    </div>
                </div>

                <div class="tool-point details-point">
                    <h4>Details</h4>
                    <div class="details-point-body tool-point-body">
                        <span class="input-box">
                            <label for="details_size">Font Size</label>
                            <input type="number" name="details_size" id="details_size" min="7" max="25" step="1" value="<?php echo $getInfo['details_size'] ?>" oninput="detailsSize()">
                        </span>
                        <span class="input-box">
                            <label for="details_x">Left-Right</label>
                            <input type="number" name="details_x" id="details_x" min="0" max="244" step="1" value="<?php echo $getInfo['details_x'] ?>" oninput="detailsX()">
                        </span>
                        <span class="input-box">
                            <label for="details_y">Top-Bottom</label>
                            <input type="number" name="details_y" id="details_y" min="0" max="280" step="1" value="<?php echo $getInfo['details_y'] ?>" oninput="detailsY()">
                        </span>
                    </div>
                </div>

                <input type="submit" name="submit_temp" value="Save-Details" class="submit" id="submit_temp">
            </form>
            
            <?php
            if(isset($_POST['submit_temp'])){
                if($getInfo['formate']!=''){

                    $class_size = $_POST['class_size'];
                    $class_x = $_POST['class_x'];
                    $class_y = $_POST['class_y'];
                    $name_size = $_POST['name_size'];
                    $name_color = $_POST['name_color'];
                    $name_x = $_POST['name_x'];
                    $name_y = $_POST['name_y'];
                    $photo_size = $_POST['photo_size'];
                    $photo_x = $_POST['photo_x'];
                    $photo_y = $_POST['photo_y'];
                    $photo_corner = $_POST['photo_corner'];
                    $details_size = $_POST['details_size'];
                    $details_x = $_POST['details_x'];
                    $details_y = $_POST['details_y'];
                    
                    $frmt_det = "UPDATE `card_temp` SET `class_size` = '$class_size', `class_x` = '$class_x', `class_y` = '$class_y', `name_size` = '$name_size', `name_color` = '$name_color', `name_x` = '$name_x', `name_y` = '$name_y', `photo_size` = '$photo_size', `photo_x` = '$photo_x', `photo_y` = '$photo_y', `photo_corner` = '$photo_corner', `details_size` = '$details_size', `details_x` = '$details_x', `details_y` = '$details_y' WHERE `diseCode` = '$diseCode'";
                    $frmt_upl = mysqli_query($connection, $frmt_det);
                    
                    if($frmt_upl){
                            
                        ?>
            <meta http-equiv="refresh" content="0, http://localhost/payalStudioProject/card-temp-edit.php?diseCode=<?php echo $diseCode ?>">
            <?php
                }
                else {
                   echo "<script> alert('Upload Card Formate') </script>";
                   
                   if($frmt_upl){
                            
                    ?>
        <meta http-equiv="refresh" content="0, http://localhost/payalStudioProject/card-temp-edit.php?diseCode=<?php echo $diseCode ?>">
        <?php
                }
            }
        }
    }
                            ?>

        </span>
        <span class="temp-container">

            <h1 class="temp-title">
                <h2>Sample</h2>
                
                <?php
                        if($getInfo['formate']!=''){
                            ?>
                            
                            <h2><?php echo $getInfo['diseCode'] ?></h2></h1>

            <main class="temp-card" style="background-image: url(/payalStudioProject/card-formate/<?php echo $getInfo['formate'] ?>);width:<?php if($getInfo['view']=='H'){echo "85mm"; } else{echo "55mm"; } ?>;height:<?php if($getInfo['view']=='H'){echo "55mm"; } else{echo "85mm"; } ?>;">

                <small class="s-class" id="s_class" style="font-size:<?php echo $getInfo['class_size'] ?>px;margin:<?php if ($getInfo['class_x']==0){ echo 'auto'; }else{ echo $getInfo['class_x'].'px'; } ?>;;margin-top:<?php echo $getInfo['class_y'] ?>px;">Class 3rd</small>
                <strong class="s-name" id="s_name" style="font-size:<?php echo $getInfo['name_size'] ?>px;margin:<?php if ($getInfo['name_x']==0){ echo 'auto'; }else{ echo $getInfo['name_x'].'px'; } ?>;;margin-top:<?php echo $getInfo['name_y'] ?>px;color:<?php echo $getInfo['name_color'] ?>;">Rajkumar Sahu</strong>

                <img class="s-photo" id="s_photo" src="/payalStudioProject/studentImages/DSC03456.JPG" alt="" style="width:<?php echo $getInfo['photo_size']*0.7; ?>px;height:<?php echo $getInfo['photo_size']*0.9; ?>px;margin-top:<?php echo $getInfo['photo_y'] ?>px;margin-left:<?php echo $getInfo['photo_x'] ?>px;border-radius:<?php echo $getInfo['photo_corner'] ?>px;">

                <div class="text-details" id="text_details" style="font-size:<?php echo $getInfo['details_size'] ?>px;margin-top:<?php echo $getInfo['details_y'] ?>px;margin-left:<?php echo $getInfo['details_x'] ?>px;">
                    <span class="details required-details">
                        <p>Father Name</p>
                        <p>DOB</p>
                        <p>Blood Group</p>
                        <p>Mobile</p>
                        <p>Add.</p>
                    </span>
                    <span class="details provide-details">
                        <p>: Ramsingh Kushwah</p>
                        <p>: 09/12/2018</p>
                        <p>: AB+</p>
                        <p>: 0123456789</p>
                        <p>: Gram Raisen</p>
                    </span>

                </div>

            </main>

            <footer class="temp-action">
                <button class="action-btn"><a href="http://localhost/payalStudioProject/card-temp-show.php?diseCode=<?php echo $diseCode ?>">Preview</a></button>
            </footer>

            <?php
                            }
                            else{
                                echo "<p class='upload-notice'>Upload Card Formate</p>";
                            }
                            ?>

        </span>
    </main>
    <footer class="footer"></footer>
    <script>
        function classSize(){
            var sizeI = document.getElementById("class_size").value;
            var sizeSet = document.getElementById("s_class").style.fontSize = sizeI + "px";
            // console.clear();
            // console.log(sizeSet);
        }
    

        function classX(){
            var xI = document.getElementById("class_x").value;
            var xSet = document.getElementById("s_class").style.marginLeft = xI + "px";
            // console.clear();
            // console.log(sizeSet);
        }

        function classY(){
            var yI = document.getElementById("class_y").value;
            var ySet = document.getElementById("s_class").style.marginTop = yI + "px";
            // console.clear();
            // console.log(sizeSet);
        }

        // ------------------------------

        function nameSize(){
            var sizeI = document.getElementById("name_size").value;
            var sizeSet = document.getElementById("s_name").style.fontSize = sizeI + "px";
            // console.clear();
            // console.log(sizeSet);
        }

        function nameColor(){
            var colorI = document.getElementById("name_color").value;
            var colorSet = document.getElementById("s_name").style.color = colorI;
            // console.clear();
            // console.log(colorSet);
        }

        function nameX(){
            var xI = document.getElementById("name_x").value;
            var xSet = document.getElementById("s_name").style.marginLeft = xI + "px";
            // console.clear();
            // console.log(xSet);
        }

        function nameY(){
            var yI = document.getElementById("name_y").value;
            var ySet = document.getElementById("s_name").style.marginTop = yI + "px";
            // console.clear();
            // console.log(ySet);
        }

        // ------------------------------

        function photoSize(){
            var sizeI = document.getElementById("photo_size").value;

            var widthSet = document.getElementById("s_photo").style.width = sizeI*0.7 + "px";
            var heightSet = document.getElementById("s_photo").style.height = sizeI*0.9 + "px";

            // console.clear();
            // console.log(widthSet);
            // console.log(heightSet);
        }

        function photoX(){
            var xI = document.getElementById("photo_x").value;
            var xSet = document.getElementById("s_photo").style.marginLeft = xI + "px";
            // console.clear();
            // console.log(xSet);
        }

        function photoY(){
            var yI = document.getElementById("photo_y").value;
            var ySet = document.getElementById("s_photo").style.marginTop = yI + "px";
            // console.clear();
            // console.log(ySet);
        }

        function photoCorner(){
            var cornerI = document.getElementById("photo_corner").value;
            var cornerSet = document.getElementById("s_photo").style.borderRadius = cornerI + "px";
            // console.clear();
            // console.log(cornerSet);
        }

        // ------------------------------

        function detailsSize(){
            var sizeI = document.getElementById("details_size").value;
            var sizeSet = document.getElementById("text_details").style.fontSize = sizeI + "px";
            // console.clear();
            // console.log(sizeSet);
        }
    

        function detailsX(){
            var xI = document.getElementById("details_x").value;
            var xSet = document.getElementById("text_details").style.marginLeft = xI + "px";
            // console.clear();
            // console.log(sizeSet);
        }

        function detailsY(){
            var yI = document.getElementById("details_y").value;
            var ySet = document.getElementById("text_details").style.marginTop = yI + "px";
            // console.clear();
            // console.log(sizeSet);
        }

    </script>

</body>

</html>