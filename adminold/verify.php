<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Verify user account</title>
</head>

<body>

    <?php
    $id = $_GET['id'];
    $token = $_GET['token'];
    require 'classes/usersClass.php';
    $objUser = new Users();
    $objUser->setId($id);
    $user = $objUser->getUserById();
    if (is_array($user) && count($user) > 0) {
        if (sha1($user['id']) == $token) {
            if ($objUser->activateUserAccount()) {
                echo 'Congratulation, Your account activated, You can login now.';
                echo '<a href="index.php" class="btn btn-primary">Click here to login</a>';
            } else {
                echo 'Some problem occurd. Try after some time';
            }
        } else {
            echo  'We can\'t find your details in our database';
        }
    } else {
        echo  'We can\'t find your details in our database';
    }

    ?>
</body>

</html>