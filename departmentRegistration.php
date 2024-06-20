<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="departmentRegistrationStyle.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>school registration form</title>
</head>
<body>
    <div id="formBox">
        <form id="formaria" method="POST" action="depRegistrationBackend.php" enctype="multipart/form-data">
            <div class="inputAria">
                 <input type="text" name="diseCode" id="diseCode" placeholder="Enter Your school dise code"required>
                 <input type="text" name="ipwd" id="password" placeholder="Create a login password"required>
                 <input type="submit" name="submit" id="submit">
            </div>
        </form>
    </div>
</body>
</html>