  <!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php 
      Include("Controllers/ControllerIndex.php");

      $URL = GetRandomVideo();
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

    <script type = "text/javascript">

        $(document).ready(function(){
          $(".dropdown-menu li a").click(function(){
            var selText = $(this).text();
            $(this).parents('.btn-group').find('.dropdown-toggle').html(selText+' <span class="caret"></span>');
          });
        })



    </script>


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
                

                <li class='list-group-item'>
                   Español<span class="badge">42</span>
                </li>
            </ul>
            
        </div>
      </div>
    </div>



<!--INICIO-->  


<div class="row">

  <div class="col-xs-6 col-sm-2"></div>

</div> 


<div class="row">
  <div class="col-xs-6 col-sm-2 leyenda"></div>
  <div class="col-xs-6 col-sm-10"><div class="form-group">
  
    <form role="form" method = "post">
        <div class="form-group">
          <label for="exampleInputPassword1">URL</label>
          <input type="text" class="form-control" id="exampleInputtext1" name = "url" placeholder="Url">
        </div>
    
      <div class="form-group">
          <label for="exampleInputtext1">Nombre</label>
          <input type="text" class="form-control" id="exampleInputtext1" name = "cancion" placeholder="Canción">
      </div>

      <div class="form-group">
          <label for="exampleInputtext1">Artista</label>
          <input type="text" class="form-control" id="exampleInputtext1" name = "artista" placeholder="Artista">
      </div>

  <br>
  <button type="submit" class="btn btn-primary">Submit</button> </form>

  </div>
</div>
</form>

  
  
</div> 



<?php

  if (isset($_POST['url']) && isset($_POST['cancion']) && isset($_POST['artista'])  )
  {
    SaveCancion($_POST['url'], $_POST['cancion'], $_POST['artista']);
  }

?>

/**/
