<?php 


// Making sure that the user is not able to access the backend
if (isset($_POST["signup-submit"])) {
    
    $name = $_POST["name"];
    $emp_id = $_POST["emp_id"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $pwdrepeat = $_POST["pwdrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($name,$email,$pwd,$pwdrepeat,$emp_id)!== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }

    if (invalidUid($emp_id)!== false){
        header("location: ../signup.php?error=invalidUid");
        exit();
    }
    
    if (invalidemail($email)!== false){
        header("location: ../signup.php?error=invalidemail");
        exit();
    }

    if (pwdMatch($pwd,$pwdrepeat)!== false){
        header("location: ../signup.php?error=passwordMismatch");
        exit();
    }

    if (uidExists($conn,$emp_id,$email)!== false){
        header("location: ../signup.php?error=NameTaken");
        exit();
    }

    createuser($conn,$name,$email,$pwd,$pwdrepeat,$emp_id);
}
else{
    header("location:../signup.php");
    exit();
}