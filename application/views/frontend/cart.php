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
                    <div class="col-md-12 table-responsive">
                        <table class="table table-bordered table-light">
                            <thead>
                                <tr class="text-uppercase text-center">
                                    <th scope="col">
                                        <form action="<?php echo base_url('cart/destroy_cart'); ?>" method="post">
                                            <button type="submit" class="btn btn-sm btn-light rounded-0 text-danger"><i data-feather="x-circle"></i></button>
                                        </form>
                                    </th>
                                    <th scope="col" width="100px">Image</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col" width="200px">Quantity</th>
                                    <th scope="col">Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($this->cart->contents() as $items) : ?>
                                <tr>
                                    <th class="align-middle text-center" scope="row">
                                        <form action="<?php echo base_url('cart/remove_cart'); ?>" method="post">
                                            <input type="hidden" name="rowid" value="<?php echo $items['rowid']; ?>">
                                            <button type="submit" class="btn btn-sm btn-light rounded-0 text-muted"><i data-feather="x-circle"></i></button>
                                        </form>
                                    </th>

                                    <td class="align-middle">
                                        <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>
                                            <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>
                                                <img class="img-fluid rounded-0" src="<?php echo base_url('uploads/').$option_value; ?>" alt="<?php echo $option_name; ?>">
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </td>

                                    <td class="align-middle">
                                        <?php echo $items['name']; ?>
                                    </td>

                                    <td class="align-middle text-center">
                                        $<?php echo $this->cart->format_number($items['price']); ?>
                                    </td>

                                    <td class="align-middle text-center">
                                        <form class="form-inline" action="<?php echo base_url('cart/update_cart'); ?>" method="post">
                                            <input type="hidden" name="rowid" value="<?php echo $items['rowid']; ?>">
                                            <input type="number" name="qty" value="<?php echo $items['qty']; ?>" class="form-control rounded-0 w-50" min="0">
                                            <button type="submit" class="btn btn-default rounded-0 w-50">Update</button>
                                        </form>
                                    </td>
                                    <td class="align-middle text-center">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
                                </tr>
                                <?php endforeach; ?>
								<tr>
									<td class="text-right" colspan="5"><strong>Total (USD) :</strong></td>
									<td class="text-center"><strong>$<?php echo $this->cart->format_number($this->cart->total()); ?></strong></td>
								</tr>
                            </tbody>
                        </table>
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
