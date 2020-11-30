<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</head>
<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    width: 90%;
    margin: auto;
  }


</style>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="#">SurveySite</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNav">
  <ul class="navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="?page=home">Home<!--<span class="sr-only">(current)</span> --></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="?page=createSurvey">Survey</a>
    </li>

    <?php if(isset($_SESSION["Connected"]) && $_SESSION == true) { ?>
      <li class="nav-item">
        <a class="nav-link" href="?page=user"><?= $_SESSION["Username"] ?></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="?page=create-user&action=disconnect">Log Out</a>
      </li>
    <?php } ?> 
    
  </ul>
</div>
</nav>


