<?php

$pastaDB = getenv('APPDATA') . '\Brawlmatch\database';

if (!is_dir($pastaDB)) {
    mkdir($pastaDB, 0777, true);
}

$caminho = $pastaDB . '\dados.db';

try {
    $pdo = new PDO('sqlite:' . $caminho);
    $pdo->exec("CREATE TABLE IF NOT EXISTS partida(
        brawler TEXT,
        modoJogo TEXT,
        mapaJogo TEXT,
        resultado boolean)");

    $pdo->exec("CREATE TABLE IF NOT EXISTS estatistica(
        brawler TEXT,
        mapaJogo TEXT,
        desempenho TEXT,
        porcentagem REAL,
        UNIQUE(brawler, mapaJogo))");

    // Mostra erros como exceções (ótimo para desenvolvimento)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Retorna arrays associativos por padrão
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $pdo;

} catch (PDOException $e) {
        die('Erro ao conectar: ' . $e->getMessage());
};  



/* try {
    $pdo = new PDO("mysql:host=localhost;dbname=brawlstars;charset=utf8mb4","root",""); 
}catch (PDOException $e){
    echo "conexão com o banco de dados mal sucedida!".$e->getMessage();
}; */

/**
 * função utilizada para salvar dados no db quando a partida for vitória
 * @param object $pdo parâmetro que armazena a conexão com o db
 * @param string $mododejogo que armazena o modo de jogo da partida
 * @param string $selectedmapa armazena o mapa da partida
 * @param string $selectedbrawler armazena o brawler selecionado
 * @param bool $resultado
 */
function salvarPartida($pdo,$mododejogo,$selectedmapa,$selectedbrawler,$resultado){
    $sql = "INSERT INTO partida (modoJogo,mapaJogo,brawler,resultado) VALUES(:modoJogo,:mapaJogo,:brawler,:resultado)";
                $stmt = $pdo->prepare($sql);

                $stmt->execute([
                    ":modoJogo"=> $mododejogo,
                    ":mapaJogo"=> $selectedmapa,
                    ":brawler"=> $selectedbrawler,
                    ":resultado"=> $resultado
                    ]);
};

/**
 * função utilizada para salvar dados na tabela estatistica
 * @param object $pdo parâmetro que armazena a conexão com o db
 * @param string $selectedbrawler parâmetro que armazena o brawler selecionado
 * @param string $selectedmapa parâmetro que armazena o mapa selecionado
 * @param float $estatistica recebe o valor em float de Nº de partidas win com aquele brawl divido pelo Nº de partidas totais jogadas com aquele brawler naquele modo 
 * @param string $desempenho armazena o calculo de kd naquela partida
 **/
function salvarEstatistica($pdo,$selectedbrawler,$selectedmapa,$estatistica, $desempenho = 0){
    $sql =$sql = "INSERT INTO estatistica(brawler, mapaJogo, desempenho, porcentagem)
    VALUES(:brawl, :mapa, :desempenho, :porcent)ON CONFLICT(brawler, mapaJogo)
    DO UPDATE SET 
    porcentagem = excluded.porcentagem, desempenho = desempenho + excluded.desempenho";

            $stmt = $pdo->prepare($sql);

            $stmt->execute([
                ":brawl" => $selectedbrawler,
                ":mapa" => $selectedmapa,
                ":desempenho" => $desempenho,
                ":porcent" => $estatistica
            ]);
};

/**
 * retorna a quantidade total de partidas salvas naquele modo de jogo e com aquele brawler
 * @param object $pdo parâmetro que armazena a conexão com o db
 * @param string $selectedbrawler nome do brawler selecionado
 * @param string $selectedmapa parâmetro que armazena o mapa selecionado
 * @return int retorna o indice do array asssociativo que contém o valor de itens totais.
*/
function partidastotais($pdo,$selectedbrawler,$selectedmapa){
    $sql = "SELECT COUNT(*) AS total_linhas FROM partida WHERE mapaJogo = :mapa AND brawler = :brawl";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ":mapa" => $selectedmapa,
            ":brawl" => $selectedbrawler
        ]);

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['total_linhas'];

}; 
/**
 * retorna o total de partidas win salvas naquele modo de jogo e com aquele brawler
 * @param object $pdo parâmetro que armazena a conexão com o db
 * @param string $selectedbrawler nome do brawler selecionado
 * @param string $selectedmapa parâmetro que armazena o mapa de jogo selecionado
 * @return int retorna o indice do array asssociativo que contém o valor de itens totais.
*/
function partidaswin($pdo,$selectedbrawler,$selectedmapa){
     $sql = "SELECT COUNT(*) AS total_linhas FROM partida WHERE mapaJogo = :mapa AND brawler = :brawl AND resultado = 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ":mapa" => $selectedmapa,
            ":brawl" => $selectedbrawler
        ]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['total_linhas'];
};

function criatabela($pdo,$selectedmapa){
    $sql = "SELECT * FROM estatistica WHERE mapaJogo = :mapa ORDER BY porcentagem DESC";

    $stmt = $pdo->prepare($sql);

    $stmt ->execute([
        ":mapa" => $selectedmapa
    ]);

    $listaresultado = $stmt->fetchall(PDO::FETCH_ASSOC);
    return $listaresultado;
}

?>