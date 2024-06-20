<!DOCTYPE html>
<?php
    include('databaseConnection.php');
    
    $diseCode = $_GET['diseCode'];
    $fetchdata ="SELECT * FROM `card_temp` WHERE `diseCode`='$diseCode'";
    $data = mysqli_query($connection, $fetchdata);
    $getInfo = mysqli_fetch_assoc($data);
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Template</title>
    <link rel="stylesheet" href="card-temp-show.css">
</head>

<body id="page-body">
    <header class="header"></header>
    <main class="main">
        <span class="tool-container">
            <form action="card-temp-action.php" method="post" enctype="multipart/form-data" class="temp-form">
                <div class="tool-point formate-point">
                    <h4>Formate</h4>
                    <div class="formate-point-body tool-point-body">
                        <span class="formate-input-box">
                            <label for="formate">Copy</label>
                            <input type="file" name="formate" id="formate" disabled />
                        </span>

                        <span class="formate-input-box">
                            <label for="view">View</label>
                            <span class="radio-input">
                                <input type="radio" name="view" id="" value="V" disabled /> Vertical
                                <input type="radio" name="view" id="" value="H" disabled /> Horizontal
                            </span>

                        </span>
                    </div>
                </div>
                <input type="submit" name="submit_frmt" value="Save-Fotmate" class="submit" id="submit_frmt" disabled>
            </form>

            <?php
                        if($getInfo['formate']!=''){
                            ?>

            <form action="card-temp-action.php" method="post" enctype="multipart/form-data" class="temp-form">

                <div class="tool-point class-point">
                    <h4>Class</h4>
                    <div class="class-point-body tool-point-body">
                        <span class="input-box">
                            <label for="class_size">Font Size</label>
                            <input type="number" id="class_size" step="2" value="<?php echo $getInfo['class_size'] ?>"
                                disabled />

                        </span>
                        <span class="input-box">
                            <label for="class_x">Position(X)</label>
                            <input type="number" id="class_x" value="<?php echo $getInfo['class_x'] ?>" disabled />
                        </span>
                        <span class="input-box">
                            <label for="class_y">Position(Y)</label>
                            <input type="number" id="class_y" value="<?php echo $getInfo['class_y'] ?>" disabled />
                        </span>
                    </div>
                </div>

                <div class="tool-point name-point">
                    <h4>Name</h4>
                    <div class="name-point-body tool-point-body">
                        <span class="input-box">
                            <label for="name_size">Font Size</label>
                            <input type="number" id="name_size" value="<?php echo $getInfo['name_size'] ?>" disabled />
                        </span>
                        <span class="input-box">
                            <label for="name_color">Font Colour</label>
                            <input type="color" id="name_color" value="<?php echo $getInfo['name_color'] ?>" disabled />
                        </span>
                        <span class="input-box">
                            <label for="name_x">Position(X)</label>
                            <input type="number" id="name_x" value="<?php echo $getInfo['name_x'] ?>" disabled />
                        </span>
                        <span class="input-box">
                            <label for="name_y">Position(Y)</label>
                            <input type="number" id="name_y" value="<?php echo $getInfo['name_y'] ?>" disabled />
                        </span>
                    </div>
                </div>

                <div class="tool-point photo-point">
                    <h4>Photo</h4>
                    <div class="photo-point-body tool-point-body">
                        <span class="input-box">
                            <label for="photo_size">Size</label>
                            <input type="number" id="photo_size" value="<?php echo $getInfo['photo_size'] ?>"
                                disabled />
                        </span>
                        <span class="input-box">
                            <label for="photo_x">Position(X)</label>
                            <input type="number" id="photo_x" value="<?php echo $getInfo['photo_x'] ?>" disabled />
                        </span>
                        <span class="input-box">
                            <label for="photo_y">Position(Y)</label>
                            <input type="number" id="photo_y" value="<?php echo $getInfo['photo_y'] ?>" disabled />
                        </span>
                        <span class="input-box">
                            <label for="photo_cornor">Cornor</label>
                            <input type="number" id="photo_corner" value="<?php echo $getInfo['photo_corner'] ?>"
                                disabled />
                        </span>
                    </div>
                </div>

                <div class="tool-point details-point">
                    <h4>Details</h4>
                    <div class="details-point-body tool-point-body">
                        <span class="input-box">
                            <label for="details_size">Font Size</label>
                            <input type="number" id="details_size" value="<?php echo $getInfo['details_size'] ?>"
                                disabled />
                        </span>
                        <span class="input-box">
                            <label for="details_x">Position(X)</label>
                            <input type="number" id="details_x" value="<?php echo $getInfo['details_x'] ?>" disabled />
                        </span>
                        <span class="input-box">
                            <label for="details_y">Position(Y)</label>
                            <input type="number" id="details_y" value="<?php echo $getInfo['details_y'] ?>" disabled />
                        </span>
                    </div>
                </div>

                <input type="submit" value="Save-Details" class="submit" id="submit_temp" disabled />

            </form>

            <?php
        }
        ?>

        </span>
        <span class="temp-container">

            <h1 class="temp-title">
                <h2>Sample</h2>

                <?php
                        if($getInfo['formate']!=''){
                            ?>

                <h2>
                    <?php echo $getInfo['diseCode'] ?>
                </h2>
            </h1>

            <main class="temp-card"
                style="background-image: url(/payalStudioProject/card-formate/<?php echo $getInfo['formate'] ?>);width:<?php if($getInfo['view']=='H'){echo "
                85mm"; } else{echo "55mm" ; } ?>;height:
                <?php if($getInfo['view']=='H'){echo "55mm"; } else{echo "85mm"; } ?>;">

                <small class="s-class" id="s_class"
                    style="font-size:<?php echo $getInfo['class_size'] ?>px;margin:<?php if ($getInfo['class_x']==0){ echo 'auto'; }else{ echo $getInfo['class_x'].'px'; } ?>;;margin-top:<?php echo $getInfo['class_y'] ?>px;">Class
                    3rd</small>
                <strong class="s-name" id="s_name"
                    style="font-size:<?php echo $getInfo['name_size'] ?>px;margin:<?php if ($getInfo['name_x']==0){ echo 'auto'; }else{ echo $getInfo['name_x'].'px'; } ?>;;margin-top:<?php echo $getInfo['name_y'] ?>px;color:<?php echo $getInfo['name_color'] ?>;">Rajkumar
                    Sahu</strong>

                <img class="s-photo" id="s_photo" src="/payalStudioProject/studentImages/DSC03456.JPG" alt=""
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
                        <p>: Ramsingh Kushwah</p>
                        <p>: 09/12/2018</p>
                        <p>: AB+</p>
                        <p>: 0123456789</p>
                        <p>: Gram Raisen</p>
                    </span>

                </div>

            </main>

            <footer class="temp-action">
                <!-- <button class="action-btn"></button> -->
                <button class="action-btn"><a
                        href="http://localhost/payalStudioProject/card-temp-edit.php?diseCode=<?php echo $diseCode ?>">Edit
                        Template</a></button>

                <!-- <button class="action-btn">Print Card</button> -->
                <button class="action-btn"><a
                        href="http://localhost/payalStudioProject/print-sheet.php?diseCode=<?php echo $diseCode ?>">Print
                        Card</a></button>
            </footer>

            <?php
                            }
                            ?>

        </span>
    </main>
    <footer class="footer"></footer>

</body>

</html>