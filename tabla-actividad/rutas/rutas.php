<?php

$arrayRutas = explode("/", $_SERVER['REQUEST_URI']);

if (isset($_GET["page"]) && is_numeric($_GET["page"])) {
	
	$actividad = new ControladorActividad();
	$actividad -> index($_GET["page"]);

}else{

	if (count(array_filter($arrayRutas)) == 0) {

		/*============================================
		Cuando no se hace ninguna petición a la API
		============================================*/

		$json = array(
			"detalle" => "no encontrado 1" 
		);

		echo json_encode($json, true);
		return;
	}else{
		/*============================================
		Cuando pasamos solo un índice en el array $arrayRutas
		============================================*/

		if (count(array_filter($arrayRutas)) == 1) {

			/*============================================
			Cuando se hace peticiones desde actividad
			============================================*/

			if (array_filter($arrayRutas)[1] == "actividad") {
				
				/*============================================
				Peticiones GET
				============================================*/

				if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "GET") {
					
					$actividad = new ControladorActividad();
					$actividad -> index(null);
				}
				/*============================================
				Peticiones POST
				============================================*/

				else if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

					/*============================================
					Capturar datos
					============================================*/

					$datos = array( "ID_USUARIO"=>$_POST["ID_USUARIO"],
									"ID_PERIODO"=>$_POST["ID_PERIODO"],
									"NOMBRE"=>$_POST["NOMBRE"],
									"OBJETIVO_GENERAL"=>$_POST["OBJETIVO_GENERAL"],
									"COMPETENCIA "=>$_POST["COMPETENCIA"],
									"TEMARIO "=>$_POST["TEMARIO"],
									"AUTORIZADA"=>$_POST["AUTORIZADA"],
									"ID_ORGANIGRAMA"=>$_POST["ID_ORGANIGRAMA"],
									"NO_CREDITOS"=>$_POST["NO_CREDITOS"]);

					echo '<pre>'; print_r($datos); echo "</pre>";
					
					$crearActividad = new ControladorActividad();
					$crearActividad -> create($datos);

				}else{
					$json = array(
						"detalle" => "no encontrado 2" 
					);

					echo json_encode($json, true);
					return;
				}
			}else{
				$json = array(
					"detalle" => "no encontrado 3" 
				);

				echo json_encode($json, true);
				return;
			}	
		}else{#

			/*============================================
			Cuando se hace peticiones desde una sola actividad
			============================================*/

			if (array_filter($arrayRutas)[1] == "actividad" && is_numeric(array_filter($arrayRutas)[2])) {

				/*============================================
				Peticiones GET
				============================================*/

				if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "GET") {
					
					$actividad = new ControladorActividad();
					$actividad -> show(array_filter($arrayRutas)[2]);
				}
				/*============================================
				Peticiones PUT
				============================================*/

				else if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "PUT") {

					/*============================================
					Capturar datos
					============================================*/

					$datos = array();
					
					parse_str(file_get_contents('php://input'), $datos);

					$editarActividad = new ControladorActividad();
					$editarActividad -> update(array_filter($arrayRutas)[2], $datos);
				}
				/*============================================
				Peticiones DELETE
				============================================*/

				else if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "DELETE") {
					
					$borrarActividad = new ControladorActividad();
					$borrarActividad -> delete(array_filter($arrayRutas)[2]);
				}else{
					$json = array(
						"detalle" => "no encontrado 4" 
					);

					echo json_encode($json, true);
					return;
				}
			}else{
				$json = array(
					"detalle" => "no encontrado 5" 
				);

				echo json_encode($json, true);
				return;
			}
		}
	}
}