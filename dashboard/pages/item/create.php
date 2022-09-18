<?php

use Dashboard\Model\ItemCategory;
use Dashboard\Model\Item;

$itemCategory = new ItemCategory;

$item = new Item;

$categories = $itemCategory->read();

if (isset($_POST['submit'])) {
    $isEmpty = false;

    foreach($_POST as $postItem) {
        if (empty($postItem)) {
            $isEmpty = true;
        }
    }

    if ($isEmpty || !isset($_FILES['banner'])) {
        
        header("Location: index.php?page=item&action=create");
        exit();
    }

    $extension = pathinfo($_FILES['banner']['name'], PATHINFO_EXTENSION);

    if ($extension != 'jpg' && $extension != 'jpeg' && $extension != 'png') {

        header("Location: index.php?page=item&action=create");
        exit();
    }

    $data['name'] = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $data['category_id'] = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_NUMBER_INT);
    $data['price'] = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_SPECIAL_CHARS);
    $data['special_price'] = filter_input(INPUT_POST, 'special_price', FILTER_SANITIZE_SPECIAL_CHARS);

    $data['description'] = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
    $data['status'] = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_NUMBER_INT);
    $data['slug'] = strtolower(str_replace(' ', '-', $data['name']));

    $create = $item->create($data);

    if ($create) {

        header("Location: index.php?page=read");
        exit();
    } else {

        header("Location: index.php?page=item&action=create");
        exit();
    }
}

?>

<section class="main-create-item">
    <div class="products-title-wrapper">
        <a href="?page=item">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <h1 class="main-item-title">Cadastro de Produtos</h1>
    </div>

    <form action="" class="main-form-item" method="POST" enctype="multipart/form-data">
        <div class="form-items-item">
            <div class="input-item-wrapper">
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" placeholder="Digite o Nome" required>
            </div>

            <div class="input-item-wrapper">
                <label for="category">Categoria</label>
                <select name="category" id="category" required>
                    <option value="" selected>Selecione uma Categoria</option>
                    <?php foreach($categories as $category): ?>
                        <option value="<?= $category['category_id'] ?>"><?= $category['name'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="input-item-wrapper">
                <label for="price">Preço</label>
                <input type="number" name="price" id="price" step="0.01" placeholder="R$ 100,99" required>
            </div>

            <div class="input-item-wrapper">
                <label for="special_price">Desconto</label>
                <input type="number" name="special_price" id="special_price" step="0.01" placeholder="R$ 50,99" required>
            </div>

            <div class="input-item-wrapper">
                <label for="description">Descrição</label>
                <input type="text" name="description" id="description" placeholder="Digite a Descrição" required>
            </div>

            <div class="input-item-wrapper">
                <label for="status">Status</label>
                <select name="status" id="status" required>
                    <option value="'1'" selected>Ativado</option>
                    <option value="'0'">Desativado</option>
                </select>
            </div>

            <div class="input-item-wrapper">
                <label for="banner">Banner</label>
                <input type="file"  accept=".jpg, .png, .jpeg, .gif" name="banner" id="banner" required>
            </div>
        </div>

        <input type="submit" value="Cadastrar" name="submit" id="submit">
    </form>
</section>