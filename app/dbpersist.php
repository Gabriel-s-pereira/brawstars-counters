<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<?php
require "pdo.php";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!empty($_POST["brawler"]) && !empty($_POST["mapa"])){

        $selectedbrawler = $_POST["brawler"];
        $selectedmapa = $_POST["mapa"];
        $mododejogo = $_POST["mododejogo"];
        $resultado = $_POST["result"];
        $desempenho = $_POST["kd"];

        // PARTIDA
        if($resultado == "win"){
            $resultado = true;
            salvarPartida($pdo,$mododejogo,$selectedmapa,$selectedbrawler,$resultado,$desempenho);

        } elseif($resultado == "defeat"){
            $resultado = false;
            salvarPartida($pdo,$mododejogo,$selectedmapa,$selectedbrawler,$resultado,$desempenho);

        } else {
            header("location:index.php");
            exit;
        };

        // ESTATÍSTICA
        $win = partidaswin($pdo,$selectedbrawler,$mododejogo);
        $total = partidastotais($pdo,$selectedbrawler,$mododejogo);
        $estatistica = ($total > 0) ? (($win / $total)*100) : 0;

        salvarEstatistica($pdo,$selectedbrawler,$selectedmapa,$estatistica,$desempenho);

        echo "<h1>PARTIDA REGISTRADA!</h1>";
        echo "<p style='text-align:center;'>Dados salvos com sucesso 🎉</p>";

    } else {
        header("location:index.php");
        exit;
    }
}
?>

<div class="linha">
    <form action="index.php">
        <button>NOVA PARTIDA</button>
    </form>
</div>

</body>
</html>