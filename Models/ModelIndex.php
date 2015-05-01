<?php
	Include_once("config.php");
		
	Include_once("Classes/Objects.php");




	function GetArtistasDB(){
		$con = mysql_connect(Ip, User, Pwd);
		mysql_select_db(db);
		mysql_query("SET NAMES 'UTF8'");
		$query = "SELECT idartista, nombre FROM artista ORDER BY nombre";
		$Result = mysql_query($query, $con)  or die(mysql_error());
		
		return $Result;
	}


	function ExisteArtista($Artista){

		$con = mysql_connect(Ip, User, Pwd);
		mysql_select_db(db);
		mysql_query("SET NAMES 'UTF8'");
		$query = "SELECT idartista FROM artista WHERE nombre = '" . $Artista . "';";
		$Result = mysql_query($query, $con)  or die(mysql_error());
	
		if (mysql_num_rows($Result) > 0){
			$MyRow = mysql_fetch_array($Result);
			return $MyRow[0];
		}
		else{
			return 0;
		}
	}

	function ExisteCancion($Cancion){
		$con = mysql_connect(Ip, User, Pwd);
		mysql_select_db(db);
		mysql_query("SET NAMES 'UTF8'");
		$query = "SELECT idcancion FROM cancion WHERE nombre = '" . $Cancion . "';";
		$Result = mysql_query($query, $con)  or die(mysql_error());
		
		if (mysql_num_rows($Result) > 0){
			$MyRow = mysql_fetch_array($Result);
			return $MyRow[0];
		}
		else{
			return 0;
		}
	}
	
	function ExisteVideo($URL){
		$con = mysql_connect(Ip, User, Pwd);
		mysql_select_db(db);
		mysql_query("SET NAMES 'UTF8'");
		$query = "SELECT url FROM video WHERE url  = '" . $URL . "';";
		$Result = mysql_query($query, $con)  or die(mysql_error());
		
		if (mysql_num_rows($Result) > 0){
			$MyRow = mysql_fetch_array($Result);
			return true;
		}
		else{
			return false;
		}
	}
	
	function SaveArtistaDB($Artista){
		$con = mysql_connect(Ip, User, Pwd);
		mysql_select_db(db);
		mysql_query("SET NAMES 'UTF8'");
		$query = "INSERT INTO artista (nombre) VALUES ('" . $Artista . "');";
		mysql_query($query, $con)  or die(mysql_error());
	}

	function SaveCancionDB($Cancion){
		$con = mysql_connect(Ip, User, Pwd);
		mysql_select_db(db);
		mysql_query("SET NAMES 'UTF8'");
		$query = "INSERT INTO cancion (nombre) VALUES ('" . $Cancion . "');";
		mysql_query($query, $con)  or die(mysql_error());
	}

	function SaveURLDB($Artista, $Cancion, $Url){
		$con = mysql_connect(Ip, User, Pwd);
		mysql_select_db(db);
		mysql_query("SET NAMES 'UTF8'");
		$query = "INSERT INTO video (idartista, idcancion, url) VALUES (". $Artista . ",
																		". $Cancion . ",
																		'". $Url . "');";
		mysql_query($query, $con)  or die(mysql_error());	
	}		

	function GetRandomVideoDB(){
		$con = mysql_connect(Ip, User, Pwd);
		mysql_select_db(db);
		mysql_query("SET NAMES 'UTF8'");
		$query = "SELECT url FROM video WHERE idvideo = (SELECT MAX(idvideo) FROM video) ORDER BY RAND() LIMIT 1";
		$Result = mysql_query($query, $con)  or die(mysql_error());
		
		$MyRow = mysql_fetch_array($Result);

		return $MyRow[0]; 
	}

        function GetCountSongsBD(){
                $con = mysql_connect(Ip, User, Pwd);
		mysql_select_db(db);
		mysql_query("SET NAMES 'UTF8'");
		$query = "SELECT COUNT(*) FROM video";
		$Result = mysql_query($query, $con)  or die(mysql_error());
		
		$MyRow = mysql_fetch_array($Result);

		return $MyRow[0]; 
        }

       function GetBusquedasDB(){
                $con = mysql_connect(Ip, User, Pwd);
		mysql_select_db(db);
		mysql_query("SET NAMES 'UTF8'");
		$query = "SELECT * FROM busqueda";
		$Result = mysql_query($query, $con)  or die(mysql_error());
		
		return $Result; 
     

       }
?>		