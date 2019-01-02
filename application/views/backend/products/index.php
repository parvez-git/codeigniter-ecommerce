<?php include_once __DIR__ . '/../header.php'; ?>
<?php include_once __DIR__ . '/../sidebar.php'; ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
		<h1 class="h3 text-secondary text-uppercase">Products</h1>
		<div class="btn-toolbar mb-2 mb-md-0">
			<a href="<?php echo base_url('dashboard/product/create'); ?>" class="btn btn-sm btn-outline-success rounded-0">
				<span data-feather="plus"></span> 
				<span>Create<span>
			</a>
		</div>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Image</th>
					<th>Name</th>
					<th>Slug</th>
					<th>Price</th>
					<th>Category</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($products as $product): ?>
				<tr>
					<td><?php echo $product->id; ?>.</td>
					<td><img class="img-fluid rounded-0 w-40-px h-20-px" src="<?php echo base_url('uploads/') . $product->image; ?>" alt="<?php echo $product->name; ?>"></td>
					<td><?php echo $product->name; ?></td>
					<td><?php echo $product->slug; ?></td>
					<td>$<?php echo $product->price; ?></td>
					<td><?php echo $product->category_name; ?></td>
					<td>
						<a href="<?php echo base_url('dashboard/product/edit/') . $product->id; ?>" class="text-info border border-info p-1"><span data-feather="edit"><span></a>
						<a href="<?php echo base_url('dashboard/product/delete/') . $product->id; ?>" class="text-danger border border-danger p-1"><span data-feather="trash-2"><span></a>
					</td>
				</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	</div>
</main>

<?php include_once __DIR__ . '/../footer.php'; ?>
