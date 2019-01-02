<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>E-Commerce CI</title>

	<?php echo link_tag('assets/css/bootstrap.min.css'); ?>
	<?php echo link_tag('assets/css/style.css'); ?>
</head>

<body>
	<header>
		<div class="header-top clearfix">
			<div class="container">
				<div class="float-left ml-2">
					<ul class="list-inline m-0">
						<li class="list-inline-item"><i data-feather="phone" width="12px"></i> +88 2233 456 677</li>
						<li class="list-inline-item separetor">|</li>
						<li class="list-inline-item"><i data-feather="mail" width="12px"></i> ecommerce@store.com</li>
					</ul>
				</div>
				<div class="float-right mr-2">
					<ul class="list-inline m-0">
						<li class="list-inline-item"><a href=""><i data-feather="user" width="12px"></i> My Account</a></li>
						<li class="list-inline-item separetor">|</li>
						<li class="list-inline-item"><a href=""><i data-feather="shopping-bag" width="12px"></i> My Wishlist</a></li>
						<li class="list-inline-item separetor">|</li>
						<li class="list-inline-item"><a href="<?php echo site_url('/checkout'); ?>"><i data-feather="check-square" width="12px"></i> Checkout</a></li>
						<li class="list-inline-item separetor">|</li>
						<li class="list-inline-item"><a href="javascript:void(0)" data-toggle="modal" data-target="#registerModalLong"><i data-feather="user-plus" width="12px"></i> Register</a></li>
						<li class="list-inline-item separetor">|</li>
						<li class="list-inline-item"><a href="javascript:void(0)" data-toggle="modal" data-target="#loginModalLong"><i data-feather="log-in" width="12px"></i> Login</a></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="header-brand">
			<div class="container">
				<nav class="navbar navbar-light">
					<a class="navbar-brand" href="<?php echo site_url('/'); ?>">E-COMMERCE</a>
					<form class="form-inline">
						<select name="" class="form-control rounded-0 border-right-0">
							<option value="" selected>All Category</option>
							<option value="">Category One</option>
							<option value="">Category One</option>
							<option value="">Category One</option>
						</select>
						<input class="form-control rounded-0" type="text" placeholder="Search" aria-label="Search">
						<button class="btn btn-secondary rounded-0" type="submit"><i data-feather="search" width="16px"></i></button>
					</form>
					<ul class="list-inline m-0">
						<li class="list-inline-item">
							<a href="<?php echo site_url('/cart'); ?>">
								<i data-feather="shopping-cart" width="15px"></i> 
								<span>My Cart</span>
								<span class="total-items"><?php echo $this->cart->total_items(); ?></span>
							</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</header>

	<div class="main-menu">
		<div class="container">
			<nav class="nav d-flex justify-content-between">
				<a class="p-2" href="#">World</a>
				<a class="p-2" href="#">U.S.</a>
				<a class="p-2" href="#">Technology</a>
				<a class="p-2" href="#">Design</a>
				<a class="p-2" href="#">Culture</a>
				<a class="p-2" href="#">Business</a>
				<a class="p-2" href="#">Politics</a>
				<a class="p-2" href="#">Opinion</a>
				<a class="p-2" href="#">Science</a>
				<a class="p-2" href="#">Health</a>
				<a class="p-2" href="#">Style</a>
				<a class="p-2" href="#">Travel</a>
			</nav>
		</div>
	</div>

	<main role="main">

		<section class="page-header p-3">
			<div class="container">
				<h4 class="page-heading">Product</h4>
				<ul class="list-inline">
					<li class="list-inline-item"><a href="/">Home</a></li>
					<li class="list-inline-item">/</li>
					<li class="list-inline-item"><a href="/">Shop</a></li>
					<li class="list-inline-item">/</li>
					<li class="list-inline-item"><a href="/">Product</a></li>
				</ul>
			</div>
		</section>

		<div class="products-area py-5 bg-light">
			<div class="container">

                <div class="row">
                    <div class="col-md-4 order-md-2 mb-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="">Your cart</span>
                            <span class="badge badge-secondary badge-pill"><?php echo $this->cart->total_items(); ?></span>
                        </h4>
                        <ul class="list-group mb-3">

                            <?php foreach ($this->cart->contents() as $items) : ?>
                                <li class="list-group-item d-flex justify-content-between rounded-0">
                                    <div>
                                        <h6 class="my-0"><?php echo $items['name']; ?></h6>
                                        <small class="text-muted">Quantity: <?php echo $items['qty']; ?></small>
                                    </div>
                                    <span class="text-muted">$<?php echo $this->cart->format_number($items['price']); ?></span>
                                </li>
                            <?php endforeach; ?>

                            <li class="list-group-item d-flex justify-content-between rounded-0">
                                <span>Total (USD)</span>
                                <strong>$<?php echo $this->cart->format_number($this->cart->total()); ?></strong>
                            </li>
                        </ul>

                        <div class="d-block my-3 bg-white border p-4">
                            <h4 class="mb-3">Payment</h4>
                            <div class="d-block my-3">
                                <div class="custom-control custom-radio">
                                    <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
                                    <label class="custom-control-label" for="credit">Credit card</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="">
                                    <label class="custom-control-label" for="debit">Debit card</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="">
                                    <label class="custom-control-label" for="paypal">PayPal</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                <label for="cc-name">Name on card</label>
                                <input type="text" class="form-control rounded-0" id="cc-name" placeholder="" required="">
                                <small class="text-muted">Full name as displayed on card</small>
                                <div class="invalid-feedback">
                                    Name on card is required
                                </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                <label for="cc-number">Credit card number</label>
                                <input type="text" class="form-control rounded-0" id="cc-number" placeholder="" required="">
                                <div class="invalid-feedback">
                                    Credit card number is required
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="cc-expiration">Expiration</label>
                                    <input type="text" class="form-control rounded-0" id="cc-expiration" placeholder="" required="">
                                    <div class="invalid-feedback">
                                        Expiration date required
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="cc-cvv">CVV</label>
                                    <input type="text" class="form-control rounded-0" id="cc-cvv" placeholder="" required="">
                                    <div class="invalid-feedback">
                                        Security code required
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-8 order-md-1">
                        <h4 class="mb-3">Billing address</h4>
                        <form class="needs-validation" novalidate="">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                            <label for="firstName">First name</label>
                            <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                            </div>
                            <div class="col-md-6 mb-3">
                            <label for="lastName">Last name</label>
                            <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="username">Username</label>
                            <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">@</span>
                            </div>
                            <input type="text" class="form-control" id="username" placeholder="Username" required="">
                            <div class="invalid-feedback" style="width: 100%;">
                                Your username is required.
                            </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email">Email <span class="text-muted">(Optional)</span></label>
                            <input type="email" class="form-control" id="email" placeholder="you@example.com">
                            <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="">
                            <div class="invalid-feedback">
                            Please enter your shipping address.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                            <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                        </div>

                        <div class="row">
                            <div class="col-md-5 mb-3">
                            <label for="country">Country</label>
                            <select class="custom-select d-block w-100" id="country" required="">
                                <option value="">Choose...</option>
                                <option>United States</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                            </div>
                            <div class="col-md-4 mb-3">
                            <label for="state">State</label>
                            <select class="custom-select d-block w-100" id="state" required="">
                                <option value="">Choose...</option>
                                <option>California</option>
                            </select>
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                            </div>
                            <div class="col-md-3 mb-3">
                            <label for="zip">Zip</label>
                            <input type="text" class="form-control" id="zip" placeholder="" required="">
                            <div class="invalid-feedback">
                                Zip code required.
                            </div>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="same-address">
                            <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="save-info">
                            <label class="custom-control-label" for="save-info">Save this information for next time</label>
                        </div>

                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
                        </form>
                    </div>
                </div>

			</div>
		</div>

	</main>

	<footer class="text-muted">
		<div class="container">
			<p class="float-right">
				<a href="#"><i data-feather="arrow-up-circle" color="gray"></i></a>
			</p>
			<p>&copy; 2018 - 2019, All right reserved.</p>
		</div>
	</footer>

	<!-- MODAL: LOGIN AND REGISTER -->
	<?php //include_once('modals/register.php'); ?>
	<?php //include_once('modals/login.php'); ?>

	<!-- Bootstrap core JavaScript
	================================================== -->
	<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/popper.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/holder.min.js'); ?>"></script>

	<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
	<script>
		feather.replace()
	</script>

</body>

</html>
