<?php
include 'conexion.php'; 


//*:Metodo para realizar consultas
$PDO = new Conexion();

if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {

    //*:Metodo para extraer por ID los datos de la tabla  
    if ( isset( $_GET['id'] ) ) {
        $consulta = $PDO->prepare( "SELECT *FROM empleados WHERE id=:id" );
        $consulta->bindValue( ':id', $_GET['id'] );
        $consulta->execute();
        $consulta->setFetchMode( PDO::FETCH_ASSOC );
        header( "HTTP/1.1 200 Datos Obtenidos" );
        echo json_encode( $consulta->fetchAll() );
        exit();


      //*:Metodo para extraer todos los datos de la tabla  
    } /*else {
        $consulta = $PDO->prepare( "SELECT *FROM empleados" );
        $consulta->execute();
        $consulta->setFetchMode( PDO::FETCH_ASSOC );
        header( "HTTP/1.1 200 Datos Obtenidos" );
        echo json_encode( $consulta->fetchAll() );
        exit();

    }*/
}

//*:Metodo para insertar  datos en la tabla  
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $query = "INSERT INTO empleados(id,nombre, apellidos,telefono,domicilio,area)
        VALUES  (:id,:nombre, :apellidos, :telefono,:domicilio,:area)";

    $insertar = $PDO->prepare( $query );
    $insertar->bindValue( ':id', $_POST['id'] );
    $insertar->bindValue( ':nombre', $_POST['nombre'] );
    $insertar->bindValue( ':apellidos', $_POST['apellidos'] );
    $insertar->bindValue( ':telefono', $_POST['telefono'] );
    $insertar->bindValue( ':domicilio', $_POST['domicilio'] );
    $insertar->bindValue( ':area', $_POST['area'] );
    $insertar->execute();

    $idPost = $PDO->lastInsertId();
    if ( $idPost ) {
        header( "HTTP/1.1 200 Ok" );
        echo json_encode( $idPost );
        exit;
    }
}




//*:Metodo para actualizar  datos en la tabla
	if($_SERVER['REQUEST_METHOD'] == 'PUT')
	{		
		$query = "UPDATE empleados SET nombre=:nombre, apellidos=:apellidos, telefono=:telefono,
        domicilio=:domicilio,area=:area WHERE id=:id";


		$actualizar = $PDO->prepare($query);
		$actualizar->bindValue(':nombre', $_GET['nombre']);
        $actualizar->bindValue(':apellidos', $_GET['apellidos']);
		$actualizar->bindValue(':telefono', $_GET['telefono']);
        $actualizar->bindValue(':domicilio', $_GET['domicilio']);
        $actualizar->bindValue(':area', $_GET['area']);
		$actualizar->bindValue(':id', $_GET['id']);
		$actualizar->execute();
		header("HTTP/1.1 200 Ok");
		exit;
	}
	


if($_SERVER['REQUEST_METHOD'] == 'DELETE')
{
    $query = "DELETE FROM empleados WHERE id=:id";
    $eliminar = $PDO->prepare($query);
    $eliminar->bindValue(':id', $_GET['id']);
    $eliminar->execute();
    header("HTTP/1.1 200 Ok");
    exit;
}

//*si no se encuetra ninguna opción anterior
header("HTTP/1.1 400 Bad Request");
?>
