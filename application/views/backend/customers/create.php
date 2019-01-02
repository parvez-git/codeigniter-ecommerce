<?php include_once __DIR__ . '/../header.php'; ?>
<?php include_once __DIR__ . '/../sidebar.php'; ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h3 text-secondary text-uppercase">Create User</h1>
		<div class="btn-toolbar mb-2 mb-md-0">
			<a href="<?php echo base_url('dashboard/customers'); ?>" class="btn btn-sm btn-outline-secondary rounded-0">
				<span data-feather="arrow-left"></span> 
				<span>Back<span>
			</a>
		</div>
	</div>

	<div class="form-section">
        <?php echo form_open(base_url('dashboard/customers/store')); ?>
            <div class="form-group row">
                <label for="customername" class="col-sm-2 col-form-label font-weight-bold text-uppercase">User Name:</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control rounded-0" id="customername">
                    <small class="text-danger"><?php echo form_error('name'); ?></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="customeremail" class="col-sm-2 col-form-label font-weight-bold text-uppercase">User Email:</label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control rounded-0" id="customeremail">
                    <small class="text-danger"><?php echo form_error('email'); ?></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="customerpassword" class="col-sm-2 col-form-label font-weight-bold text-uppercase">User Password:</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control rounded-0" id="customerpassword">
                    <small class="text-danger"><?php echo form_error('password'); ?></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="customerpasswordconf" class="col-sm-2 col-form-label font-weight-bold text-uppercase">Password Confirmation:</label>
                <div class="col-sm-10">
                    <input type="password" name="passwordconf" class="form-control rounded-0" id="customerpasswordconf">
                    <small class="text-danger"><?php echo form_error('passwordconf'); ?></small>
                </div>
            </div>

            <div class="form-group row">
                <span class="col-sm-2"></span>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-info rounded-0">
                        <span data-feather="send"></span>
                        <span class="text-uppercase">create</span>
                    </button>
                </div>
            </div>
        <?php echo form_close(); ?>
	</div>
</main>

<?php include_once __DIR__ . '/../footer.php'; ?>
