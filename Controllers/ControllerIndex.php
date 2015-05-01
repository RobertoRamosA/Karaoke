<?php

	Include("Models/ModelIndex.php");
		

	function ComboArtistas(){
		$dsArtista = GetArtistasDB();
			$html = "";
			$html = $html . "<table id = 'tblAll'>";
			$cont = 0;
			$cont2 = 0;

			$i = 65;

				while($MyRow = mysql_fetch_array($dsArtista)){

					$cont++;
					$cont2++;

					$html = $html . "<tr>";
					
					if ($MyRow[1][0] == chr($i)){
						$html = $html . "<td class = '" . chr($i) . "' id = 'a$cont2'><a id = 'link$cont2' href = '" . $MyRow[0] . "' role = 'menuitem'>" . $MyRow[1] . "</a></td>";	
						$i++;
					}
					else{
						$html = $html . "<td  id = 'a$cont2'><a id = 'link$cont2' href = '" . $MyRow[0] . "' role = 'menuitem'>" . $MyRow[1] . "</a></td>";
					}

					$html = $html . "</tr>";
				}
				
			$html = $html . "</table>";
		echo $html;
	}

	function SaveCancion($URL, $Cancion, $Artista){
		
		$IdArtista = ExisteArtista($Artista);
		$IdCancion = ExisteCancion($Cancion);

		if (strpos($URL,'youtube') !== false) {
			$VideoCode = explode("=", $URL);			
			$URL= "www.youtube.com/embed/" . $VideoCode[1];
		}

		if ($IdArtista == 0){
			//No existe, Insertar
			SaveArtistaDB($Artista);
			$IdArtista = ExisteArtista($Artista);
		}

		if ($IdCancion == 0){
			//No existe, Insertar
			SaveCancionDB($Cancion);
			$IdCancion = ExisteCancion($Cancion);
		}

		if (ExisteVideo($URL) == false){
			SaveURLDB($IdArtista, $IdCancion, $URL);
		}
	}
	
	function GetRandomVideo(){
		return GetRandomVideoDB();
	}

        function GetCountSongs(){
                return GetCountSongsBD();
        }

	function GetBusquedas(){

		$result = GetBusquedasDB();

		$html = "";
			$html = $html . "<table style = 'background-color:white;' class='table table-bordered'>";
					
					$html = $html . "<tr>";
						$html = $html . "<td>Busqueda</td>";	
						$html = $html . "<td>Resultados</td>";	
					$html = $html . "</tr>";
		
				while($MyRow = mysql_fetch_array($result)){
					$html = $html . "<tr>";
						$html = $html . "<td>" . $MyRow[1] . "</td>";	
						$html = $html . "<td>" . $MyRow[2] . "</td>";	

					$html = $html . "</tr>";
				}
				
			$html = $html . "</table>";
		echo $html;
	}


?>	