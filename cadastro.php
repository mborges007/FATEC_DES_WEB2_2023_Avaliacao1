<?php
session_start(); 


if(!isset($_SESSION["logado"]) || $_SESSION["logado"] !== true){
    header("location: login.php");
    exit;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
   
    if($_POST['username'] === 'portaria' and $_POST['password'] === 'Fatecararas'){
        $_SESSION['logado'] = TRUE;
        $_SESSION["username"] = 'portaria';
         header("location: login.php");
    } else {
        $_SESSION['logado'] = FALSE;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $ra = $_POST['ra'];
    $placa = $_POST['placacarro'];

if (!empty($nome) && !empty($ra) && !empty($placa)) {
    $cadastros = $nome . '|' . $ra . '|' . $placa . "\n";
    file_put_contents('consulta_alunos.txt', $cadastros, FILE_APPEND);
    }
}

?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <title>cadastro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Cadastro</h2>
        <p>Informe seus dados por gentileza.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Nome</label>
                <input type="text" name="nome" class="form-control" placeholder="Digite seu nome">
                <span class="help-block"></span>
            </div>    
            <div class="form-group">
                <label>RA</label>
                <input type="text" name="ra" class="form-control" placeholder="SEU RA">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label>Placa do carro </label>
                <input type="text" name="placacarro" class="form-control" placeholder="placa">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <a href="consulta.php">Consulta</a>
            </div>
           
        </form>
    </div>    
</body>
</html>