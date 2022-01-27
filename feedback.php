<?php 
 session_start();
 $sid=$_SESSION['sid'];
 if(empty($sid)){
   header("location:login.php");
 }
 
if(isset($_POST['sub'])){
    $tmp=$_FILES['att']['tmp_name'];//read tmp name
    $fname=$_FILES['att']['name'];//orginal name
    $ext=pathinfo($fname,PATHINFO_EXTENSION);//get file extension
    $fn="attach-".rand()."-".time().".$ext";
    if(!empty($tmp)){
        if($ext=="doc" || $ext=="pdf"){
        $dest="upload/";
        if(move_uploaded_file($tmp,$dest.$fn)){   
          $data = [
            "path" => "upload/$fn",
            "empname" => $_POST['empname'],
            "emp" => $_POST['emp'],
            "empstatus" => $_POST['empstatus'],
            "jobtitle" => $_POST['jobtitle'],
            "review" => $_POST['review'],
            "pros" => $_POST['pros'],
            "cons" => $_POST['cons'],
            "advice" => $_POST['advice'],
        ];    
        }
        else {
            $err = "File Uploading error";
        }
    }else{
        $err = "Invalid extension.Only pdf and doc files allowed";
    }
    }else {
        $err = "Plz select a attach";
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <title>feedback</title>
  </head>
  <body>
    <?php include("nav1.php");
    if(!empty($data)){
      
  ?>
  
  <h1>Thank You</h1>
    <p>Here is the information you have submitted:</p>
    <ol>
        <li><em>Are you a current or former employee?&nbsp;</em> <?php echo $data['emp']?></li>
        <li><em>Employer's name :- &nbsp;</em> <?php echo $data['empname']?></li>
        <li><em>Employment status :- &nbsp;</em> <?php echo $data['empstatus']?></li>
        <li><em>Job title :- &nbsp;</em> <?php echo $data['jobtitle']?></li>
        <li><em>Review headline :- &nbsp;</em> <?php echo $data['review']?></li>
        <li><em>pros :- &nbsp;</em> <?php echo $data['pros']?></li>
        <li><em>cons :- &nbsp;</em> <?php echo $data['cons']?></li>
        <li><em>Advice management :- &nbsp;</em> <?php echo $data['advice']?></li>
        <li><em>Proof :- &nbsp;</em><?php echo $data['path']?></li>

   

    </ol>
    <?php 
    }else{
      ?>
  <main>
        <header class="jumbotron bg-dark text-white">
            <h1 class="text-center">We value your feedback</h1>
            <h5 class="text-center">Please complete the following form and help us improve!</h5>
        </header>
        <section class="container">
        <?php 
          if(!empty($err)){
            ?>
      <div class="alert alert-danger"> <?php echo $err;?></div>
            <?php
          }
          ?>
  <form method="post" enctype="multipart/form-data">
      <div class="form-group">
          <label>Are you a current or former employee?<br>
          <input type="radio" name="emp" value="current">current
          <input type="radio" name="emp" value="Former">Former          
      </div>
      <div class="form group">
          <label>Employer's name</label><br>
          <input type="text" class="form-control" name="empname">
      </div>
  
  <div class="form-group">
    <label for="exampleFormControlSelect1">Employment status</label>
    <select class="form-control" name="empstatus">
      <option>Full Time</option>
      <option>Part Time</option>
      <option>Contract</option>
      <option>Intern</option>
  
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Job title</label>
    <input type="text" class="form-control" name="jobtitle">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Review Headline</label>
    <input type="text" class="form-control" name="review">
  </div>
 
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Pros</label>
    <textarea class="form-control" name="pros" rows="3" minlength="15" maxlength="200"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Cons</label>
    <textarea class="form-control" name="cons" rows="3" minlength="15" maxlength="200"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Advice Management</label>
    <textarea class="form-control" name="advice" rows="3" minlength="15" maxlength="200"></textarea>
  </div>
 
  <div class="form-group">
    <label>Submit Proof</label>
    <input type="file" name="att" class="form-control"/><br/>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Agree terms and Conditions</label>
    <input type="checkbox" class="input-checkbox" name="agree">
  </div>

 
 

  <button type="submit" name="sub" class="btn btn-primary">Submit</button>

      


</form>

        </section>
  </main>
  <?php
    }
    ?>

  </body>
</html>
