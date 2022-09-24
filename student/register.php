<?php

require_once '../dbcon.php';

if (isset($_POST['student_register'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $roll = $_POST['roll'];
    $reg = $_POST['reg'];
    $phone = $_POST['phone'];

    $input_errors = array();
    if (empty($fname)) {
        $input_errors['fname'] = "First Name field is required!";
    }
    if (empty($lname)) {
        $input_errors['lname'] = "Last Name field is required!";
    }
    if (empty($email)) {
        $input_errors['email'] = "Email field is required!";
    }
    if (empty($username)) {
        $input_errors['username'] = "Username field is required!";
    }
    if (empty($password)) {
        $input_errors['password'] = "Password field is required!";
    }
    if (empty($roll)) {
        $input_errors['roll'] = "Roll field is required!";
    }
    if (empty($reg)) {
        $input_errors['reg'] = "Registration field is required!";
    }
    if (empty($phone)) {
        $input_errors['phone'] = "Phone No field is required!";
    }

    if (count($input_errors) == 0) {
        $password_hash = password_hash($password, PASSWORD_DEFAULT); // Hashing Password

        $result = mysqli_query($con, "INSERT INTO `students`(`fname`, `lname`, `roll`, `reg`, `email`, `username`, `password`, `phone`, `Status`) VALUES ('$fname','$lname','$roll','$reg','$email','$username','$password_hash','$phone', '0')");
        if ($result) {
            $success = "Registration Successfully completed!";
        } else {
            $error = "Something Wrong";
        }
    }
}

?>

<!doctype html>
<html lang="en" class="fixed accounts sign-in">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Student Registration</title>
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/stylesheets/css/style.css">
</head>

<body>
    <div class="wrap">
        <!-- page BODY -->
        <!-- ========================================================= -->
        <div class="page-body animated slideInDown">
            <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
            <!--LOGO-->
            <div class="logo">
                <h1 class="text-center">LMS</h1>
                <?php
                if (isset($success)) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?= $success ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="box">
                <!--SIGN IN FORM-->
                <div class="panel mb-none">
                    <div class="panel-content bg-scale-0">
                        <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
                            <div class="form-group mt-md">
                                <span class="input-with-icon">
                                    <input type="text" class="form-control" id="name" placeholder="First Name" name="fname">
                                    <i class="fa fa-user"></i>
                                </span>
                                <?php
                                if (isset($input_errors['fname'])) {
                                    echo '<span class="input-error">' . $input_errors['fname'] . '</span>';
                                }
                                ?>
                            </div>
                            <div class="form-group mt-md">
                                <span class="input-with-icon">
                                    <input type="text" class="form-control" id="name" placeholder="Last Name" name="lname">
                                    <i class="fa fa-user"></i>
                                </span>
                                <?php
                                if (isset($input_errors['lname'])) {
                                    echo '<span class="input-error">' . $input_errors['lname'] . '</span>';
                                }
                                ?>
                            </div>
                            <div class="form-group mt-md">
                                <span class="input-with-icon">
                                    <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <?php
                                if (isset($input_errors['email'])) {
                                    echo '<span class="input-error">' . $input_errors['email'] . '</span>';
                                }
                                ?>
                            </div>
                            <div class="form-group mt-md">
                                <span class="input-with-icon">
                                    <input type="text" class="form-control" id="email" placeholder="Username" name="username">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <?php
                                if (isset($input_errors['username'])) {
                                    echo '<span class="input-error">' . $input_errors['username'] . '</span>';
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <span class="input-with-icon">
                                    <input type="password" class="form-control" placeholder="Password" name="password">
                                    <i class="fa fa-key"></i>
                                </span>
                                <?php
                                if (isset($input_errors['password'])) {
                                    echo '<span class="input-error">' . $input_errors['password'] . '</span>';
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <span class="input-with-icon">
                                    <input type="text" class="form-control" placeholder="Roll" name="roll" pattern="[0-9]{6}">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <?php
                                if (isset($input_errors['roll'])) {
                                    echo '<span class="input-error">' . $input_errors['roll'] . '</span>';
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <span class="input-with-icon">
                                    <input type="text" class="form-control" placeholder="Reg. No" name="reg" pattern="[0-9]{6}">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <?php
                                if (isset($input_errors['reg'])) {
                                    echo '<span class="input-error">' . $input_errors['reg'] . '</span>';
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <span class="input-with-icon">
                                    <input type="text" class="form-control" placeholder="01*******" name="phone" pattern="01[1|5|6|7|8|9][0-9]{8}">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <?php
                                if (isset($input_errors['phone'])) {
                                    echo '<span class="input-error">' . $input_errors['phone'] . '</span>';
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary btn-block" type="submit" name="student_register" value="Register">
                            </div>
                            <div class="form-group text-center">
                                Have an account?, <a href="sign-in.php">Sign In</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        </div>
    </div>
    <!--BASIC scripts-->
    <!-- ========================================================= -->
    <script src="../assets/vendor/jquery/jquery-1.12.3.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/vendor/nano-scroller/nano-scroller.js"></script>
    <!--TEMPLATE scripts-->
    <!-- ========================================================= -->
    <script src="../assets/javascripts/template-script.min.js"></script>
    <script src="../assets/javascripts/template-init.min.js"></script>
    <!-- SECTION script and examples-->
    <!-- ========================================================= -->
</body>

</html>