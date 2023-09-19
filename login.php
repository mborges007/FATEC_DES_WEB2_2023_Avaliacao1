<?php
session_start(); 
if($_SERVER["REQUEST_METHOD"] == "POST"){
   
    if($_POST['username'] == 'portaria' and $_POST['password'] == 'Fatecararas'){
        $_SESSION['logado'] = TRUE;
        $_SESSION["username"] = 'portaria';
         header("location: consulta.php");
    } else {
        $_SESSION['logado'] = FALSE;
    }
}

?>
<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <title>Acessar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; 
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Acessar</h2>
        <p>infome seu login e senha.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>usuario</label>
                <input type="text" name="username" class="form-control" placeholder="USUARIO">
                <span class="help-block"></span>
            </div>    
            <div class="form-group">
                <label>Senha</label>
                <input type="password" name="password" class="form-control" placeholder="SENHA">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Acessar">
            </div>
        </form>
    </div>    
</body>
</html>