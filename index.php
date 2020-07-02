<?php
    include("menu.php");
?>
<h1 style="color:#0000ff;font-family:verdana;text-align:center;"><u>Este es el Inicio</u></h1>
<body style="background-color:#ccffe6;">
<link rel="stylesheet" type="text/css" href="bootstrap-411/css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

<?php
    $db = new mysqli('localhost','root','','proyectox');
    if($db->connect_errno)
    {
        die("Error al conectar : ".$db->connect_error);
    }

    $sql = "SELECT * FROM persona";
    $result = $db->query($sql);
    if(!$result){
        die("Error al consultar: ".$db->error);
    }
    //<a href="#" class="btn btn-success" style= " background: #726F72;"id="todo">HABITACIONES</a>
    
    if($result->num_rows==0){
        echo "No hay registros";
    }else{
        echo "<table border=1 style=background-color: #45585;>";
        echo "<tr>";
        echo "<th>ID</th><th >NOMBRES</th><th>APELLIDOS</th><th>EDAD</th><th>EMAIL</th><th>DIRECCION</th><th colspan='2'>OPCIONES</th>";
        echo "</tr>";
        while($reg = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td>".$reg['id']."</td>";
            echo "<td>".$reg['nombres']."</td>";
            echo "<td>".$reg['apellidos']."</td>";
            echo "<td>".$reg['edad']."</td>";
            echo "<td>".$reg['email']."</td>";
            echo "<td>".$reg['direccion']."</td>";
            echo "<td><a href='eliminar.php?id=".$reg['id']."'>Eliminar</a></td>";
            echo "<td><a href='editar.php?id=".$reg['id']."'>Editar</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }

?>