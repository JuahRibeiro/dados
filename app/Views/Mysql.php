<!DOCTYPE html>
<html>

<head>
    <title>Lista de Clientes</title>

</head>

<body>

    <h2 style="text-align: center;">Nossos Clientes</h2>

    <div style="text-align: center;">
        <form action="database" style="display: inline;">
            <input type="submit" value="Voltar ao Cadastro...">
        </form>
    </div>
    <hr />

    <?php
    // Aqui você precisará adicionar código para se conectar ao seu banco de dados e buscar os clientes

    // Exemplo de dados de clientes (substitua isso com a consulta real ao banco de dados)
    $clientes = array(
        array("codigo" => 1, "nome" => "Cliente 1", "email" => "cliente1@example.com", "data_nascimento" => "2000-01-01"),
        array("codigo" => 2, "nome" => "Cliente 2", "email" => "cliente2@example.com", "data_nascimento" => "1995-05-15"),
        array("codigo" => 3, "nome" => "Cliente 3", "email" => "cliente3@example.com", "data_nascimento" => "1988-10-20")
    );

    if (empty($clientes)) {
        echo "<p style='text-align: center;'>Nenhum cliente encontrado.</p>";
    } else {
        echo "<table style='margin: auto; border-collapse: collapse; width: 80%; text-align: center;'>";
        echo "<tr><th>Código</th><th>Nome</th><th>Email</th><th>Data de Nascimento</th></tr>";
        foreach ($clientes as $cliente) {
            echo "<tr>";
            echo "<td style='border: 1px solid black;'>" . $cliente['codigo'] . "</td>";
            echo "<td style='border: 1px solid black;'>" . $cliente['nome'] . "</td>";
            echo "<td style='border: 1px solid black;'>" . $cliente['email'] . "</td>";
            echo "<td style='border: 1px solid black;'>" . $cliente['data_nascimento'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    ?>
     <hr />
    <div style="text-align: center;">
        <form action="mysql" style="display: inline;">
            <input type="submit" value="Enviar felcitações...">
        </form>
    </div>

</body>

</html>