<?php include_once __DIR__ . '/../header.php'; ?>
<?php include_once __DIR__ . '/../sidebar.php'; ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
		<h1 class="h3 text-secondary text-uppercase">Categories</h1>
		<div class="btn-toolbar mb-2 mb-md-0">
			<a href="<?php echo base_url('dashboard/category/create'); ?>" class="btn btn-sm btn-outline-success rounded-0">
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
					<th>Name</th>
					<th>Slug</th>
					<th>Date</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($categories as $category): ?>
				<tr>
					<td><?php echo $category->id; ?>.</td>
					<td><?php echo $category->name; ?></td>
					<td><?php echo $category->slug; ?></td>
					<td><?php echo $category->created_at; ?></td>
					<td>
						<a class="text-info border border-info p-1"><span data-feather="edit"><span></a>
						<a class="text-danger border border-danger p-1"><span data-feather="trash-2"><span></a>
					</td>
				</tr>
				<?php endforeach;?>
            </tbody>
		</table>
	</div>
</main>

<?php include_once __DIR__ . '/../footer.php'; ?>
