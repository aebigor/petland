<?php
// PHP code for handling the load more button
$currentItem = 8;

if (isset($_POST['loadMore'])) {
    $boxes = []; // Replace this with code to fetch data from your database or source
    $response = '';

    for ($i = $currentItem; $i < $currentItem + 4; $i++) {
        if (isset($boxes[$i])) {
            $response .= '<div class="box" style="display:inline-block;">' . $boxes[$i] . '</div>';
        }
    }

    $currentItem += 4;

    if ($currentItem >= count($boxes)) {
        $response .= '<script>document.getElementById("load-more").style.display = "none";</script>';
    }

    echo json_encode(['items' => $response]);
}

// PHP code for handling the shopping cart
$carrito = [];
$vaciarCarritoBtnClicked = false;

if (isset($_POST['accion'])) {
    $accion = $_POST['accion'];

    if ($accion === 'agregar') {
        // Handle adding items to the shopping cart
        $infoElemento = [
            'imagen' => $_POST['imagen'],
            'titulo' => $_POST['titulo'],
            'precio' => $_POST['precio'],
            'id' => $_POST['id']
        ];
        array_push($carrito, $infoElemento);
    } elseif ($accion === 'eliminar') {
        // Handle removing items from the shopping cart
        $elementoId = $_POST['id'];
        foreach ($carrito as $key => $elemento) {
            if ($elemento['id'] === $elementoId) {
                unset($carrito[$key]);
            }
        }
    } elseif ($accion === 'vaciar') {
        // Handle emptying the shopping cart
        $carrito = [];
        $vaciarCarritoBtnClicked = true;
    }
}

// Return the shopping cart contents as JSON
echo json_encode(['carrito' => $carrito, 'vaciarCarrito' => $vaciarCarritoBtnClicked]);
?>
