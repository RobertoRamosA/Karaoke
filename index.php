<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Karaoke online">
    <meta name="author" content="Roberto Ramos"
    <?php
    Include("Controllers/ControllerIndex.php");
    $URL = GetRandomVideo();
    ?>
    <title><?php echo NombreProyecto; ?></title>
    <!-- Bootstrap core CSS -->

    
    <script type = "text/javascript" src = "Scripts/jquery.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/js/materialize.min.js"></script>
      <link href='http://fonts.googleapis.com/css?family=Lora' rel='stylesheet' type='text/css'>    

    <link rel="stylesheet" type = "text/css" href="Style/StyleProject.css">
   </head>
  <script type = "text/javascript">
  function Reportar(idvideo){
  $("#ajax").load("Controllers/ControllerAjax.php?Req=ReportUrl&id=" + idvideo);
  }
  function getsongs(id){
  $("#ajax").load("Controllers/ControllerAjax.php?Req=GetSongs&Artista=" + id);
  }
  function Buscar(Busqueda){
  $("#ajax").load("Controllers/ControllerAjax.php?Req=Buscar&Busqueda=" + Busqueda);
  }
  function LoadVideo(x, idvideo){
  var url = "http://";
  url = url + $("#u"+x).text();
  url = url + "?autoplay=1";
  var btnReportar = "<div class='btn-group'><button type='button' class='btn btn-danger' onclick='javascript:Reportar("+ idvideo +")'>Reportar</button>" + "</div>";
  var idvideo = $("#id" + x).text();
  $("#ajaxNoReponse").load("Controllers/ControllerAjax.php?Req=AddPlay&Video=" + idvideo);
  $("#Video").html("");
  $("#Video").append("<iframe width='854' height='510' src='" + url + "' frameborder='0' allowfullscreen></iframe>" + btnReportar);
  $('html, body').animate({
  scrollTop: $("#Video").offset().top
  });
  }
  function Ir(letra){
  if ($("." + letra).length > 0){
  var id = $('#tblAll').find("." + letra).attr("id").match(/\d+/)[0] // "3"
  mostrar2(id);
  }
  $('#TblAll').find("." + letra).find("td:nth-child(2)").attr("id");
  }
  function mostrar2(actual){
  var contador = 1;
  
  for (x=actual;x<=actual+7;x++){
  var val = $("#tblAll").find("#a"+x).text();
  var a_href = $('#tblAll').find("#link"+x).attr('href');
  //              $("#hdnidartista").val(a_href);
  $("#TblMenu").find("#m"+contador).html("<a onclick='javascript:getsongs(" + a_href + ")');>" + val + "</a>");
  contador++;
  $("#hdncont").val(actual);
  cont = $("#hdncont").val();
  }
  for (x=1; x<=8; x++){
  $("#m"+x).removeClass("selected");
  }
  $("#m1").addClass("selected");
  posicion = 1;
  }
  $(document).ready(function(){
  posicion = 1;
  posicionvertical =0 ;
  $('#iwbanner_41311').hide();
  $(".dropdown-menu li a").click(function(){
  var selText = $(this).text();
  $(this).parents('.btn-group').find('.dropdown-toggle').html(selText+' <span class="caret"></span>');
  });
  mostrar(1);
  $("#m1").addClass("selected");
  document.onkeydown = function(e) {
  switch (e.keyCode) {
  case 13:
  var js = $('#TblMenu').find(".selected").find('a').attr('onclick');
  var id = js.match(/\d+/)[0] // "3"
  if ($("#TblSongs").length > 0){
  idvideo = $('#TblSongs').find(".selected").find("td:nth-child(2)").attr("id");
  idvideo = idvideo.match(/\d+/)[0] // "3"
  LoadVideo(idvideo);
  }
  else{
  $("#ajax").load("Controllers/ControllerAjax.php?Req=GetSongs&Artista=" + id);
  }
  
  break;
  case 37:
  $("#TblSongs").remove();
  if (cont == 1){
  break;
  }
  cont = $("#hdncont").val();
  if ($("#m1").hasClass("selected")) {
  mostrar(cont-1);
  }
  
  if (!$("#m1").hasClass("selected")) {
  $("#m" + posicion).removeClass("selected");
  }
  if (posicion != 1){
  posicion = posicion - 1;
  $("#m" + posicion).addClass("selected");
  }
  
  cont = parseInt(cont)-1;
  $("#hdncont").val(cont);
  $("#hdnpos").val(posicion);
  break;
  case 38:
  //flecha arriba
  if ($("#TblSongs").find("tr:first").hasClass("selected") || posicionvertical > 0) {
  $("#TblSongs").find("#v"+posicionvertical).removeClass("selected");
  posicionvertical = posicionvertical - 1;
  $("#TblSongs").find("#v"+posicionvertical).addClass("selected");
  }
  break;
  case 40:
  // $("#TblSongs").find("tr:first").addClass("selected");
  //flecha abajo
  if ($("#TblSongs").find("tr:first").hasClass("selected") || posicionvertical <= $("#NumSongs").val()) {
  $("#TblSongs").find("#v"+posicionvertical).removeClass("selected");
  posicionvertical = posicionvertical + 1;
  $("#TblSongs").find("#v"+posicionvertical).addClass("selected");
  }
  else{
  $("#TblSongs").find("tr:first").addClass("selected");
  posicionvertical = 1;
  }
  
  break;
  case 39:
  $("#TblSongs").remove();
  cont = $("#hdncont").val();
  if ($("#m8").hasClass("selected")) {
  mostrar(cont-6);
  }
  
  if (!$("#m8").hasClass("selected")) {
  $("#m" + posicion).removeClass("selected");
  }
  
  if (posicion != 8){
  posicion = posicion + 1;
  $("#m" + posicion).addClass("selected");
  }
  
  cont = parseInt(cont)+1;
  $("#m" + cont).addClass("selected");
  $("#hdncont").val(cont);
  break;
  }
  };
  function mostrar(actual){
  var contador = 1;
  
  for (x=actual;x<=actual+7;x++){
  var val = $("#tblAll").find("#a"+x).text();
  var a_href = $('#tblAll').find("#link"+x).attr('href');
  //              $("#hdnidartista").val(a_href);
  $("#TblMenu").find("#m"+contador).html("<a onclick='javascript:getsongs(" + a_href + ")');>" + val + "</a>");
  contador++;
  }
  }
  })
  
  </script>
  <body>
    
   <nav>
    <div class="nav-wrapper">
      <form>
        <div class="input-field">
          <input id="search" type="search" required onbind = "javascript:Buscar($('#txtBusqueda').val());">
          <label for="search"><i class="mdi-action-search"></i></label>
          <i class="mdi-navigation-close"><?php echo "<a class='navbar-brand'>" . NombreNegocio . "</a>";?></i>
        </div>
      </form>
    </div>
  </nav>

    <!--INICIO-->
    <br>
        <?php
        
        echo "<nav>";
          echo "<ul class='pagination'>";
            for($i=65; $i<=90; $i++) {
            $letra = chr($i);
            
            //        echo "<a class = 'pointer' onclick=javascript:Ir('" . chr($i) . "')>" . $letra . "</a> | ";
            echo "<li class = 'pointer' onclick=javascript:Ir('" . chr($i) . "')><span>" . $letra . "</span></li>";
            }
          echo "</ul>";
        echo "</nav>";
        ?>
        </center>
        <br>
        <table id = "TblMenu">
          <tr>
            <td id ="m1" class = "selected pointer"></td>
            <td id ="m2" class = "pointer"></td>
            <td id ="m3" class = "pointer"></td>
            <td id ="m4" class = "pointer"></td>
          </tr>
          <tr>
            <td id ="m5" class = "pointer"></td>
            <td id ="m6" class = "pointer"></td>
            <td id ="m7" class = "pointer"></td>
            <td id ="m8" class = "pointer"></td>
          </tr>
        </table>
        <input type = "hidden" id = "hdncont" value = "1"/>
        <input type = "hidden" id = "hdnidartista" value = "0"/>
        
        <ul>
          <?php ComboArtistas();?>
        </ul>
        
      </div>
    </div>
    <br>
    <center>
      
          <div id = "ajax"></div>
          <div id = "ajaxNoReponse"></div>
          <div id = "Video" class="video-container no-controls">
            <!-- <iframe width="854" height="510" src="//<?php echo $URL ?>" frameborder="0" allowfullscreen></iframe>-->
          </div>

      </center>
<br>
    </body>
  </html>
  <?php
  if (isset($_POST['url']) && isset($_POST['cancion']) && isset($_POST['artista'])  )
  {
  SaveCancion($_POST['url'], $_POST['cancion'], $_POST['artista']);
  }
  ?>
  