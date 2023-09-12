<?php
include('../conexion/conexion.php');

$numeroCliente = $_POST['num_cliente'];
$nombre = $_POST['nombre'];
$apellidoPaterno = $_POST['apellido_paterno'];
$apellidoMaterno = $_POST['apellido_materno'];

// Construct the SQL query based on the search criteria
$query = "SELECT * FROM cliente WHERE numero_cliente LIKE '%$numeroCliente%' AND nombre_cliente LIKE '%$nombre%' 
AND apellido_p_cliente LIKE '%$apellidoPaterno%' AND apellido_m_cliente LIKE '%$apellidoMaterno%' LIMIT 1";

// Execute the query
$result = mysqli_query($conexion, $query);

// Generate HTML for the search results
$searchResultsHtml = '';
while ($row = mysqli_fetch_assoc($result)) {
    $cli = $row['numero_cliente'];
    $nacimiento = date('Y-m-d', strtotime( $row['fecha_nacimiento']));
    $enviar_clientes = $row['numero_cliente'];

    $searchResultsHtml .= "
        <div class='card-header py-sm-2'>
                <h4 class='m-0 font-weight-bold text-primary text-left'>Datos del Cliente ({$row['numero_cliente']}).</h4>
        </div>
        <div class='panel-body text-right'>
        <br>
        <button type='button' class='btn btn-primary' id='modal' data-toggle='modal' data-target='#miModal'>
            Cambiar Equipo del cliente
        </button>
            </div>
        <div class='card-body'>
            <div class='row mx-md-n4'>
                <div class='card-body'>
                    <div class='card shadow mb-4'>
                        <div class='card-header py-sm-2'>
                            <h4 class='m-0 font-weight-bold text-primary'>Datos del Contrato</h4>
                        </div>
                        <div class='form-row py-3'>
                            <div class='container text-center'>
                                <div class='form-row align-items-center'>
                                    <!-- Ingresar Nombre -->
                                    <div class='col-md-6 mb-3'>
                                        <div class='form-inline'>
                                            <label class='col-sm-4 col-form-label'>Nombre(s)</label>
                                            <div class='col-sm-8'>
                                                <input type='text' class='form-control col-sm-12' id='nombre' name='nombre' value='{$row['nombre_cliente']}' readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Ingresar Apellido Paterno -->
                                    <div class='col-md-6 mb-3'>
                                        <div class='form-inline'>
                                            <label class='col-sm-4 col-form-label'>Apellido Paterno</label>
                                            <div class='col-sm-8'>
                                                <input type='text' class='form-control col-sm-12' id='paterno' name='paterno' value='{$row['apellido_p_cliente']}' readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Ingresar Apellido Materno -->
                                    <div class='col-md-6 mb-3'>
                                        <div class='form-inline'>
                                            <label class='col-sm-4 col-form-label'>Apellido Materno</label>
                                            <div class='col-sm-8'>
                                                <input type='text' class='form-control col-sm-12' id='materno' name='materno' value='{$row['apellido_m_cliente']}' readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Ingresar Fecha de Nacimiento -->
                                        <div class='col-md-6 mb-3'>
                                            <div class='form-inline'>
                                                <label class='col-sm-4 col-form-label'>Fecha de Nacimiento</label>
                                                <div class='col-sm-8'>
                                                    <input type='date' class='form-control col-sm-12' id='nacimiento' name='nacimiento' value='{$nacimiento}' readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Ingresar Codigo Postal -->
                                        <div class='col-md-6 mb-3'>
                                            <div class='form-inline'>
                                                <label class='col-sm-4 col-form-label'>Codigo Postal</label>
                                                <div class='col-sm-8'>
                                                    <input type='text' class='form-control col-sm-12' id='postal' name='postal' value='{$row['codigo_postal']}' readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Ingresar Estado -->
                                        <div class='col-md-6 mb-3'>
                                            <div class='form-inline'>
                                                <label class='col-sm-4 col-form-label'>Estado</label>
                                                <div class='col-sm-8'>
                                                    <input type='text' class='form-control col-sm-12' id='estado' name='estado' value='{$row['estado']}' readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Ingresar Municipio -->
                                        <div class='col-md-6 mb-3'>
                                            <div class='form-inline'>
                                                <label class='col-sm-4 col-form-label'>Municipio</label>
                                                <div class='col-sm-8'>
                                                    <input type='text' class='form-control col-sm-12' id='municipio' name='municipio' value='{$row['municipio']}' readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Ingresar Colonia -->
                                        <div class='col-md-6 mb-3'>
                                            <div class='form-inline'>
                                                <label class='col-sm-4 col-form-label'>Colonia</label>
                                                <div class='col-sm-8'>
                                                    <input type='text' class='form-control col-sm-12' id='colonia' name='colonia' value='{$row['colonia_cliente']}' readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Ingresar Calle -->
                                        <div class='col-md-6 mb-3'>
                                            <div class='form-inline'>
                                                <label class='col-sm-4 col-form-label'>Calle</label>
                                                <div class='col-sm-8'>
                                                    <input type='text' class='form-control col-sm-12' id='calle' name='calle' value='{$row['calle_cliente']}' readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Ingresar Numero Exterior -->
                                        <div class='col-md-6 mb-3'>
                                            <div class='form-inline'>
                                                <label class='col-sm-4 col-form-label'>Numero Exterior</label>
                                                <div class='col-sm-8'>
                                                    <input type='text' class='form-control col-sm-12' id='n_ext' name='n_ext' value='{$row['numero_ext']}' readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Ingresar Numero Interior -->
                                        <div class='col-md-6 mb-3'>
                                            <div class='form-inline'>
                                                <label class='col-sm-4 col-form-label'>Numero Interior</label>
                                                <div class='col-sm-8'>
                                                    <input type='text' class='form-control col-sm-12' id='n_int' name='n_int' value='{$row['numero_int']}' readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Ingresar Entre Calle 1 -->
                                        <div class='col-md-6 mb-3'>
                                            <div class='form-inline'>
                                                <label class='col-sm-4 col-form-label'>Entre Calle 1</label>
                                                <div class='col-sm-8'>
                                                    <input type='text' class='form-control col-sm-12' id='calle1' name='calle1' value='{$row['entre_calle1']}' readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Ingresar Entre Calle 2 -->
                                        <div class='col-md-6 mb-3'>
                                            <div class='form-inline'>
                                                <label class='col-sm-4 col-form-label'>Entre Calle 2</label>
                                                <div class='col-sm-8'>
                                                    <input type='text' class='form-control col-sm-12' id='calle2' name='calle2' value='{$row['entre_calle2']}' readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Ingresar Referencia Domiciliaria -->
                                        <div class='col-md-6 mb-3'>
                                            <div class='form-inline'>
                                                <label class='col-sm-4 col-form-label'>Referencia Domiciliaria</label>
                                                <div class='col-sm-8'>
                                                    <textarea type='text' class='form-control col-sm-12' id='ref' name='ref' readonly>{$row['ref_dom']}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Ingresar Telefono 1 -->
                                        <div class='col-md-6 mb-3'>
                                            <div class='form-inline'>
                                                <label class='col-sm-4 col-form-label'>Telefono 1</label>
                                                <div class='col-sm-8'>
                                                    <input type='text' class='form-control col-sm-12' id='tel1' name='tel1' maxlength='10' value='{$row['tel1_cliente']}' readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Ingresar Telefono 2 -->
                                        <div class='col-md-6 mb-3'>
                                            <div class='form-inline'>
                                                <label class='col-sm-4 col-form-label'>Telefono 2</label>
                                                <div class='col-sm-8'>
                                                    <input type='text' class='form-control col-sm-12' id='tel2' name='tel2' maxlength='10' value='{$row['tel2_cliente']}' readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Ingresar Telefono 3 -->
                                        <div class='col-md-6 mb-3'>
                                            <div class='form-inline'>
                                                <label class='col-sm-4 col-form-label'>Telefono 3</label>
                                                <div class='col-sm-8'>
                                                    <input type='text' class='form-control col-sm-12' id='tel3' name='tel3' maxlength='10' value='{$row['tel3_cliente']}' readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Ingresar Email -->
                                        <div class='col-md-6 mb-3'>
                                            <div class='form-inline'>
                                                <label class='col-sm-4 col-form-label'>Email</label>
                                                <div class='col-sm-8'>
                                                <input type='email' class='form-control col-sm-12' id='email' name='email' value='{$row['email_cliente']}' readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    ";
    
    $onu = $row['onu_cliente'];
    $ont = $row['ont_cliente'];
    $radio = $row['radio_cliente'];

    if(!$onu && !$ont ){

        $searchResultsHtml .= "
        <div class='card shadow mb-4'>
        <div class='card-header py-sm-2'>
                    <h4 class='m-0 font-weight-bold text-primary'>Datos del Equipo</h4>
                </div>
                <br>
        <div class='form-row' id='antena_div'>
                    <div class='container text-center'>
                        <div class='form-row align-items-center'>
                            <!-- Seleccionar Equipo -->
                            <div class='col-md-6 mb-3'>
                                <div class='form-inline'>
                                    <label class='col-sm-4 col-form-label'>Seleccionar Equipo</label>
                                    <div class='col-sm-8'>
                                        <input type='text' class='form-control col-sm-12' id='ip' name='ip'
                                        value='{$row['radio_cliente']}' readonly>
                                    </div>
                                </div>
                            </div>
                            <!-- IP -->
                            <div class='col-md-6 mb-3'>
                                <div class='form-inline'>
                                    <label class='col-sm-2 col-form-label'>IP</label>
                                    <div class='col-sm-10'>
                                        <input type='text' class='form-control col-sm-12' id='ip' name='ip'
                                        value='{$row['ip_cliente']}' readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        ";

    }else if(!$radio && !$ont){

        $searchResultsHtml .= "
        <div class='card shadow mb-4'>
        <div class='card-header py-sm-2'>
                    <h4 class='m-0 font-weight-bold text-primary'>Datos del Equipo</h4>
                </div>
                <br>
        <div class='form-row' id='onu_div'>
                    <div class='container text-center'>
                        <div class='form-row align-items-center'>
                            <!-- Selecciona Zona -->
                            <div class='col-md-6 mb-3'>
                                <div class='form-inline'>
                                    <label class='col-sm-4 col-form-label'>Seleccionar Zona</label>
                                    </div>
                                </div>
                            </div>
                            <!-- Seleccionar Bote -->
                            <div class='col-md-6 mb-3'>
                                <div class='form-inline'>
                                    <label class='col-sm-4 col-form-label'>Seleccionar Bote</label>
                                    <div class='col-sm-8'>
                                        <select class='form-control col-sm-12' name='bote_onu' id='bote_onu'
                                            style='border-radius: 5px;'>
                                            <option value='{$row['bote_cliente']}'  readonly>{$row['bote_cliente']}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Seleccionar Puerto -->
                            <div class='col-md-6 mb-3'>
                                <div class='form-inline'>
                                    <label class='col-sm-4 col-form-label'>Seleccionar Puerto</label>
                                    <div class='col-sm-8'>
                                        <input type='text' class='form-control col-sm-12' id='puerto_onu'
                                            name='puerto_onu' value='{$row['puerto_cliente']}' maxlength='2' readonly>
                                    </div>
                                </div>
                            </div>
                            <!-- Seleccionar Onu -->
                            <div class='col-md-6 mb-3'>
                                <div class='form-inline'>
                                    <label class='col-sm-4 col-form-label'>Seleccionar ONU</label>
                                    <div class='col-sm-8'>
                                        <select class='form-control col-sm-12' name='onu' id='onu'
                                            style='border-radius: 5px;'>
                                            <option {$row['onu_cliente']} readonly>{$row['onu_cliente']}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Ingresar Router -->
                            <div class='col-md-6 mb-3'>
                                <div class='form-inline'>
                                    <label class='col-sm-4 col-form-label'>Router</label>
                                    <div class='col-sm-8'>
                                        <input type='text' class='form-control col-sm-12' id='router' name='router'
                                        value='{$row['router_cliente']}' maxlength='12' readonly>
                                    </div>
                                </div>
                            </div>
                            <!-- Seleccionar Bandera -->
                            <div class='col-md-6 mb-3'>
                                <div class='form-inline'>
                                    <label class='col-sm-4 col-form-label'>Seleccionar Bandera</label>
                                    <div class='col-sm-8'>
                                        <select class='form-control col-sm-12' name='bandera_onu' id='bandera_onu'
                                            style='border-radius: 5px;'>
                                            <option value='{$row['bandera_cliente']}' readonly>{$row['bandera_cliente']}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        ";

    }else if(!$radio && !$onu){

        $searchResultsHtml .= "
        <div class='card shadow mb-4'>
        <div class='card-header py-sm-2'>
                    <h4 class='m-0 font-weight-bold text-primary'>Datos del Equipo</h4>
                </div>
                <br>
        <div class='form-row' id='ont_div'>
                    <div class='container text-center'>
                        <div class='form-row align-items-center'>
                            <!-- Selecciona Zona -->
                            <div class='col-md-6 mb-3'>
                            </div>
                            <!-- Seleccionar Bote -->
                            <div class='col-md-6 mb-3'>
                                <div class='form-inline'>
                                    <label class='col-sm-4 col-form-label'>Seleccionar Bote</label>
                                    <div class='col-sm-8'>
                                        <select class='form-control col-sm-12' name='bote_ont' id='bote_ont'
                                            style='border-radius: 5px;'>
                                            <option value='{$row['bote_cliente']}' readonly>{$row['bote_cliente']}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Seleccionar Puerto -->
                            <div class='col-md-6 mb-3'>
                                <div class='form-inline'>
                                    <label class='col-sm-4 col-form-label'>Seleccionar Puerto</label>
                                    <div class='col-sm-8'>
                                        <input type='text' class='form-control col-sm-12' id='puerto_ont'
                                            name='puerto_ont' value='{$row['puerto_cliente']}' maxlength='2' readonly>
                                    </div>
                                </div>
                            </div>
                            <!-- Seleccionar Ont -->
                            <div class='col-md-6 mb-3'>
                                <div class='form-inline'>
                                    <label class='col-sm-4 col-form-label'>Seleccionar ONT</label>
                                    <div class='col-sm-8'>
                                        <select class='form-control col-sm-12' name='ont' id='ont'
                                            style='border-radius: 5px;'>
                                            <option value='{$row['ont_cliente']}' readonly>{$row['ont_cliente']}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Seleccionar Bandera -->
                            <div class='col-md-6 mb-3'>
                                <div class='form-inline'>
                                    <label class='col-sm-4 col-form-label'>Seleccionar Bandera</label>
                                    <div class='col-sm-8'>
                                        <select class='form-control col-sm-12' name='bandera_ont' id='bandera_ont'
                                            style='border-radius: 5px;'>
                                            <option value='{$row['bandera_cliente']}' readonly >{$row['bandera_cliente']}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        ";
    }
}

$data = [
    'searchResultsHtml' => $searchResultsHtml,
    'num_cliente' => $cli
];

echo json_encode($data);
?>