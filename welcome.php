<?php
if(!empty($_COOKIE['username'])){
    $username=$_COOKIE['username'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Welcome</title>
    <style>
        body{
            background-image: url("images/adminbg.jpg");
        }
        #button{
            margin-left: 530px;
            margin-top: 150px;
        }
    </style>
    <script>
        function click(){
            if(document.cookie=="username=test_user"){
                document.location.href="dashboard.php";
            }else{
                document.location.href="login.php";
            }
        }
    </script>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item active navs br">
                    <a class="nav-link" href="dashboard.php">Home </a>
                </li>
                <li class="nav-item navs ml br">
                    <a class="nav-link" href="#">Welcome </a>
                </li>
                <li class="nav-item navs ml">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                </ul>
            </div>
        </nav>    
    </header>
    <br><br>
    <section>
<!--         <input type="hidden" id="hidden" name="submit">
 -->        <input type="button" id="button" name="submit" onclick="click()" class="btn btn-primary" value="Start Feedback">&nbsp;	&nbsp;	&nbsp;
    </section>
</body>
</html>