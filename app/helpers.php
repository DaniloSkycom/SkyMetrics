<?php 

function conexion_nexus(){
    $server = "192.168.150.250\SQLEXPRESS";
    $options = array(
        "Database" => "NexusSkyComV19",
        "Uid" => "sa",
        "PWD" => "Skycom2019$"
    );
    $conn = sqlsrv_connect($server, $options);
    return $conn;
}

function getEmpleados(){
    try {
        $conn = conexion_nexus();
        if($conn) {
            $sql = "SELECT * FROM dbo.pla_v_SkyEmpleados WHERE Estado = 1 AND Empresa = 'SV'";
            $result = array();
            $cuentas = sqlsrv_query( $conn, $sql );
            if( $cuentas === false) {
                return sqlsrv_errors();
            }

            $i = 0;
            while( $row = sqlsrv_fetch_array( $cuentas, SQLSRV_FETCH_ASSOC) ) {
                $result[$i]["id_empleado"] = $row['IdEmpleado'];
                $result[$i]["codigo"] = $row['Codigo'];
                $result[$i]["nombre"] = $row['Nombre'];
                $i++;
            }

            sqlsrv_free_stmt($cuentas);
            return $result;
        }else{
            return "Conexión no se pudo establecer.<br />".sqlsrv_errors();
        }        
    } catch (\Throwable $th) {
        return 'Algo salio mal.';
    }
}

function getNameRol($rol_id){
    $rol = App\Roles::find($rol_id);
    return $rol['nombre'];
}