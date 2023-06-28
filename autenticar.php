<?php
session_start();
include('conexao.php');

$email = isset($_POST['email']) ? $_POST['email'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';

$selectEmpresa = "SELECT email FROM cadastro_empresa WHERE email = ?";
$stmtEmpresa = mysqli_prepare($conexao, $selectEmpresa);
mysqli_stmt_bind_param($stmtEmpresa, "s", $email);
mysqli_stmt_execute($stmtEmpresa);
$resultEmpresa = mysqli_stmt_get_result($stmtEmpresa);

$selectUsuario = "SELECT email FROM cadastro_usuario WHERE email = ?";
$stmtUsuario = mysqli_prepare($conexao, $selectUsuario);
mysqli_stmt_bind_param($stmtUsuario, "s", $email);
mysqli_stmt_execute($stmtUsuario);
$resultUsuario = mysqli_stmt_get_result($stmtUsuario);

if ($rowEmpresa = mysqli_fetch_assoc($resultEmpresa)) {
    $selectLogin = "SELECT senha FROM login WHERE email = ?";
    $stmtLogin = mysqli_prepare($conexao, $selectLogin);
    mysqli_stmt_bind_param($stmtLogin, "s", $email);
    mysqli_stmt_execute($stmtLogin);
    $resultLogin = mysqli_stmt_get_result($stmtLogin);
    $rowLogin = mysqli_fetch_assoc($resultLogin);

    if ($senha == $rowLogin['senha']) {
        $_SESSION['email'] = $email;
        echo 'success_empresa';
    } else {
        echo 'error';
    }
} elseif ($rowUsuario = mysqli_fetch_assoc($resultUsuario)) {
    $selectLogin = "SELECT senha FROM login WHERE email = ?";
    $stmtLogin = mysqli_prepare($conexao, $selectLogin);
    mysqli_stmt_bind_param($stmtLogin, "s", $email);
    mysqli_stmt_execute($stmtLogin);
    $resultLogin = mysqli_stmt_get_result($stmtLogin);
    $rowLogin = mysqli_fetch_assoc($resultLogin);

    if ($senha == $rowLogin['senha']) {
        $_SESSION['email'] = $email;
        echo 'success_usuario';
    } else {
        echo 'error';
    }
} else {
    echo 'error';
}

mysqli_stmt_close($stmtEmpresa);
mysqli_stmt_close($stmtUsuario);
mysqli_stmt_close($stmtLogin);
mysqli_close($conexao);
?>