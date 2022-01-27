<?php
error_reporting(0);
session_start();
if(!empty($_SESSION['sid'])){
    header('Location:dashboard.php');
}

$error="";
if(isset($_POST['submit']) && isset($_POST['check'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $pass1=$password;
    $check=$_POST['check'];
    if(!empty($username) && !empty($check &&!empty($password))){
        if($username=="test_user" && $password="123456"){
            $_SESSION['sid']=$username;
            setcookie("username","$username",time()+3600*20,"/");
            setcookie("password","$pass1",time()+3600*20,"/");
            header('Location:dashboard.php');
        }else{
            $error="Invalid Credentials";
        }
    }else{
        $error="Fill In The Blank Fields";
    }
}
function input_field($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <style>
        .main{
            background-color: rgb(45, 48, 59);
            padding: 20px;
            margin: 25px;
            border-radius: 15px;
            color:white;
            border:2px solid rgb(189, 197, 217);
        }
        body{
            margin-left: 300px;
            margin-right: 300px;
            background-image: url("images/adminbg.jpg");
            font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }
        .error{
            color: red;
        }
       
    </style>
    <script>
        function cook(){
            if("<?php echo $_COOKIE['email'] ?>"!=undefined){
                if(document.getElementById("email").value=="<?php echo $_COOKIE['email']; ?>"){
                    document.getElementById("password").value="<?php echo $_COOKIE['password']?>";
                }else{
                    /* document.getElementById("email").value="";
                    document.getElementById("password").value=""; */
                }
            }
        }
    </script>
</head>
<body>
    <div class="main">
        <form class="mar" method="post">
            <h2 style="font-size:28px;color:rgb(39, 45, 61);text-align:center; background-color:rgb(189, 197, 217);
        padding:5px;border-radius:10px">NeoSoft Feedback</h2>
            <?php 
            if(!empty($error)){
            ?>
                <div style="margin-top: 40px;" class="alert alert-danger"> <?php echo $error;?></div>
            <?php
                } 
            ?>
            <div class="form-group ">
                <label for="username">Username: </label>
                <input type="text" name="username" class="form-control" id="username" onchange="cook()" aria-describedby="emailHelp" placeholder="Enter Username">
            </div><br>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div><br>
            <div class="form-group form-check">
                <input name="check" value="0" type="hidden">
                <input type="checkbox" name="check" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember Me</label>
            </div><br>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>	&nbsp;	&nbsp;	&nbsp;
        </form>
    </div>

</body>
</html>