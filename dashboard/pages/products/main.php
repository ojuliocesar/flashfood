<?php

use Dashboard\Model\Product;

$product = new Product;

$read = $product->read();

?>

<section class="main-read-products">
    <div class="products-title-wrapper">
        <h1 class="main-products-title">Listagem de Produtos</h1>
    </div>

    <div class="read-table-wrapper">
        <table>
            <tbody>
                <?php if ($read): foreach($read as $product): ?>
                    <tr>
                        <td class="read-image-wrapper"><img src="assets/images/products/<?= $product['banner'] ?>" alt=""></td>
                        <td><?= $product['name'] ?></td>
                        <td>R$ <?= number_format($product['special_price'], 2, ',', '.'); ?></td>
                        <td class="product-table-status">
                            <form>
                                <input id="status" name="status" type="checkbox" data-id="<?= $product['product_id'] ?>" <?= $product['status'] == 1 ? 'checked' : '' ?>/>
                                <label for="status"></label>
                            </form>
                        </td>
                        <td>
                            <div class="read-icons-wrapper">
                                <a class="read-icons-action" href="?page=products&action=update&id=<?= $product['product_id'] ?>">
                                    <img src="<?= DIR_IMG ?>/system/editar.png">
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php  endforeach; else: ?>
                    <tr>
                        <div class="table-line-wrapper">
                            <td>Nenhum Produto cadastrado, cadastre clicando aqui <a href="?page=products&action=create"><i class="fa-solid fa-arrow-right"></i></a></td>
                        </div>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>