<?php
function sanitize($string)
{


    $sanitized_escaped_string_1 = filter_var($string, FILTER_SANITIZE_STRING);
    $sanitized_escaped_string_2 = filter_var($sanitized_escaped_string_1, FILTER_SANITIZE_STRING);
    $sanitized_escaped_string_3 = filter_var($sanitized_escaped_string_2, FILTER_SANITIZE_STRING);
    $sanitized_escaped_string_final = filter_var($sanitized_escaped_string_3, FILTER_SANITIZE_STRING);
    return $sanitized_escaped_string_final;
}

function displayInfo($form_info, $method)
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
    echo '</tbody>
            <tfoot><th>Método</th><td colspan="2">' . $method . '</td></tfoot>';
}

function formProcessing()
{
    $method = "Formulário ainda não foi enviado.";

    if (isset($_POST['submit'])) {


        displayInfo($_POST, "POST");


    } elseif (isset($_GET['submit'])) {


        displayInfo($_GET, "GET");


    } else {
        displayInfo(["N/A" => "N/A"], "Formulário ainda não foi enviado.");

    }

}

function debugForm()
{
    if (isset($_POST['submit'])) {


        $formInfo = ($_POST);


    } elseif (isset($_GET['submit'])) {


        $formInfo = ($_GET);
    } else {
        $formInfo = '';
    }

    echo "<pre>";
    var_dump($formInfo);
    echo "</pre>";
}

?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Aula 40 - Formulários</title>
    <meta name="description"
          content="Aqui vai a descrição do seu site ou página para o Google poder ver e colocar no sumário no resultado das buscas.">
    <meta name="keywords" content="Aqui vão as palavras chaves separadas por vírgula">
    <meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1.0">
    <!--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
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

        textarea {
            width: 90%;
            height: 500px;
        }

        select {
            height: 300px;
        }
    </style>

</head>
<body>
<button class="btn-success">
    Elemento de botão
