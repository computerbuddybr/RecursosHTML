<?php
function sanitize($string)
{


    $sanitized_escaped_string_1 = filter_var($string, FILTER_SANITIZE_STRING);
    $sanitized_escaped_string_2 = filter_var($sanitized_escaped_string_1, FILTER_SANITIZE_STRING);
    $sanitized_escaped_string_3 = filter_var($sanitized_escaped_string_2, FILTER_SANITIZE_STRING);
    $sanitized_escaped_string_final = filter_var($sanitized_escaped_string_3, FILTER_SANITIZE_STRING);
    return $sanitized_escaped_string_final;
}

function displayInfoArray($form_info)
{
    $final_array = [];
    // unset($form_info['submit']);
    foreach ($form_info as $key => $value) {
        $sanitized_key = sanitize($key);
        $sanitized_value = sanitize($value);
        $final_array[$sanitized_key] = $sanitized_value;

    }

    foreach ($final_array as $key => $value) {
        echo "<tr><td>" . $key . "</td><td>" . $value . "</td></tr>";
    }
    echo '</tbody>';
}


?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Aula 39 - Formulários</title>
    <meta name="description"
          content="Aqui vai a descrição do seu site ou página para o Google poder ver e colocar no sumário no resultado das buscas.">
    <meta name="keywords" content="Aqui vão as palavras chaves separadas por vírgula">
    <meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0">
    <style type="text/css">
        section {
            border: 2px solid #6e09e2;
            padding: 5px;
            margin: 5px;
        }

        form {
            border: 2px solid green;
            padding: 5px;
            margin: 5px;
        }

        td, th {
            border: 2px solid #000000;
            padding: 2px;
        }

        table {
            border: 2px solid green;
            padding: 5px;
            margin-top: 5px;
            margin-right: auto;
            margin-bottom: 5px;
            margin-left: auto;
            width: 50%;
            font-size: 1.5em;
            text-align: center;
        }

        th {
            background-color: aliceblue;
            padding: 2px;
        }
    </style>

</head>
<body>

<main>
    <h1>Aula 40 - Formulários</h1>
    <form action="#" method="POST" name="formulario_simples_nome" id="formulario_simples">
        <input type="text" name="texto">
        <input type="submit" name="submit">


    </form>
    <section id="resultado">
        <h2>POST</h2>
        <table>
            <thead>
            <th>Elemento do Formulário</th>
            <th>Valor</th>
            </thead>
            <tbody>
            <?php displayInfoArray($_POST);
            echo "<pre>";
            var_dump($_POST);
            echo "</pre>";


            ?>


        </table>

        <h2>GET</h2>
        <table>
            <thead>
            <th>Elemento do Formulário</th>
            <th>Valor</th>
            </thead>
            <tbody>
            <?php displayInfoArray($_GET);
            echo "<pre>";
            var_dump($_GET);
            echo "</pre>";


            ?>


        </table>
    </section>
</main>

</body>
</html>