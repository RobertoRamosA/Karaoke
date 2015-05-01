  <!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php 
      Include("Controllers/ControllerIndex.php");
    ?>
    <title><?php echo NombreProyecto; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="Style/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="Style/Dashboard.css" rel="stylesheet">
    <link rel="stylesheet" type = "text/css" href="Style/StyleProject.css">
    <script type = "text/javascript" src = "Scripts/jquery.js"></script>
    <script type = "text/javascript" src = "Scripts/Bootstrap/js/bootstrap.js"></script>


</head>




  <body>
  

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         <?php echo "<a class='navbar-brand'>" . NombreNegocio . "</a>";?>
        
        </div>
          <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a><?php echo NombreProyecto;?></a></li>
          </ul>

        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar list-group">
                

<!--                <li class='list-group-item'>
                   Español<span class="badge">42</span>
                </li>
-->
            </ul>
            
        </div>
      </div>
    </div>



<!--INICIO-->  


<div class="row">
  <div class="col-xs-6 col-sm-2"></div>
</div> 

<br>

<div class="row" >
  <div class="col-xs-6 col-sm-2 leyenda"></div>
  <div class="col-xs-6 col-sm-10">

  <center>


    <?php GetBusquedas();?>


  </center>

  <br>

   
  </div>
</div> 
<br>


<center>
<div class="row" >
  <div class="col-xs-6 col-sm-2 leyenda"></div>
  <div class="col-xs-6 col-sm-10">

   <div id = "ajax"></div>  

    <div id = "Video" class="form-group">
     <!-- <iframe width="854" height="510" src="//<?php echo $URL ?>" frameborder="0" allowfullscreen></iframe>-->
    </div>

</div> 
</center>


</body>
</html>

<?php

  if (isset($_POST['url']) && isset($_POST['cancion']) && isset($_POST['artista'])  )
  {
    SaveCancion($_POST['url'], $_POST['cancion'], $_POST['artista']);
  }

?>

/**/
