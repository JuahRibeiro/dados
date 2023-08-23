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

    if (empty($result)) {
        echo "<p style='text-align: center;'>Nenhum cliente encontrado.</p>";
    } else {
        echo "<table style='margin: auto; border-collapse: collapse; width: 80%; text-align: center;'>";
        echo "<tr><th>Código</th><th>Nome</th><th>Email</th><th>Data de Nascimento</th></tr>";
        foreach ($result as $row) {
            $data_nascimento = date('d-m-Y', strtotime($row->data_nascimento));
            echo "<tr>";
            echo "<td style='border: 1px solid black;'>" . $row->id . "</td>";
            echo "<td style='border: 1px solid black;'>" . $row->nome . "</td>";
            echo "<td style='border: 1px solid black;'>" . $row->email . "</td>";
            echo "<td style='border: 1px solid black;'>" . $data_nascimento . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    ?>
     <hr />
    <div style="text-align: center;">
        <form action="enviarParabens" style="display: inline;">
            <input type="submit" value="Enviar felicitações...">
        </form>
    </div>

    <?php 
        if (!empty($msg)) {
            echo "<p style='text-align: center;'> $msg </p>";
        }

        if (!empty($emailsParaParabens)) {
            echo "<p style='text-align: center;'> Foram enviados os parabéns para os seguintes emails: </p>";
            foreach ($emailsParaParabens as $email) {
                echo "<p style='text-align: center;'>" . $email . "</p>";
            }
        }
    ?>

</body>

</html>