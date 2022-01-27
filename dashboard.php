<?php 
session_start();
$username=$_SESSION['sid'];
if(empty($username)){
    header("location:login.php");
}
$error="";
if(isset($_POST['submit'])){
    if(!empty($_POST['radio'])){
        $employeetype=$_POST['radio'];
    }
$employer=$_POST['employer'];
$employeestatus=$_POST['es'];
$jobtitle=$_POST['jobtitle'];
$reviewhead=$_POST['reviewhead'];
$pros=$_POST['textarea1'];
$cons=$_POST['textarea2'];
$advice=$_POST['textarea3'];
$terms=$_POST['terms'];


if(!empty($employeetype) && !empty($employer) && !empty($employeestatus) && !empty($jobtitle) && !empty($reviewhead) 
&& !empty($pros) && !empty($cons) && !empty($advice) && !empty($terms)){
    if(is_dir("users/$username")){
        $error="Folder Already Exists";
    }else{
        mkdir("users/$username");
        $tmp=$_FILES['file']['tmp_name'];
        $filename=$_FILES['file']['name'];
        $ext=pathinfo($filename,PATHINFO_EXTENSION);
        $filepath="users/$username/$username.$ext";
        if($ext=="pdf" || $ext=="docx"){
            if(!empty($tmp)){
                move_uploaded_file($tmp,$filepath);
                
            }else{
                $error="Select a file";
            }
        }else{
            $error="Only pdf and docx format allowed!";
        }
    }
}else{
    $error="Fill the blank fields!";
}
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Dashboard</title>
    
    <script>
        function hide13(){
            document.getElementById("step2").style.display="block";
            document.getElementById("step1").style.display="none";
            document.getElementById("step3").style.display="none";
        }
        function hide12(){
            document.getElementById("step3").style.display="block";
            document.getElementById("step1").style.display="none";
            document.getElementById("step2").style.display="none";
        }
        function hide23(){
            document.getElementById("step1").style.display="block";
            document.getElementById("step3").style.display="none";
            document.getElementById("step2").style.display="none";
        }
        function onclick1(){
            hide13();
        }
        function onclick2(){
            hide12();
        }
        function onclick3(){
            hide23();
        }
        function onclick4(){
            hide13();
        }
    </script>
    <script>
        $("#star-rating-1").rating();
    </script>
    <style>
        #regiration_form fieldset:not(:first-of-type) {
            display: none;
        }
        .main{
            background-color: rgb(45, 48, 59);
            padding: 20px;
            border-radius: 15px;
            color:white;
            border:2px solid rgb(189, 197, 217);
            margin-left: 300px;
            margin-right: 300px;
        }
        body{
            background-image: url("images/adminbg.jpg");
            font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }
    </style>
</head>
<body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">Home </a>
            </li>
            <li class="nav-item navs">
                <a class="nav-link" href="#">Welcome :<?php echo $username; ?></a>
            </li>
            <li class="nav-item navs">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
            </ul>
        </div>
        </nav>
    </header>
    <br><br>
    <div class="main">
        <?php 
            if(!empty($error)){
        ?>
        <div style="margin-top: 40px;" class="alert alert-danger"> <?php echo $error;?></div>
        <?php
          }
        ?>
    <form id="regiration_form"  method="post" enctype="multipart/form-data" novalidate>
		<fieldset id="step1">
			<h2>Step 1:</h2><br>
			<div class="form-group">
				<label >Are you a current or former employee?</label><br><br>
                <input type="radio" name="radio" id="radio1" value="current">Current Employee <br>
                <input type="radio" name="radio" id="radio2" value="former">Former Employee
            </div><br>
			<div class="form-group">
				<label>Employers Name: </label>
				<input type="text" class="form-control" name="employer" id="employer" placeholder="Employers Name">
			</div><br>
				<input type="button" name="next1" onclick="onclick1()" class="next btn btn-info" value="Next" />
		</fieldset>
		<fieldset id="step2">
			<h2> Step 2:</h2>
			<div class="form-group">
            <label class="control-label">Overall Rating: </label><br>
            <?php include "rating.php" ?>
            </div><br>
			<div class="form-group">
				<label>Employment Status:</label>
                <select name="es" id="es">
                    <option value="fulltime">Full Time</option>
                    <option value="parttime">Part Time</option>
                    <option value="contract">Contract</option>
                    <option value="intern">Intern</option>
                </select>			
            </div><br>
            <div class="form-group">
				<label>Jon Title: </label>
				<input type="text" class="form-control" name="jobtitle" id="jobtitle" placeholder="Job Title">
			</div><br>
            <div class="form-group">
				<label>Review Headline: </label>
				<input type="text" class="form-control" name="reviewhead" id="reviewhead" placeholder="Review Headline">
			</div><br>
            <label>Pros:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <textarea name="textarea1" minlength="15" maxlength="200" id="" placeholder="Enter text here ..." cols="60" rows="3" form="regiration_form"></textarea><br><br>
            <label>Cons:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <textarea name="textarea2" minlength="15" maxlength="200"   id="" placeholder="Enter text here ..." cols="60" rows="3" form="regiration_form"></textarea><br><br>
            <label>Advice Management:</label>
            <textarea name="textarea3"  minlength="15" maxlength="200" id="" placeholder="Enter text here ..." cols="60" rows="3" form="regiration_form"></textarea><br><br>
			<input type="button" name="previous1" onclick="onclick3()" class="previous btn btn-info" value="Previous" />
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="button" name="next2" onclick="onclick2()" class="next btn btn-info" value="Next" />
		</fieldset>
		<fieldset id="step3">
			<h2>Step 3: </h2>
			<div class="form-group">
				<label>Submit Proof:</label><br><br>
				<input type="file" class="form-control" id="file" name="file" placeholder="File">
			</div><br><br>
			<div class="form-group">
            <input type="checkbox" name="terms" id="terms">
            <input type="hidden" name="terms">
			<label>Agree to Terms & Conditions</label><br><br>
			</div>
				<input type="button" name="previous2" onclick="onclick4()" class="previous btn btn-info" value="Previous" />
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="submit" name="submit" class="submit btn btn-success" value="Submit" id="submit" />
		</fieldset>
	</form>
    </div>
    
</body>
</html>