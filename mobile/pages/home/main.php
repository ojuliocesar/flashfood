<?php

use Model\ProductCategory;
use Model\Product;

$productCategory = new ProductCategory;
$product = new Product;

$categories = $productCategory->read();
$products = $product->readRecents();

?>

<section id="main-cardapio-categorias">

    <div class="categories-wrapper">
        <div class="items-categories">
            <ul>
                <?php foreach($categories as $category): ?>
                    <li>
                        <img src="<?= SERVER_HOST ?>/assets/images/categories/<?= $category['banner'] ?>" alt="">

                        <h2><?= $category['name'] ?></h2>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <div class="home-products-wrapper">

        <?php foreach($products as $product): ?>
            <div class="itens-cardapio" data-product-slug="<?= $product['slug'] ?>">
                <div class="fundo-produto">
                    <h2 class="main-titulo-produto"><?= $product['name'] ?></h2>
                    <div class="img-produto">
                        <img src="<?= $product['banner'] ?>" alt="">
                    </div>
                    <div class="especificacoes-produto">
                        <div class="texto-produto">
                            <img src="<?= DIR_IMG ?>/header/logo-responsivo.png" alt="" class="logo-especificacao">
                            <h4><?= $product['description'] ?></h4>
                        </div>
                        <div class="preco-produto">
                            <h5>R$ <?=  number_format($product['special_price'] ?? $product['price'], 2, ',', '.') ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</section>