</button>
<main>
    <h1>Aula 40 - Formulários</h1>
    <form action="#" method="POST" name="formulario_simples_nome" id="formulario_simples">
        <fieldset>
            <legend>Dados de contato</legend>
            <label for="nome">Nome</label>
            <br>
            <input type="text" maxlength="140" minlength="5" name="caixaDeTexto" placeholder="Nome" id="nome"
                   spellcheck="false">

            <br>
            <label for="sobrenome">Sobrenome</label>
            <br>
            <input type="text" name="sobrenome" placeholder="Sobrenome" maxlength="140" id="sobrenome" value="Sobrenome"
                   required>
            <br>
            <label for="number">Number</label>
            <br>
            <input type="number" name="numero" id="number" min="2" max="100" step="2">
            <br>
            <label for="pass">Password</label>
            <br>
            <input type="password" name="senha" id="pass" autocomplete="new-password">
            <br>
            <label for="telefone">Telefone</label>
            <br>
            <input type="tel" name="telefone" id="telefone">
            <br>
            <label for="site">URL</label>
            <br>
            <input type="url" name="site" id="site">
            <br>
            <label for="email">E-mail</label>
            <br>
            <input type="email" name="email" id="email" multiple>
        </fieldset>
        <br>

        <label for="busca">Busca</label>
        <br>
        <input type="search" name="busca" id="busca">
        <br>
        <label for="arquivo">File</label>
        <br>
        <input type="file" name="arquivo" id="arquivo" accept="application/msword, .doc, .docx" multiple>

        <br>
        <p>Caixa de seleção com um valor:</p>
        <input type="checkbox" name="caixa_de_selecao" id="caixa_de_selecao" value="Sim">
        <label for="caixa_de_selecao">Selecione para receber newsletter.</label>

        <p>Caixa de seleção com vários valores valor:</p>
        <p>Quais as cores que você gosta:</p>

        <input type="checkbox" name="caixa_de_selecao_varios[]" id="verde" value="verde">
        <label for="verde">Verde</label>
        <br>

        <input type="checkbox" name="caixa_de_selecao_varios[]" id="azul" value="azul">
        <label for="azul">Azul</label>
        <br>

        <input type="checkbox" name="caixa_de_selecao_varios[]" id="vermelho" value="vermelho" checked>
        <label for="vermelho">Vermelho</label>


        <p>Radio</p>
        <p>Qual a cor que você gosta:</p>
        <input type="radio" name="radio" id="verder" value="verde" checked>
        <label for="verder">Verde</label>
        <br>

        <input type="radio" name="radio" id="azulr" value="azul">
        <label for="azulr">Azul</label>
        <br>

        <input type="radio" name="radio" id="vermelhor" value="vermelho">
        <label for="vermelhor">Vermelho</label>
        <br>

        <p>Hidden</p>
        <input type="hidden" value="token" name="hidden">

        <br>
        <label for="cor">Cor</label>
        <br>
        <input type="color" id="cor" name="color">
        <br>
        <label for="range">Intervalo</label>
        <br>
        <input type="range" id="range" name="range" min="2" max="100" step="2">
        <br>
        <label for="time">Hora - hh:mm / hh:mm:ss</label>
        <br>
        <input type="time" id="time" name="time" min="08:00" max="18:00" step="1800">
        <br>
        <label for="date">Data - yyyy-MM-dd</label>
        <br>
        <input type="date" id="date" name="date" min="2019-04-05" max="2019-06-15" step="2">

        <br>
        <label for="datetime-local:">Datetime-local - yyyy-MM-ddThh:mm</label>
        <br>
        <input type="datetime-local" id="datetime-local" name="datetime-local" min="2019-04-04T08:00"
               max="2020-06-05T21:00" step="1800">

        <br>
        <label for="week">Semana - yyyy-Www</label>
        <br>
        <input type="week" id="week" name="week" min="2019-W20" max="2019-W26" step="2">
        <br>
        <label for="month">Mês - yyyy-MM</label>
        <br>

        <input type="month" id="month" name="month" min="2019-05" max="2019-08" step="2">
        <br>
        <label for="mensagem">Área de texto</label>
        <br>
        <textarea maxlength="50000" name="mensagem">
        Valor inicial.
    </textarea>
        <br>
        <label for="selecao">Seleção</label>
        <select name="selecao[]" id="selecao" multiple>
            <optgroup label="Comida">
                <option>Hamburguer</option>
                <option>Macarrão</option>
                <option>Arroz</option>
                <option>Feijão</option>
            </optgroup>
            <optgroup label="Bebida">
                <option value="1" label="Coca-cola">
                <option value="2" label="Guaraná" selected>
                <option value="3" label="Suco">Suco</option>
                <option value="4" label="Água">
            </optgroup>

        </select>
        <br>
        <fieldset>
            <legend> Datalist</legend>
            <label for="data_text"> Escreva sabores que você ama</label>
            <br>
            <input type="text" name="data_text" list="text_op" id="data_text">
            <datalist id="text_op">
                <option value="Chocolate">
                <option value="Menta">
                <option value="Morango">
                <option value="Baunilha">

            </datalist>
            <br>
            <label for="data_search"> Search</label>
            <br>
            <input type="search" name="data_search" list="busca_op" id="data_search">
            <datalist id="busca_op">
                <option value="Chocolate">
                <option value="Menta">
                <option value="Morango">
                <option value="Baunilha">
            </datalist>
            <br>
            <label for="data_range"> Range</label>
            <br>

            <input type="range" name="data_range" list="marcas" min="0" max="100" step="5" id="data_range">
            <datalist id="marcas">
                <option value="0">
                <option value="10">
                <option value="20">
                <option value="30">
                <option value="40">
                <option value="50">
                <option value="60">
                <option value="70">
                <option value="80">
                <option value="90">
                <option value="100">
            </datalist>
            <br>
            <label for="data_range2"> Range</label>
            <br>
            <input type="range" name="data_range2" list="marcas_e_num" min="0" max="100" step="10" id="data_range2">
            <datalist id="marcas_e_num">
                <option value="0" label="0">
                <option value="10">
                <option value="20">
                <option value="30">
                <option value="40">
                <option value="50" label="50">
                <option value="60">
                <option value="70">
                <option value="80">
                <option value="90">
                <option value="100" label="100">
            </datalist>


        </fieldset>


        <br>
        <label for="reset">Limpar</label>
        <br>
        <input type="reset" id="reset" name="reset" value="Limpar"> <br>
        <label for="button">Botão</label>
        <br>
        <input type="button" id="button" name="button" value="Botão"> <br>


        <br>
        <br>
        <input type="submit" name="submit" value="Submeter">
    </form>
    <section id="resultado">
        <h2>Informação enviada pelo formulário em formato array:</h2>
        <?php
        debugForm();
        ?>
        <table>
            <thead>
            <th>Elemento do Formulário</th>
            <th>Valor</th>
            </thead>
            <tbody>
            <?php $method = formProcessing(); ?>


        </table>
    </section>
</main>

</body>
</html>