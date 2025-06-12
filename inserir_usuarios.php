<?php
header('Content-Type: application/json');

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $conn = new mysqli ("localhost","root","","panificadora");

    if($conn->connect_error) {
        die(json_encode(["erro" => "Erro ao conectar"]));
    }

    $nome = $conn -> real_escape_string($_POST['nome']);
    $matricula = (int) $_POST['matricula'];
    $funcao = $_POST['funcao'];
    
    $sql = "INSERT INTO usuarios (nome, matricula, funcao) VALUES('$nome', $matricula, $funcao)";
    if($conn -> query($sql)){
        echo json_encode(["sucesso" =>true,"mensagem" =>"Usuário inserido com sucesso!"]);
    } else {
        echo json_encode(["erro" => "Erro ao inserir usuário."]);
    }
    $conn->close();
} else {
    echo json_encode(["erro" => "Requisição inválida."]);
}
