<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h1>RESULTADO</h1>
    <?php 

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if(!empty(trim($_POST["brawler"]) && $_POST["mapa"])){
            $selectedbrawler = $_POST["brawler"];
            $selectedmapa = $_POST["mapa"];
            $mododejogo = $_POST["mododejogo"];

            echo "você está jogando no mapa $selectedmapa com o brawler $selectedbrawler.";
        }else{
            header("location:index.php");
            exit;
        }
    };
        echo "</br>";
        echo "informe as estatísticas do jogo:"
    ?>
    <form method="post" action="dbpersist.php">
        <select name="result">
            <option value="" selected disabled hidden></option>
            <option value="win">ganhei</option>
            <option value="defeat">perdi</option>
        </select>

        <input type="number" name="kd" placeholder="informe seu KD">
        <input type="hidden" name="mododejogo" value="<?= $mododejogo?>"/>
        <input type="hidden" name="brawler" value="<?= $selectedbrawler?>"/>
        <input type="hidden" name="mapa" value="<?= $selectedmapa?>"/>
        <button>Registrar</button>
    </form>
    <form action="index.php">
    <button>Cancelar</button>
    </form>

</body>
</html>