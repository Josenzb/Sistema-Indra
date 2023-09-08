<?php

class ControladorEmpleados {

    static public function ctrMostrarEmpleados($item, $valor){

		$tabla = "empleado";

		$respuesta = ModeloEmpleados::MdlMostrarEmpleados($tabla, $item, $valor);

		return $respuesta;
	}
    
    static public function ctrCrearEmpleado() {
        if (isset($_POST["nuevoEmpleado"])) {
            // Validar los campos del formulario
            if (
                !empty($_POST["nombreEmpleado"]) &&
                !empty($_POST["pais"]) &&
                !empty($_POST["correo"]) &&
                !empty($_POST["fechaIngreso"]) &&
                !empty($_POST["direccion"]) &&
                !empty($_POST["creadorEmpleado"]) &&
                !empty($_POST["fechaCreacion"]) &&
                !empty($_POST["userUltimaModificacion"]) &&
                !empty($_POST["fechaUltimaModificacion"])
            ) {
                // Obtener los valores de los campos del formulario
                $nombre = $_POST["nombreEmpleado"];
                $pais = $_POST["pais"];
                $correo = $_POST["correo"];
                $fechaIngreso = $_POST["fechaIngreso"];
                $direccion = $_POST["direccion"];
                $creador = $_POST["creadorEmpleado"];
                $fechaCreacion = $_POST["fechaCreacion"];
                $userUltimaModificacion = $_POST["userUltimaModificacion"];
                $fechaUltimaModificacion = $_POST["fechaUltimaModificacion"];
                $estadoEmpleadoId = $_POST["estadoEmpleadoId"];

                // Llamar al modelo para crear un nuevo empleado
                $tabla = "empleado";
                $datos = array(
                    "nombre_empleado" => $nombre,
                    "pais" => $pais,
                    "correo" => $correo,
                    "fecha_ingreso" => $fechaIngreso,
                    "direccion" => $direccion,
                    "creador_empleado" => $creador,
                    "fecha_creacion" => $fechaCreacion,
                    "user_ultima_modificacion" => $userUltimaModificacion,
                    "fecha_ultima_modificacion" => $fechaUltimaModificacion,
                    "estado_empleado_id_estado" => $estadoEmpleadoId
                );

                $respuesta = ModeloEmpleados::mdlCrearEmpleado($tabla, $datos);

                if ($respuesta == "ok") {
                    // Mostrar mensaje de éxito
                    echo '<script>
                        alert("El empleado ha sido creado correctamente.");
                        window.location = "empleados";
                    </script>';
                } else {
                    // Mostrar mensaje de error
                    echo '<script>
                        alert("Error al crear el empleado.");
                    </script>';
                }
            } else {
                // Mostrar mensaje de error si algún campo está vacío
                echo '<script>
                    alert("Todos los campos son requeridos.");
                </script>';
            }
        }
    }

    static public function ctrEditarEmpleado() {
        if (isset($_POST["editarEmpleado"])) {
            // Validar los campos del formulario
            if (!empty($_POST["nombreEmpleado"])) {
                // Obtener los valores de los campos del formulario
                $codigoEmpleado = $_POST["codigoEmpleado"];
                $nombre = $_POST["nombreEmpleado"];
                $pais = $_POST["pais"];
                $correo = $_POST["correo"];
                $fechaIngreso = $_POST["fechaIngreso"];
                $direccion = $_POST["direccion"];
                $creador = $_POST["creadorEmpleado"];
                $fechaCreacion = $_POST["fechaCreacion"];
                $userUltimaModificacion = $_POST["userUltimaModificacion"];
                $fechaUltimaModificacion = $_POST["fechaUltimaModificacion"];
                $estadoEmpleadoId = $_POST["estadoEmpleadoId"];

                // Llamar al modelo para actualizar el empleado
                $tabla = "empleado";
                $datos = array(
                    "codigo_empleado" => $codigoEmpleado,
                    "nombre_empleado" => $nombre,
                    "pais" => $pais,
                    "correo" => $correo,
                    "fecha_ingreso" => $fechaIngreso,
                    "direccion" => $direccion,
                    "creador_empleado" => $creador,
                    "fecha_creacion" => $fechaCreacion,
                    "user_ultima_modificacion" => $userUltimaModificacion,
                    "fecha_ultima_modificacion" => $fechaUltimaModificacion,
                    "estado_empleado_id_estado" => $estadoEmpleadoId
                );

                $respuesta = ModeloEmpleados::mdlEditarEmpleado($tabla, $datos);

                if ($respuesta == "ok") {
                    // Mostrar mensaje de éxito
                    echo '<script>
                        alert("El empleado ha sido editado correctamente.");
                        window.location = "empleados";
                    </script>';
                } else {
                    // Mostrar mensaje de error
                    echo '<script>
                        alert("Error al editar el empleado.");
                    </script>';
                }
            } else {
                // Mostrar mensaje de error si el nombre está vacío
                echo '<script>
                    alert("El nombre es requerido.");
                </script>';
            }
        }
    }
}
