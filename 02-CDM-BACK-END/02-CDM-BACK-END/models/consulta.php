<?php

class Consulta{

    public function insertar($identificacion, $nombres, $apellidos, $telefono, $correo, $clavemd, $rol){

        $objConexion = new Conexion();
        $conexion = $objConexion -> get_conexion();
        // validaremos si el usuario ya esta registrado a partir de un select y un if
        $consultar = "SELECT * FROM usuarios WHERE id = :identificacion || correo = :correo";
        $result = $conexion -> prepare($consultar);
        $result -> bindParam(':identificacion', $identificacion);
        $result -> bindParam(':correo',$correo);
        $result -> execute(); 

        // variable f solo existira si hay algun registro con la id o el correo registrado previamente.
        $f = $result->fetch();

        if($f){

            echo '<script>alert("La información del usuario que intenta registrar ya se encuentra almacenada")</script>")';
            echo '<script>location.href="../views/login.php"</script>")';

            // todo lo anterior es para validar si el usuario se encuentra registrado.

        } else{

            $objConsulta = new Conexion();
            $conexion = $objConexion -> get_conexion();
          
            $insert = "INSERT INTO usuarios(id, nombres, apellidos, telefono, correo, clave, rol)
            VALUES(:identificacion, :nombres, :apellidos, :telefono, :correo, :clave, :rol)";
            $result = $conexion->prepare($insert);
            $result -> bindParam(':identificacion', $identificacion);
            $result -> bindParam(':correo',$correo);
            $result -> bindParam(':nombres',$nombres);
            $result -> bindParam(':apellidos',$apellidos);
            $result -> bindParam(':telefono',$telefono);
            $result -> bindParam(':clave',$clavemd);
            $result -> bindParam(':rol',$rol);
            $result->execute();
        }
       
    }

    public function insertarInmueble($tipo, $categoria, $precio, $tamano, $ciudad, $barrio, $foto){

        $objConexion = new Conexion();
        $conexion = $objConexion -> get_conexion();
      
        $insert = "INSERT INTO inmuebles( tipo, categoria, precio, tamano, ciudad, barrio, foto)
        VALUES( :tipo, :categoria, :precio, :tamano, :ciudad, :barrio, :foto)";
        $result = $conexion->prepare($insert);
        $result -> bindParam(':tipo',$tipo);
        $result -> bindParam(':categoria',$categoria);
        $result -> bindParam(':precio',$precio);
        $result -> bindParam(':ciudad',$ciudad);
        $result -> bindParam(':tamano',$tamano);
        $result -> bindParam(':barrio',$barrio);
        $result -> bindParam(':foto',$foto);
        $result->execute();

    }


    public function consultarinmueble(){

        $f = null;
        $objConexion = new Conexion();
        $conexion = $objConexion -> get_conexion();

        $select = "SELECT * FROM inmuebles ORDER BY id DESC;";
        $result = $conexion -> prepare($select);
        $result -> execute();

        while ($statement = $result -> fetch()){

            $f[] = $statement;

        }
        
        return $f;

    }

       
    public function eliminarInmueble($id){

        $objConexion = new Conexion();
        $conexion = $objConexion -> get_conexion();

        $delete = "DELETE FROM inmuebles WHERE id=:id";
        $result = $conexion -> prepare($delete);
        $result->bindParam(':id', $id);
        $result->execute();
        echo '<script>alert("Inmueble eliminado con exito")</script>")';
        echo '<script>location.href="../views/inmoApartamentos.php"</script>")';

    }


    public function consultarInmuebleEdit($id){

        $f = null;
        $objConexion = new Conexion();
        $conexion = $objConexion -> get_conexion();

        $select = "SELECT * FROM inmuebles WHERE id=:id";
        $result = $conexion -> prepare($select);
        $result->bindParam(':id', $id);
        $result->execute();

        while ($statement = $result -> fetch()){

            $f[] = $statement;

        }
        
        return $f;
    }


    public function modificarInmueble($id, $tipo, $categoria, $precio, $tamano, $ciudad, $barrio){

        
        $objConexion = new Conexion();
        $conexion = $objConexion -> get_conexion();
      
        $update = "UPDATE inmuebles SET  tipo=:tipo, categoria=:categoria, precio=:precio, tamano=:tamano, ciudad=:ciudad, barrio=:barrio WHERE id=:id";
        $result = $conexion->prepare($update);
        $result -> bindParam(':tipo',$tipo);
        $result -> bindParam(':categoria',$categoria);
        $result -> bindParam(':precio',$precio);
        $result -> bindParam(':ciudad',$ciudad);
        $result -> bindParam(':tamano',$tamano);
        $result -> bindParam(':barrio',$barrio);
        $result -> bindParam(':id',$id);
        $result->execute();
        echo '<script>alert("Modificacion de inmueble exitosa")</script>';
        echo '<script>location.href="../views/inmoApartamentos.php"</script>';
    }



}





