<?php

class ControladorActividad{

	/*============================================
	Mostrar todos los registros
	============================================*/

	public function index($page){


		if ($page != null) {
			
			/*============================================
			Mostrar actividad con paginación
			============================================*/

			$cantidad = 10;
			$desde = ($page-1)*$cantidad;

			$actividad = ControladorActividad::index("actividad", $cantidad, $desde);

		}else{

			/*============================================
			Mostrar todos los actividades
			============================================*/

			$actividad = ControladorActividad::index("actividad", null, null);

		}

		
		if (!empty($actividad)) {
			

			$json = array(
				"status"=>200,
				"total_registros"=>count($actividad),
				"detalle"=> $actividad
			);

			echo json_encode($json, true);
			return;
		}else{

			$json = array(
				"status"=>200,
				"total_registros"=>0,
				"detalle"=> "No hay ningún actividad registrado"
			);

			echo json_encode($json, true);
			return;

		}

	}
	/*============================================
	Crear una actividad
	============================================*/

	public function create($datos){
		echo '<pre> Desde controlador'; print_r($datos); echo "</pre>";
		


		/*============================================
		Validar datos
		============================================*/

		foreach ($datos as $key => $valueDatos) {
	
			if (isset($ValueDatos) && !preg_match('/^[(\\)\\=\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $ValueDatos)) {

				$json = array(
					"status"=>404,
					"detalle"=>"Error en el campo nombre".$key
				);

				echo json_encode($json, true);
				return;
			}
		}

		/*============================================
		Validar que la actividad o el objetivo general no estén repetidos
		============================================*/

		$actividad = ControladorActividad::index("actividad", null, null);
		foreach ($actividad as $key => $value) {
			
			if ($value->NOMBRE == $datos["NOMBRE"]) {

				$json = array(
					"status"=>404,
					"detalle"=>"El Nombre ya existe en la base de datos"
				);

				echo json_encode($json, true);
				return;
			}
			if ($value->OBJETIVO_GENERAL == $datos["OBJETIVO_GENERAL"]) {

				$json = array(
					"status"=>404,
					"detalle"=>"La Objetivo general ya existe en la base de datos"
				);

				echo json_encode($json, true);
				return;
			}
		}

		/*============================================
		Llevar datos al modelo
		============================================*/

		$datos = array( "ID_USUARIO"=>$datos["ID_USUARIO"],
						"ID_PERIODO"=>$datos["ID_PERIODO"],
						"NOMBRE"=>$datos["NOMBRE"],
						"OBJETIVO_GENERAL"=>$datos["OBJETIVO_GENERAL "],
						"COMPETENCIA "=>$datos["COMPETENCIA"],
						"TEMARIO "=>$datos["TEMARIO"],
						"AUTORIZADA"=>$datos["AUTORIZADA"],
						"ID_ORGANIGRAMA"=>$datos["ID_ORGANIGRAMA"],
						"NO_CREDITOS"=>$datos["NO_CREDITOS"]);



		$create = ControladorActividad::create("actividad", $datos);
		/*============================================
		Respuesta del modelo
		============================================*/

		if ($create == "ok") {

			$json = array(
				"status"=>200,
				"detalle"=>"Registro exitoso, su actividad ha sido guardada"
			);

			echo json_encode($json, true);
			return;
		}
	}#######
	/*============================================
	Mostrando un solo actividad
	============================================*/

	public function show($id){
			
		/*============================================
		Mostrar todos las actividades
		============================================*/

		$actividad = ControladorActividad::show("actividad", $id);

		if (!empty($actividad)) {
			

			$json = array(
				"status"=>200,
				"detalle"=> $actividad
			);

			echo json_encode($json, true);
			return;
		}else{

			$json = array(
				"status"=>200,
				"total_registros"=>0,
				"detalle"=> "No hay ninguna actividad registrado aaaa"
			);

			echo json_encode($json, true);
			return;

		}

	}
	/*============================================
	Editar una actividad
	============================================*/

	public function update($id, $datos){

		/*============================================
		Validar datos
		============================================*/

		foreach ($datos as $key => $valueDatos) {
	
			if (isset($ValueDatos) && !preg_match('/^[(\\)\\=\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $ValueDatos)) {

				$json = array(
					"status"=>404,
					"detalle"=>"Error en el campo nombre".$key
				);

				echo json_encode($json, true);
				return;
			}

			/*============================================
			Llevar datos al modelo
			============================================*/

			$datos = array( "ID_ACTIVIDAD"=>$id,
							"ID_USUARIO"=>$datos["ID_USUARIO"],
							"ID_PERIODO"=>$datos["ID_PERIODO"],
							"NOMBRE"=>$datos["NOMBRE"],
							"OBJETIVO_GENERAL"=>$datos["OBJETIVO_GENERAL "],
							"COMPETENCIA "=>$datos["COMPETENCIA"],
							"TEMARIO "=>$datos["TEMARIO"],
							"AUTORIZADA"=>$datos["AUTORIZADA"],
							"ID_ORGANIGRAMA"=>$datos["ID_ORGANIGRAMA"],
							"NO_CREDITOS"=>$datos["NO_CREDITOS"]);

			$update = ControladorActividad::update("actividad", $datos);
			/*============================================
			Respuesta del modelo
			============================================*/

			if ($update == "ok") {

				$json = array(
					"status"=>200,
					"detalle"=>"Registro exitoso, su actividad ha sido actualizada"
				);

				echo json_encode($json, true);
				return;
			}
		}
	}
	/*============================================
	Borrar actividad
	============================================*/

	public function delete($id){

		/*============================================
		Llevar datos al modelo
		============================================*/

		$delete = ControladorActividad::delete("actividad", $id);
		/*============================================
		Respuesta del modelo
		============================================*/

		if ($delete == "ok") {

			$json = array(
				"status"=>200,
				"detalle"=>"Se ha borrado su actividad con éxito"
			);

			echo json_encode($json, true);
			return;
		}
	}
}