<?php
//Include controller to show products in cart
require_once "../../controller/cart/show_cart_controller.php";
//Include main Headers
require_once "../elements/headers.php";
?>

<!-- CSS for Cart  -->
<link rel="stylesheet" href="../../web/assets/css/cart.css">

<!-- Script for removing product from cart -->
<script type="text/javascript" src="../../web/assets/js/remove.cart.js"></script>

<!-- Define Page Name -->
<title>MagBuy | Cart</title>

<?php
//Include Header
require_once "../elements/header.php";
//Include Navigation
require_once "../elements/navigation.php";
?>

<!-- Show Total product price and checkout -->
<div class="cart-items">
    <div class="container">
        <h3 class="title">My shopping(<div id="cartItems2"><?= $cartItems ?></div>)</h3><br>
        <h3 class="b-tittle" id='totalPrice'>Price Total:<div id="totalPriceCurrency">$<div id="cartTotalPrice2">
                    <?= $cartTotalPrice ?></div></div></h3><br>

        <button class="btn btn-danger btn-lg btn-block" id="checkOutButton">Checkout</button>

        <!-- Show products in cart -->
        <?php foreach ($cart as $cartProduct) { ?>
            <div id="product-<?= $cartProduct->getId() ?>">
                <div class="cart-header">
                    <div id="button-<?= $cartProduct->getId() ?>" class="close1"
                         onclick="removeFromCart(<?= $cartProduct->getId() . "," . $cartProduct->getPrice() . "," .
                         $cartProduct->getQuantity() ?>)"></div>
                    <div class="cart-sec simpleCart_shelfItem">
                        <div class="cart-item cyc">
                            <a href="single.php?pid=<?= $cartProduct->getId() ?>"><img
                                        src="<?= $cartProduct->getImage() ?>" class="img-responsive" alt=""></a>
                        </div>
                        <div class="cart-item-info">
                            <h3><a href="single.php?pid=<?= $cartProduct->getId() ?>"> <?= $cartProduct->getTitle() ?>
                                </a>
                            </h3>
                            <ul class="qty"><li><p>Quantity: <?= $cartProduct->getQuantity() ?></p></li></ul>
                            <div class="delivery">
                                <p>$<?= $cartProduct->getPrice() * $cartProduct->getQuantity() ?></p><br>
                                <p>Single price: $<?= $cartProduct->getPrice() ?></p>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php
//Include Footer
require_once "../elements/footer.php";
?>
