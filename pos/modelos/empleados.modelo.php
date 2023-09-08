<?php

require_once "conexion.php";

class ModeloEmpleados{

	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function mdlMostrarEmpleados($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	REGISTRO DE Empleado
	=============================================*/

	static public function mdlIngresarEmpleado($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre_empleado, pais, correo,
         fecha_ingreso, fecha_retiro, direccion, creador_empleado, fecha_creacion, user_ultima_modificacion,
          fecha_ultima_modificacion, estado_empleado_id_estado) 
          VALUES (:nombre, :pais, :correo, :fecha_ingreso,
            :fecha_retiro, :direccion, :creador_empleado, :fecha_creacion,
            :user_ultima_modificacion, :fecha_ultima_modificacion, :estado_empleado_id_estado)");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":pais", $datos["pais"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_ingreso", $datos["fecha_ingreso"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_retiro", $datos["fecha_retiro"], PDO::PARAM_STR);
        $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":creador_empleado", $datos["creador_empleado"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_creacion", $datos["fecha_creacion"], PDO::PARAM_STR);
        $stmt->bindParam(":user_ultima_modificacion", $datos["user_ultima_modificacion"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_ultima_modificacion", $datos["fecha_ultima_modificacion"], PDO::PARAM_STR);
        $stmt->bindParam(":estado_empleado_id_estado", $datos["estado_empleado_id_estado"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}

	/*=============================================
	EDITAR USUARIO
	=============================================*/

	static public function mdlEditarEmpleado($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre_empleado = :nombre, pais = :pais, correo = :correo, fecha_ingreso = :fecha_ingreso, fecha_retiro = :fecha_retiro, direccion = :direccion, creador_empleado = :creador_empleado, fecha_creacion = :fecha_creacion, user_ultima_modificacion = :user_ultima_modificacion, fecha_ultima_modificacion = :fecha_ultima_modificacion, estado_empleado_id_estado = :estado_empleado_id_estado WHERE codigo_empleado = :codigo_empleado");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":pais", $datos["pais"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_ingreso", $datos["fecha_ingreso"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_retiro", $datos["fecha_retiro"], PDO::PARAM_STR);
        $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":creador_empleado", $datos["creador_empleado"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_creacion", $datos["fecha_creacion"], PDO::PARAM_STR);
        $stmt->bindParam(":user_ultima_modificacion", $datos["user_ultima_modificacion"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_ultima_modificacion", $datos["fecha_ultima_modificacion"], PDO::PARAM_STR);
        $stmt->bindParam(":estado_empleado_id_estado", $datos["estado_empleado_id_estado"], PDO::PARAM_INT);
        $stmt->bindParam(":codigo_empleado", $datos["codigo_empleado"], PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	ACTUALIZAR USUARIO
	=============================================*/

	static public function mdlActualizarEmpleado($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	BORRAR USUARIO
	=============================================*/

	static public function mdlBorrarEmpleado($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE codigo_empleado = :codigo_empleado");

		$stmt -> bindParam(":codigo_empleado", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}

}