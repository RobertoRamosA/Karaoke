<?php

	function EjecutarSP($con, $db, $spName, $MySQL_Parameter){

		if (count($MySQL_Parameter) == 0){
			$query = "CALL " . $spName;
		}
		else{
			$query = 'CALL ' . $spName . ' (';
			foreach ($MySQL_Parameter as $p){
				$query .= $p . " , "; 
			}
			$query = substr($query, 0, strlen($query)-2);
			$query .= ")";
		}
		echo $query;

		$Result = mysql_query($query, $con)  or die(mysql_error());
		mysql_close($con);	

		return $Result;
	}

	function CreateCombo($Id, $Class, $Result, $sIndex, $sValue, $OpcionInicial){
		echo"<select name = '" . $Id . "' class = '" . $Class . "' id = '" . $Id . "'>";
			
			if ($OpcionInicial != ''){
				echo "<option value = '0'>" . $OpcionInicial . "</option>";
			}
			while($MyRow = mysql_fetch_array($Result)){
				echo "<option value = '" . $MyRow[  $sIndex  ] . "''>";
						echo $MyRow[  $sValue  ];
				echo "</option>";
			}
		echo"</select>";
	}

	function CreateList($Id, $Class, $Result, $Value){
		echo"<ul name = '" . $Id . "' class = '" . $Class . "' id = '" . $Id . "'>";
			
			while($MyRow = mysql_fetch_array($Result)){
				echo "<li>";
						echo $MyRow[ $Value ];
				echo "</li>";
			}
		echo"</select>";
	}

	function CreateListLink($Id, $Class, $Result, $Value, $Link, $ParameterName, $ParameterValue){
		echo"<ul name = '" . $Id . "' class = '" . $Class . "' id = '" . $Id . "'>";
			
			while($MyRow = mysql_fetch_array($Result)){
				echo "<li>";
				    echo "<a href = '" . $Link . "?" . $ParameterName . "=" . $MyRow[$ParameterValue] . "'>";
						echo $MyRow[ $Value ];
					echo "</a>";	
				echo "</li>";
			}
		echo"</select>";
	}
	
	function CreateTable($Id, $Result, $Headers, $Columns){
		$cont = 0;
        echo"<div class='table-responsive'>";
		echo"<table class = 'table' id = '" . $Id . "' style='margin-top:10px'; >";
			
			echo "<tr class = 'header'>";
				foreach ($Headers as $header){
					echo "<td>" . $header . "</td>";
				}
			echo "</tr>";

			while($MyRow = mysql_fetch_array($Result)){
				$cont++;      

	            if($cont % 2 == 0){
	              echo "<tr class = 'par'>";
	            } 
	            else{
	              echo "<tr class = 'impar'>";
	            }

					foreach ($Columns as $Column){
						echo "<td>" . $MyRow[  $Column  ] . "</td>";
					}

				echo "</tr>";
			}

		echo"</table>";
        echo"</div>";
	}


	function SaveFile($Imagen, $target_path){

		move_uploaded_file($Imagen, $target_path);
	
	}

	function AlertJS($Mensaje){
		echo "<script type = 'text/javascript'> alert('" . $Mensaje . "');</script>";
	}

	function GetCoordenadas($Ciudad, $Colonia, $Calle, $Numero){

		$Direccion = $Ciudad . '+' . $Colonia . '+' . $Calle . '+' . $Numero;
		$Direccion = str_replace(" ", "%20", $Direccion);

		$geo_url = "http://maps.google.com/maps/api/geocode/json?address=" . $Direccion .  "&sensor=false";

		$json_result = json_decode(file_get_contents(str_replace(" ", "%20",$geo_url)));

		$geo_result =  $json_result->results[0];

		$Coordenadas = $geo_result->geometry->location;
		//$lng = $geo_result->geometry->location->lng;

		return $Coordenadas;

	}

	function GetPostalCode($Ciudad, $Colonia, $Calle, $Numero){
		$Direccion = $Ciudad . '+' . $Colonia . '+' . $Calle . '+' . $Numero;
		$Direccion = str_replace(" ", "%20", $Direccion);

		$geo_url = "http://maps.google.com/maps/api/geocode/json?address=" . $Direccion . "&sensor=false";

		$json_result = json_decode(file_get_contents(str_replace(" ", "%20",$geo_url)));

		return $json_result->results[0]->address_components[6]->short_name;
	}


?>

