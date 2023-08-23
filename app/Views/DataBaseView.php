<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Clientes</title>
</head>
<body>

<h2 style="text-align: center;">Cadastro de Clientes</h2>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $_POST["codigo"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $dataNascimento = $_POST["data_nascimento"];
    
    // Aqui você pode adicionar código para inserir os dados no banco de dados
    
    echo "<p style='text-align: center;'>Cadastro realizado com sucesso!</p>";
}
?>

<div style="text-align: center;">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Nome: <input type="text" name="nome"><br><br>
        E-mail: <input type="text" name="email"><br><br>
        Data de Nascimento: <input type="date" name="data_nascimento"><br><br>
        <input type="submit" value="Cadastrar">
    </form>
    <hr />
    <form action="mysql" style="display: inline;">
        <input type="submit" value="Nossos Clientes">
    </form>
</div>

</body>
</html>
