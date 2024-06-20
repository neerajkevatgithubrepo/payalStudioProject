<?php
include('databaseConnection.php');
error_reporting(0);
if (isset($_POST['submit'])) {
    $sdc = "sdc";
    $diseCode = $_POST['diseCode'];
    $iCode = trim(strtolower($sdc . $diseCode));

    $class       = $_POST['class'];
    $ssmId   = $_POST['ssmId'];
    $sName        = $_POST['sName'];
    $fatherName  = $_POST['fatherName'];
    $dob = $_POST['dob'];
    $sMobile      = $_POST['sMobile'];
    $sAdd     = $_POST['sAdd'];

    $sPic        = $_FILES['sPic']['name'];
    $tempphoto    = $_FILES['sPic']['tmp_name'];
    $imagePath    = "studentImages/" . $sPic;
    $photo_upload = move_uploaded_file($tempphoto, $imagePath);

    $fetchdata = "SELECT * FROM $iCode where `ssmId` ='$ssmId'";
    $data = mysqli_query($connection, $fetchdata);
    $getData = mysqli_fetch_assoc($data);

    $issmId = $getData['ssmId'];
    if ($ssmId != $issmId) {

        $insert = "INSERT INTO `$iCode` (`diseCode`, `class`, `ssmId`, `sName`, `fatherName`, `dob`, `sMobile`, `sAdd`, `sPic`) VALUES ('$diseCode', '$class', '$ssmId', '$sName', '$fatherName', '$dob', '$sMobile', '$sAdd', '$sPic');";
        $query  = mysqli_query($connection, $insert) or die("query error");

        if ($query) {
            echo "<script> alert('Registration Sucsess.') </script>";
            header("homePage.html");
        } else {
            echo "<script> alert('Data not submitted') </script>";
        }
    } else {
        echo "<script> alert('This Department is Allredy Registerd') </script>";
    }
}
?>
<button style="margin-left:50%;padding:5px;text-decoration:none;padding:5px"><a href="homepage.html">Go to Home Page</a></button>
<?php
$class       = $_POST['class'];
    echo "radhe".$class;
    ?>