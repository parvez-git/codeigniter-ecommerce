<?php include_once __DIR__ . '/../header.php'; ?>
<?php include_once __DIR__ . '/../sidebar.php'; ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
		<h1 class="h3 text-secondary text-uppercase">Customers</h1>
		<div class="btn-toolbar mb-2 mb-md-0">
            <a href="<?php echo base_url('dashboard/customers/create'); ?>" class="btn btn-sm btn-outline-success rounded-0">
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
					<th>Email</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($customers as $customer): ?>
				<tr>
					<td>
						<?php echo $customer->id; ?>
					</td>
					<td>
						<?php echo $customer->name; ?>
					</td>
					<td>
						<?php echo $customer->email; ?>
					</td>
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
