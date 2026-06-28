<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<?php
require_once("model.php");
require_once("pdo.php");

if (!empty($_GET['mododejogo']) && !empty($_GET['mapa'])) {
    $mododejogo = $_GET["mododejogo"];
    $mapa = $_GET['mapa'];
    
    //select os dados no db
    $tabela = criatabela($pdo,$mapa);
};
?>

<div class="container-flex">

    <!-- FORMULÁRIO -->
    <div class="form-area">
        <h1>PARTIDA ATUAL</h1>
        <form method="post" action="result.php" >
             <select name="brawler">
                    <option value="" selected disabled hidden> Selecione um brawler</option>
                <?php foreach ($brawlers as $brawl): ?>
                    <option value="<?= $brawl ?>"><?= $brawl ?></option>
                <?php endforeach; ?>
            </select>

            <br><br>

            <input type="hidden" name="mapa" value="<?= $mapa?>"/>
            <input type="hidden" name="mododejogo" value="<?= $mododejogo ?>"/>
            <br><br>

            <button>Selecionar</button>
        </form>

        <br>

        <form action="index.php">
            <button>Cancelar</button>
        </form>
    </div>

    <!-- TABELA -->
    <div class="table-area">
        <h1>MELHORES ESCOLHAS</h1>

        <table border="1">
            <tr>
                <th>Brawler</th>
                <th>KD TOTAL</th>
                <th>% de vitória</th>
                <th>partidas jogadas</th>
            </tr>

            <?php
            foreach($tabela as $lista): ?>
            <?php $total = partidastotais($pdo,$lista['brawler'],$mapa)?>
            <tr>
                <td><?= $lista['brawler']?></td>
                <td><?= $lista['desempenho']?></td>
                <td><?= $lista['porcentagem']?></td>
                <td><?= $total?></td>
            </tr>
            <?php 
            endforeach; ?>
        </table>
    </div>

</div>

</body>
</html>