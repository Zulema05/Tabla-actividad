<?php

require_once "conexion.php";

class ModeloActividad{

	/*============================================
	Mostrar todas los actividades
	============================================*/

	static public function index($tabla, $cantidad, $desde){

		//$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		if ($cantidad != null) {
			
			$stmt = Conexion::conectar()->prepare("SELECT $tabla.ID_USUARIO, $tabla.ID_PERIODO, $tabla.NOMBRE, $tabla.OBJETIVO_GENERAL, $tabla.COMPETENCIA, $tabla.TEMARIO, $tabla.AUTORIZADA, $tabla.ID_ORGANIGRAMA, $tabla.NO_CREDITOS FROM $tabla LIMIT $desde, $cantidad");

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT $tabla.ID_USUARIO, $tabla.ID_PERIODO, $tabla.NOMBRE, $tabla.OBJETIVO_GENERAL, $tabla.COMPETENCIA, $tabla.TEMARIO, $tabla.AUTORIZADA, $tabla.ID_ORGANIGRAMA, $tabla.NO_CREDITOS FROM $tabla");

		}

		$stmt -> execute();
		return $stmt -> fetchAll(PDO::FETCH_CLASS);
		$stmt -> close();
		$stmt = null;
	}

	/*============================================
	Creacion de una actividad
	============================================*/

	static public function create($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(ID_USUARIO, ID_PERIODO, NOMBRE, OBJETIVO_GENERAL, COMPETENCIA, TEMARIO, AUTORIZADA, ID_ORGANIGRAMA, NO_CREDITOS) VALUES (:ID_USUARIO, :ID_PERIODO, :NOMBRE, :OBJETIVO_GENERAL, :COMPETENCIA, :TEMARIO, :AUTORIZADA, :ID_ORGANIGRAMA, :NO_CREDITOS)");

		$stmt -> bindParam(":ID_USUARIO", $datos["ID_USUARIO"], PDO::PARAM_STR);
		$stmt -> bindParam(":ID_PERIODO", $datos["ID_PERIODO"], PDO::PARAM_STR);
		$stmt -> bindParam(":NOMBRE", $datos["NOMBRE"], PDO::PARAM_STR);
		$stmt -> bindParam(":OBJETIVO_GENERAL", $datos["OBJETIVO_GENERAL"], PDO::PARAM_STR);
		$stmt -> bindParam(":COMPETENCIA", $datos["COMPETENCIA"], PDO::PARAM_INT);
		$stmt -> bindParam(":TEMARIO", $datos["TEMARIO"], PDO::PARAM_INT);
		$stmt -> bindParam(":AUTORIZADA", $datos["AUTORIZADA"], PDO::PARAM_INT);
		$stmt -> bindParam(":ID_ORGANIGRAMA", $datos["ID_ORGANIGRAMA"], PDO::PARAM_STR);
		$stmt -> bindParam(":NO_CREDITOS", $datos[" NO_CREDITOS"], PDO::PARAM_STR);

		
		if ($stmt -> execute()) {
			
			return "ok";

		}else{

			print_r(Conexion::conectar()->errorInfo());

		}

		$stmt-> close();
		$stmt= null;

	}
	/*============================================
	Mostrar una sola actividad
	============================================*/

	static public function show($tabla, $id){

		//$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id=:id");
		$stmt = Conexion::conectar()->prepare("SELECT $tabla.ID_ACTIVIDAD, $tabla.ID_USUARIO, $tabla.ID_PERIODO, $tabla.NOMBRE, $tabla.OBJETIVO_GENERAL, $tabla.COMPETENCIA, $tabla.TEMARIO, $tabla.AUTORIZADA, $tabla.ID_ORGANIGRAMA, $tabla.NO_CREDITOS FROM $tabla WHERE $tabla.ID_ACTIVIDAD =:ID_ACTIVIDAD");
		

		$stmt -> bindParam(":ID_ACTIVIDAD", $id, PDO::PARAM_INT);

		$stmt -> execute();
		return $stmt -> fetchAll(PDO::FETCH_CLASS);
		$stmt -> close();
		$stmt = null;
	}

	/*============================================
	Actualizacion de una actividad
	============================================*/

	static public function update($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET ID_ACTIVIDAD=:ID_ACTIVIDAD,ID_USUARIO=:ID_USUARIO,ID_PERIODO=:ID_PERIODO,NOMBRE=:NOMBRE,OBJETIVO_GENERAL=:OBJETIVO_GENERAL,COMPETENCIA=:COMPETENCIA,TEMARIO=:TEMARIO,AUTORIZADA= AUTORIZADA,ID_ORGANIGRAMA=:ID_ORGANIGRAMA,NO_CREDITOS=:NO_CREDITOS WHERE ID_ACTIVIDAD= :ID_ACTIVIDAD");

		$stmt -> bindParam(":ID_USUARIO", $datos["ID_USUARIO"], PDO::PARAM_STR);
		$stmt -> bindParam(":ID_PERIODO", $datos["ID_PERIODO"], PDO::PARAM_STR);
		$stmt -> bindParam(":NOMBRE", $datos["NOMBRE"], PDO::PARAM_STR);
		$stmt -> bindParam(":OBJETIVO_GENERAL", $datos["OBJETIVO_GENERAL"], PDO::PARAM_STR);
		$stmt -> bindParam(":COMPETENCIA", $datos["COMPETENCIA"], PDO::PARAM_INT);
		$stmt -> bindParam(":TEMARIO", $datos["TEMARIO"], PDO::PARAM_INT);
		$stmt -> bindParam(":AUTORIZADA", $datos["AUTORIZADA"], PDO::PARAM_INT);
		$stmt -> bindParam(":ID_ORGANIGRAMA", $datos["ID_ORGANIGRAMA"], PDO::PARAM_STR);
		$stmt -> bindParam(":NO_CREDITOS", $datos[" NO_CREDITOS"], PDO::PARAM_STR);

		if ($stmt -> execute()) {
			
			return "ok";

		}else{

			print_r(Conexion::conectar()->errorInfo());

		}

		$stmt-> close();
		$stmt= null;

	}
	/*============================================
	Borrar actividad
	============================================*/

	static public function delete($tabla, $id){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE ID_ACTIVIDAD = :ID_ACTIVIDAD");

		$stmt -> bindParam(":ID_ACTIVIDAD", $id, PDO::PARAM_INT);

		if ($stmt -> execute()) {
			
			return "ok";

		}else{

			print_r(Conexion::conectar()->errorInfo());

		}

		$stmt-> close();
		$stmt= null;

	}
}