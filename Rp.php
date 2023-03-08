<?php
error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");

$Correo = isset($_POST['Correo']) ? $_POST['Correo'] : '';
$Nombre = isset($_POST['Nombre']) ? $_POST['Nombre'] : '';
$Paterno = isset($_POST['Paterno']) ? $_POST['Paterno'] : '';
$Materno = isset($_POST['Materno']) ? $_POST['Materno'] : '';
$Password = isset($_POST['Password']) ? $_POST['Password'] : '';



$con = new SQLite3("Logg.db");
 
$cs = $con -> query("SELECT * FROM reg WHERE correo='$Correo'");
while ($res=$cs -> fetchArray());
{
    $correoDos = $res['correo'];

}

if($correoDos ==$Correo){
    echo'
    <script>
     alert("Este correo ya se encuentra registrado intenta con otro diferente");
     </script>
    ';
}
else{
    $correoDos = $con -> query ("INSERT INTO reg (Correo,Nombre,Paterno,Materno,Password) VALUES ('$Correo','$Nombre','$Paterno','$Materno','$Password')");
echo'<script> alert("Registrado")
</script>
<script> window.location=("login.html")
</script>
';
}

    // echo $Correo;
// echo"<br>";
// echo $Nombre;
// echo "<br>";
// echo $Paterno;
// echo "<br>";
// echo $Materno;
// echo "<br>";
// echo $Password;



// regreso


// echo '

// <script>

// window.location="login.html"

// </script>
// ';




//     echo '
// <html> 
// <meta http-equiv="REFRESH" content="0,url=login.html">
// </html>
// ';    
    



?>
