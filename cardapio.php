<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $total = 0;
    $items = [];

    // Produtos e preços
    $products = [
        'X-Burguer' => 8.30,
        'Misto Quente' => 7.00,
        'X-Salada' => 8.90,
        'Coca-Cola' => 6.00,
        'Fanta' => 5.00,
        'Conquista' => 5.50,
        'Batata Frita' => 10.00,
        'Anéis de Cebola' => 12.00,
        'Brigadeiro' => 2.00,
    ];

    // Processa Lanches
    if (!empty($_POST['lanches'])) {
        foreach ($_POST['lanches'] as $lanche) {
            $key = 'quantidade_' . strtolower(str_replace(' ', '_', $lanche));
            if (isset($_POST[$key])) { // Verifica se a quantidade foi enviada
                $quantidade = intval($_POST[$key]);
                if ($quantidade > 0) {
                    $items[] = "$quantidade x $lanche";
                    $total += $quantidade * $products[$lanche];
                }
            }
        }
    }

    // Processa Bebidas
    if (!empty($_POST['bebidas'])) {
        foreach ($_POST['bebidas'] as $bebida) {
            $key = 'quantidade_' . strtolower(str_replace(' ', '_', $bebida)); // Gera o nome da chave corretamente
            if (isset($_POST[$key])) { // Verifica se a quantidade foi enviada
                $quantidade = intval($_POST[$key]);
                if ($quantidade > 0) {
                    $items[] = "$quantidade x $bebida";
                    $total += $quantidade * $products[$bebida];
                }
            }
        }
    }
    

    // Processa Porções
    if (!empty($_POST['porcoes'])) {
        foreach ($_POST['porcoes'] as $porcao) {
            $key = 'quantidade_' . strtolower(str_replace(' ', '_', $porcao));
            if (isset($_POST[$key])) { // Verifica se a quantidade foi enviada
                $quantidade = intval($_POST[$key]);
                if ($quantidade > 0) {
                    $items[] = "$quantidade x $porcao";
                    $total += $quantidade * $products[$porcao];
                }
            }
        }
    }

    // Processa Doces
    if (!empty($_POST['doces'])) {
        foreach ($_POST['doces'] as $doce) {
            $key = 'quantidade_' . strtolower(str_replace(' ', '_', $doce));
            if (isset($_POST[$key])) { // Verifica se a quantidade foi enviada
                $quantidade = intval($_POST[$key]);
                if ($quantidade > 0) {
                    $items[] = "$quantidade x $doce";
                    $total += $quantidade * $products[$doce];
                }
            }
        }
    }

    // Observações
    $observacao = isset($_POST['observacao']) ? $_POST['observacao'] : '';

    // Exibe o resultado
    echo "<h1>Resumo do Pedido</h1>";
    echo "<ul>";
    foreach ($items as $item) {
        echo "<li>$item</li>";
    }
    echo "</ul>";
    echo "<h2>Valor Total: R$ " . number_format($total, 2, ',', '.') . "</h2>";
    if ($observacao) {
        echo "<h3>Observações:</h3><p>$observacao</p>";
    }
}
?>
