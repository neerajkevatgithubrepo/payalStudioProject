<?php
include("databaseConnection.php");
if (isset($_POST['submit'])) {
    $sdc = "sdc";
    $diseCode = $_POST['diseCode'];
    $iCode = trim(strtolower($sdc . $diseCode));
    $ipwd = $_POST['ipwd'];
    $spwd = "Abc@615634";

    $query = "CREATE TABLE `schoolidcard`.`$iCode` (`sNo` INT NOT NULL AUTO_INCREMENT , `diseCode` VARCHAR(30) NOT NULL ,`ipwd` VARCHAR(30) NOT NULL ,`class` VARCHAR(10) NOT NULL , `ssmId` VARCHAR(9) NOT NULL , `sName` VARCHAR(30) NOT NULL , `fatherName` VARCHAR(30) NOT NULL , `dob` VARCHAR(10) NOT NULL , `sMobile` VARCHAR(15) NOT NULL , `sAdd` VARCHAR(200) NOT NULL , `sPic` VARCHAR(500) NOT NULL , `spwd` VARCHAR(30) NOT NULL , PRIMARY KEY (`sNo`)) ENGINE = InnoDB;";
    $checkQuery = mysqli_query($connection, $query);
    if ($checkQuery) {
        $infoSave = "INSERT INTO `$iCode` (`diseCode`, `ipwd`, `spwd`) VALUES ('$diseCode','$ipwd','$spwd');";
        $query = mysqli_query($connection, $infoSave);
        if ($infoSave) {
            $save_sample = "INSERT INTO `card_temp` (`diseCode`) VALUES ('$iCode');";
            $sample_query = mysqli_query($connection, $save_sample);
            if($sample_query){
            echo ' . <script> alert("Card Selected") </script> .';
        }
        else{
            echo " . <script> alert('Card Problem') </script> . ";
        }
        } else {
            echo " . <script> alert('School Registraition Failed') </script> . ";
        }
    }
}
?>
<button style="margin-left:50%;padding:5px;text-decoration:none;padding:5px"><a href="homepage.html">Go to Home Page</a></button>


<!-- CREATE TABLE `schoolidcard`.`sdc0123` (`sNo` INT NOT NULL AUTO_INCREMENT , `diceCode` VARCHAR(30) NOT NULL , `ipwd` VARCHAR(30) NOT NULL , `principalSign` VARCHAR(500) NOT NULL , `iMobile` VARCHAR(15) NOT NULL , `studentName` VARCHAR(30) NOT NULL , `class` VARCHAR(10) NOT NULL , `father` VARCHAR(30) NOT NULL , `dob` VARCHAR(10) NOT NULL , `sMobile` VARCHAR(15) NOT NULL , `sAdd` VARCHAR(200) NOT NULL , PRIMARY KEY (`sNo`)) ENGINE = InnoDB; -->