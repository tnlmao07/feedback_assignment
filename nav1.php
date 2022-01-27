<link href="style.css" rel="stylesheet">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Neo<strong class="text-uppercase text-danger">feedback</strong></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item ">
        <a class="nav-link text-dark" href="index.php">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="#">Welcome :<?php echo $sid;?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="logout.php" onclick="return confirm('Are you sure?')">Logout</a>
      </li>
    </ul>
  </div>
</nav>