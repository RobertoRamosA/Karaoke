<script type = "text/javascript" src = "../funciones.js"></script>

<?php
	Include("../Models/ModelAjax.php");
	$AjaxRequest = $_GET["Req"];
	if ($AjaxRequest == 'GetSongs'){
		$Artista = $_GET['Artista'];
	
		$Res = GetSongsDB($Artista);
		$html = "";
		$Contador = 0;
			
						$html .= "<table class='hoverable' id = 'TblSongs' class='table table-hover'>";
							while ($MyRow = mysql_fetch_array($Res)){
								$Contador++;
					$html .= 	"<tr id = 'v$Contador' onclick=javascript:LoadVideo(" . $Contador . "," . $MyRow[0] . ");>";
									$html .=      '<td>' . $MyRow[2] . '</td>';
									$html .=      "<td  id = 'u$Contador' style = 'display:none;'>" . $MyRow[3] . "</td>";
									$html .=      "<td  id = 'id$Contador' style = 'display:none;'>" . $MyRow[0] . "</td>";
								$html .=    "</tr>";
							}
							
		
				$html .= "<input type = 'hidden' id = 'NumSongs' value = '" . mysql_num_rows($Res) . "'/>";
		
			echo $html;
		}
		else if ($AjaxRequest == 'Buscar'){
			$Busqueda = $_GET['Busqueda'];
			$Res = GetBusquedaDB($Busqueda);
			$html = "";
			$Contador = 0;
				$html .= "<div class='row'>";
					$html .= "<div class='col-xs-6 col-sm-2 leyenda'></div>";
					$html .= "<div class='col-xs-6 col-sm-5 form-group'>";
									$html .= "<div class = 'table table-striped'>";
							$html .= "<table id = 'TblSongs' class='table table-hover'>";
								//Guardo en BD La busqueda
								SaveBusquedaDB($Busqueda, mysql_num_rows($Res));
								if (mysql_num_rows($Res) == 0){
									$form = $Busqueda;
									$headers = 'Content-Type: text/html; charset=ISO-8859-1\r\n From: rbto60@facebook.com';
									mail('rbto60@facebook.com', 'Buffalo Western', $form, $headers, 'rbto60@facebook.com');
								}
								while ($MyRow = mysql_fetch_array($Res)){
									$Contador++;
										$html .= 	"<tr id = 'v$Contador' onclick=javascript:LoadVideo(" . $Contador . "," . $MyRow[1] . ");>";
						$html .=      '<td>' . $MyRow[2] . '</td>';
										$html .=      "<td  id = 'u$Contador' style = 'display:none;'>" . $MyRow[3] . "</td>";
										$html .=      "<td  id = 'id$Contador' style = 'display:none;'>" . $MyRow[0] . "</td>";
									$html .=    "</tr>";
								}
								
							$html .= "</table>";
									$html .= "</div>";
					$html .= "</div>";
					$html .= "<input type = 'hidden' id = 'NumSongs' value = '" . mysql_num_rows($Res) . "'/>";
				echo $html;
			}
		
			else if ($AjaxRequest == 'AddPlay'){
				$Video = $_GET['Video'];
				AddPlayDB($Video);
		}
		else if ($AjaxRequest == 'ReportUrl'){
				$IdVideo = $_GET['id'];
				SaveReportUrlDB($IdVideo);
			
			}
		?>