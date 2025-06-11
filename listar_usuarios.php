<?php
header('Content-Type: application/json');

//Conectar o banco 
$conn = new mysqli ("localhost","root","","panificadora");

if($conn->connect_error) {
    die(json_encode(["erro" => "Erro ao conectar"]));
}

//Cosulta SQL
$sql = "SELECT id, nome, matricula, funcao FROM usuarios";
$resultado = $conn -> query($sql);

$usuarios = [];

while($linha = $resultado -> fetch_assoc()){
    $usuarios[] = $linha;
}

echo json_encode($usuarios);
?>