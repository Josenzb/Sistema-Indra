<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Administrar empleados

        </h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Administrar empleados</li>

        </ol>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header with-border">

                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarEmpleado">

                    Agregar empleado

                </button>

            </div>

            <div class="box-body">

                <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

                    <thead>

                        <tr>

                            <th style="width:10px">#</th>
                            <th>Nombre</th>
                            <th>País</th>
                            <th>Correo</th>
                            <th>Fecha de Ingreso</th>
                            <th>Fecha de Retiro</th>
                            <th>Dirección</th>
                            <th>Estado</th>
                            <th>Acciones</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php

                        $item = null;
                        $valor = null;

                        $empleados = ControladorEmpleados::ctrMostrarEmpleados($item, $valor);

                        $contador = 1;

                        foreach ($empleados as $key => $value) {

                            echo ' <tr>
                                <td>' . $contador . '</td>
                                <td>' . $value["nombre_empleado"] . '</td>
                                <td>' . $value["pais"] . '</td>
                                <td>' . $value["correo"] . '</td>
                                <td>' . $value["fecha_ingreso"] . '</td>
                                <td>' . $value["fecha_retiro"] . '</td>
                                <td>' . $value["direccion"] . '</td>';

                            if ($value["estado_empleado_id_estado"] != 0) {

                                echo '<td><button class="btn btn-success btn-xs btnActivar" idEmpleado="' . $value["codigo_empleado"] . '" estadoEmpleado="0">Activo</button></td>';

                            } else {

                                echo '<td><button class="btn btn-danger btn-xs btnActivar" idEmpleado="' . $value["codigo_empleado"] . '" estadoEmpleado="1">Inactivo</button></td>';

                            }

                            echo '<td>

                            <div class="btn-group">

                                <button class="btn btn-warning btnEditarEmpleado" idEmpleado="' . $value["codigo_empleado"] . '" data-toggle="modal" data-target="#modalEditarEmpleado"><i class="fa fa-pencil"></i></button>

                                <button class="btn btn-danger btnEliminarEmpleado" idEmpleado="' . $value["codigo_empleado"] . '"><i class="fa fa-times"></i></button>

                            </div>  

                        </td>

                    </tr>';

                            $contador++;
                        }

                        ?>


                    </tbody>

                </table>

            </div>

        </div>

    </section>

</div>

<!-- =====================================
MODAL AGREGAR EMPLEADO
======================================= -->

<div id="modalAgregarEmpleado" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <!-- =====================================
                CABEZA DEL MODAL
                ======================================== -->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Agregar empleado</h4>

                </div>

                <!-- =====================================
                CUERPO DEL MODAL
                ======================================== -->

                <div class="modal-body">

                    <div class="box-body">

                        <!-- ENTRADA PARA EL NOMBRE -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL PAÍS -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-flag"></i></span>

                                <input type="text" class="form-control input-lg" name="nuevoPais" placeholder="Ingresar país" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL CORREO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                                <input type="email" class="form-control input-lg" name="nuevoCorreo" placeholder="Ingresar correo" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA LA FECHA DE INGRESO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                                <input type="date" class="form-control input-lg" name="nuevaFechaIngreso" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA LA FECHA DE RETIRO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                                <input type="date" class="form-control input-lg" name="nuevaFechaRetiro">

                            </div>

                        </div>

                        <!-- ENTRADA PARA LA DIRECCIÓN -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                                <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar dirección" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR EL ESTADO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-check"></i></span>

                                <select class="form-control input-lg" name="nuevoEstado">

                                    <option value="1">Activo</option>

                                    <option value="0">Inactivo</option>

                                </select>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- =====================================
                PIE DEL MODAL
                ======================================== -->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Guardar empleado</button>

                </div>

                <?php

                $crearEmpleado = new ControladorEmpleados();
                $crearEmpleado->ctrCrearEmpleado();

                ?>

            </form>

        </div>

    </div>

</div>

<!-- =====================================
MODAL EDITAR EMPLEADO
======================================= -->

<div id="modalEditarEmpleado" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <!-- =====================================
                CABEZA DEL MODAL
                ======================================== -->

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">Editar empleado</h4>

                </div>

                <!-- =====================================
                CUERPO DEL MODAL
                ======================================== -->

                <div class="modal-body">

                    <div class="box-body">

                        <!-- ENTRADA PARA EL NOMBRE -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" required>

                                <input type="hidden" id="editarCodigoEmpleado" name="editarCodigoEmpleado">

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL PAÍS -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-flag"></i></span>

                                <input type="text" class="form-control input-lg" id="editarPais" name="editarPais" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL CORREO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                                <input type="email" class="form-control input-lg" id="editarCorreo" name="editarCorreo" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA LA FECHA DE INGRESO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                                <input type="date" class="form-control input-lg" id="editarFechaIngreso" name="editarFechaIngreso" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA LA FECHA DE RETIRO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                                <input type="date" class="form-control input-lg" id="editarFechaRetiro" name="editarFechaRetiro">

                            </div>

                        </div>

                        <!-- ENTRADA PARA LA DIRECCIÓN -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                                <input type="text" class="form-control input-lg" id="editarDireccion" name="editarDireccion" required>

                            </div>

                        </div>

                        <!-- ENTRADA PARA SELECCIONAR EL ESTADO -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-check"></i></span>

                                <select class="form-control input-lg" id="editarEstado" name="editarEstado">

                                    <option value="1">Activo</option>

                                    <option value="0">Inactivo</option>

                                </select>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- =====================================
                PIE DEL MODAL
                ======================================== -->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Modificar empleado</button>

                </div>

                <?php

                $editarEmpleado = new ControladorEmpleados();
                $editarEmpleado->ctrEditarEmpleado();

                ?>

            </form>

        </div>

    </div>

</div>

<?php

$borrarEmpleado = new ControladorEmpleados();
$borrarEmpleado->ctrBorrarEmpleado();

?>
