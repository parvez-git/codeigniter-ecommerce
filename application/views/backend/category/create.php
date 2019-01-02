<?php include_once __DIR__ . '/../header.php'; ?>
<?php include_once __DIR__ . '/../sidebar.php'; ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h3 text-secondary text-uppercase">Create Category</h1>
		<div class="btn-toolbar mb-2 mb-md-0">
			<a href="<?php echo base_url('dashboard/category'); ?>" class="btn btn-sm btn-outline-secondary rounded-0">
				<span data-feather="arrow-left"></span> 
				<span>Back<span>
			</a>
		</div>
	</div>

	<div class="form-section">
        <?php echo form_open(base_url('dashboard/category/store')); ?>
            <div class="form-group row">
                <label for="catname" class="col-sm-2 col-form-label font-weight-bold text-uppercase">Category Name:</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control rounded-0" id="catname">
                    <small class="text-danger"><?php echo form_error('name'); ?></small>
                </div>
            </div>

            <div class="form-group row">
                <span class="col-sm-2"></span>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-info rounded-0">create</button>
                </div>
            </div>
        <?php echo form_close(); ?>
	</div>
</main>

<?php include_once __DIR__ . '/../footer.php'; ?>
