<?php

	Include("../config.php");
	Include("../Classes/Objects.php");

	function GetNextId($Table){
		$con = mysql_connect(Ip, User, Pwd);
		mysql_select_db(db);
				mysql_query("SET NAMES 'UTF8'");
		$query = "SELECT * FROM " . $Table . " LIMIT 1";
		$Result = mysql_query($query, $con)  or die(mysql_error());
		$Field = mysql_field_name ($Result , 0);
		
		$query = "SELECT IFNULL( MAX( " . $Field . " ) + 1 , 1 )  FROM " . $Table . ";";

		$Result = mysql_query($query, $con)  or die(mysql_error());

		$MyRow = mysql_fetch_array($Result);
		$Id = $MyRow[0];

		mysql_close($con);	
		return $Id;	
	}


	function GetSongsDB($IdArtista){
		$con = mysql_connect(Ip, User, Pwd);
		mysql_select_db(db);
				mysql_query("SET NAMES 'UTF8'");	
		$query = "SELECT V.idvideo, C.idcancion, C.nombre, V.url 
				 FROM cancion C JOIN video V ON C.idcancion = V.idcancion 
				 			   jOIN artista A ON V.idartista = A.idartista
				 WHERE A.idArtista = " . $IdArtista . "
                                               AND V.idvideo NOT IN (SELECT idvideo FROM reporte WHERE solucion = 0)
				 ORDER BY C.Nombre";

		$Result = mysql_query($query, $con) or die(mysql_error());
		mysql_close($con);	

		return $Result;	
	}

	function GetBusquedaDB($Busqueda){
		$con = mysql_connect(Ip, User, Pwd);
		mysql_select_db(db);
		mysql_query("SET NAMES 'UTF8'");	

		$query = "SELECT V.idvideo, C.idcancion, C.nombre, V.url 
				 FROM cancion C JOIN video V ON C.idcancion = V.idcancion 
				 			   jOIN artista A ON V.idartista = A.idartista
				 WHERE C.nombre LIKE '%$Busqueda%' OR A.nombre LIKE '%$Busqueda%'
				 ORDER BY C.Nombre";

		$Result = mysql_query($query, $con) or die(mysql_error());
		mysql_close($con);	

		return $Result;	
	}

	function SaveBusquedaDB($Busqueda, $Resultados){
		$con = mysql_connect(Ip, User, Pwd);
		mysql_select_db(db);
		mysql_query("SET NAMES 'UTF8'");	

		$query = "INSERT INTO busqueda (busqueda,
			                            resultados,
			                            fecha) VALUES ('" . $Busqueda . "',
			                            			        $Resultados,
													   '" . date("Y-m-d H:i:s") . "');";

		mysql_query($query, $con) or die(mysql_error());
		mysql_close($con);	

	}

	function AddPlayDB($Video){
		$con = mysql_connect(Ip, User, Pwd);
		mysql_select_db(db);
		mysql_query("SET NAMES 'UTF8'");	

		$query = "INSERT INTO reproduccion (idvideo,
			                                                      fecha) VALUES (" . $Video . ",
			                            			        			 '" . date("Y-m-d H:i:s") . "');";

		mysql_query($query, $con) or die(mysql_error());
		mysql_close($con);	

	}

       	function SaveReportUrlDB($IdVideo){
		$con = mysql_connect(Ip, User, Pwd);
		mysql_select_db(db);
		mysql_query("SET NAMES 'UTF8'");	


		$query = "INSERT INTO reporte  (idvideo,
			                                               fecha) VALUES (" . $IdVideo . ",
			                            			                         '" . date("Y-m-d H:i:s") . "');";
		mysql_query($query, $con) or die(mysql_error());
		mysql_close($con);			
	}


?>
	