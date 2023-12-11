<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['apostila'])) {
        $apostila = json_decode($_POST['apostila'], true);
        $resultado = adicionarAoCarrinho($apostila);

        header('Location: carrinho.php');
        exit();
    }
}

function adicionarAoCarrinho($apostila) {
    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = [];
    }

    $soma = 0;
    foreach ($apostila as $item) {
        
        $numero = filter_var($item, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        if (is_numeric($numero)) {
            $soma += $numero;
        }
    }

    $_SESSION['carrinho'][] = ['dados' => $apostila, 'soma' => $soma];


    return ['status' => 'success', 'mensagem' => 'Produto adicionado ao carrinho com sucesso.', 'dados' => $_SESSION['carrinho']];
}
?>