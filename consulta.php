<?php
session_start(); 

if(!isset($_SESSION["logado"]) || $_SESSION["logado"] !== true){
    header("location: login.php");
    exit;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
   
    if($_POST['username'] == 'portaria' and $_POST['password'] == 'Fatecararas'){
        $_SESSION['logado'] = TRUE;
        $_SESSION["username"] = 'portaria';
         header("location: login.php");
    } else {
        $_SESSION['logado'] = FALSE;
    }
}

function registros_consulta() {
    $cadastros = [];
    $arquivo = fopen('consulta_alunos.txt', 'r');
    
    if ($arquivo) {
        while (($linha = fgets($arquivo)) !== false) {
            $dados = explode('|', $linha);
            if (count($dados) === 3) {
                $cadastros[] = ['Nome' => trim($dados[0]), 'RA' => trim($dados[1]), 'Placa' => trim($dados[2])];
            }
        }
        fclose($arquivo);
    }
    return $cadastros;
}

$cadastros = registros_consulta();
?>

<!DOCTYPE html>
<html>
<head>
<body>
    <h2>Consulta dos Alunos</h2>
    <table>
        <tr>
            <th>Nome</th>
            <th>R.A.</th>
            <th>Placa</th>
        </tr>
        <?php foreach ($cadastros as $cadastros): ?>
            <tr>
                <td><?php echo $cadastros['Nome'] ; ?> | </td>
                <td><?php echo $cadastros['RA']; ?> | </td>
                <td><?php echo $cadastros['Placa']; ?> </td>
            </tr>
        <?php endforeach; ?>
    </table>
    
    <br>
    <a href="cadastro.php">cadastro</a>
    <br>
    <a href="logout.php">Sair</a>
</body>
</html>