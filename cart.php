<?php include("partials-front/header.php"); ?>

    <!-- Cart START -->
    <section class="cart">
        <div class="container">


            <form action="#" class="order" autocomplete="off">
                <fieldset class="shadow">
                    <legend class="text-center"><strong>My Cart</strong></legend>

                    <div class="row">
                        <div class="food-menu-img">
                            <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                        </div>
                        <div class="food-menu-desc">
                            <h3>Food Title</h3>
                            <p class="food-price">$2.3</p>

                            <div class="order-label">Quantity</div>
                            <input type="number" name="qty" class="input-responsive" value="1" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="food-menu-img">
                            <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                        </div>
                        <div class="food-menu-desc">
                            <h3>Food Title</h3>
                            <p class="food-price">$2.3</p>

                            <div class="order-label">Quantity</div>
                            <input type="number" name="qty" class="input-responsive" value="1" required>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="shadow">
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="Cth: Varian Avila" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="Cth: 08952306xxxx" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="4" placeholder="Cth: Jalan, Kelurahan, Kecamatan, Kota" class="input-responsive" required></textarea>
                    <div class="input-group mb-5">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Payment Methods</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01">
                            <option value="Transfer" selected>Transfer Bank</option>
                            <option value="COD">Bayar Di Tempat</option>
                            <option value="Gopay">GoPay</option>
                        </select>
                    </div>
                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>
            </form>

        </div>
    </section>
<!-- Customer END -->
<?php include('partials-front/footer.php'); ?>