<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<?php require_once "model.php"; ?>

    <h1> MODOS DE JOGO </h1>
    <div class = "container">
        <div class="linha">
            <div> 
                <form action="" method ="get">
                <button>PIQUE GEMAS</button>
                <input type = "hidden" name = "mododejogo" value = "piqueGemas">
                </form> 
            </div>

            <div> 
                <form action="" method ="get">
                <button>ROUBO DO COFRE</button>
                <input type = "hidden" name = "mododejogo" value = "roubo">
                </form> 
            </div>

            <div>
                <form action="" method ="get">
                    <button>CAÇA ESTRELAS</button>
                    <input type = "hidden" name = "mododejogo" value = "cacaEstrelas">

                </form>
            </div>
        </div>

        <div class="linha">
            <div>
                <form action="" method ="get">
                    <button>NOCAUTE</button>
                    <input type = "hidden" name = "mododejogo" value = "nocaute">
                </form>
            </div>

            <div>
                <form action="" method ="get">
                    <button>FUT BRAW</button>
                    <input type = "hidden" name = "mododejogo" value = "futBrawl">
                </form>
            </div>

            <div>
                <form action="" method ="get">
                    <button>ZONAESTRATEGICA</button>
                    <input type = "hidden" name = "mododejogo" value = "zonaEstrategica">
                </form>
            </div>
        </div>

    </div>
</br>

<?php if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["mododejogo"])): ?>
    
    <h1> MAPAS ATIVOS </h1>
        <div class = "container">
            <div class="linha">
    <?php    $mododejogo = $_GET["mododejogo"];
    foreach ($$mododejogo as $mapa): ?>
                <div> 
                    <form action="salao.php" method ="get">
                    <button><?= $mapa?></button>
                    <input type = "hidden" name = "mododejogo" value = "<?= $mododejogo?>">
                    <input type ="hidden" name ="mapa" value="<?= $mapa?>">
                    </form> 
                </div>
    <?php endforeach; ?>
            </div>

        </div>

<?php endif; ?>
</body>
</html>