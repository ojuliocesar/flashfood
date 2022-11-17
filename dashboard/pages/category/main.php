<?php

use Model\ProductCategory;

$productCategory = new ProductCategory;

$read = $productCategory->readAll();

?>

<section class="main-category-products">
    <div class="products-title-wrapper">
        <h1 class="main-products-title">Categorias</h1>
    </div>

    <div class="products-search-wrapper">
        <div class="search-form">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input id="category-search" type="search" placeholder="Search...">
        </div>
        
        <a href="?page=category&action=create" class="products-read-button-create">Create +</a>
    </div>

    <div class="category-table-scroll-wrapper">
        <table class="main-read-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Categoria</th>
                    <th>Produtos</th>
                    <th>Status</th>
                    <th class="read-table-action">Action</th>
                </tr>
            </thead>
            <tbody id="read-table-category-items">
                <?php if ($read): foreach($read as $category): $count = $productCategory->countProducts($category['category_id'])?>
                    <tr>
                        <td><?= $category['category_id'] ?></td>
                        <td><?= $category['name'] ?></td>
                        <td>
                            <?= $count > 0 ? $count : 'Nenhum' ?> <?= $count <= 1 ? 'Produto' : 'Produtos' ?>
                        </td>
                        <td class="read-table-status">
                            <form>
                                <input name="status" id="status-read-category" onclick="changeStatus(<?= $category['category_id'] ?>, 'product_category')" type="checkbox" <?= $category['status'] == 1 ? 'checked' : '' ?>/>
                                <label for="status-read-category"></label>
                            </form>
                        </td>
                        <td class="read-table-action">
                            <div class="read-table-icons-wrapper">
                                <a href="index.php?page=category&action=update&id=<?= $category['category_id'] ?>">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php  endforeach; else: ?>
                    <tr>
                        <td>Nenhuma Categoria cadastrada, cadastre clicando <a class="link-no-results" href="?page=category&action=create">aqui</a></td> 
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>