<?php include_once __DIR__ . '/../header.php'; ?>
<?php include_once __DIR__ . '/../sidebar.php'; ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h3 text-secondary text-uppercase">Edit Product</h1>
		<div class="btn-toolbar mb-2 mb-md-0">
			<a href="<?php echo base_url('dashboard/products'); ?>" class="btn btn-sm btn-secondary rounded-0">
				<span data-feather="arrow-left"></span> 
				<span>Back<span>
			</a>
		</div>
	</div>

	<div class="form-section">
        <?php echo form_open_multipart(base_url('dashboard/product/update')); ?>
            <div class="row">
                <div class="col-md-8">
                    <input type="hidden" name="product_id" value="<?php echo isset($product) ? $product->id : ''; ?>">
                    <div class="form-group">
                        <label class="font-weight-bold text-uppercase">Product Name:</label>
                        <input type="text" name="name" class="form-control rounded-0" value="<?php echo isset($product) ? $product->name : ""; ?>">
                        <small class="form-text text-danger"><?php echo form_error('name'); ?></small>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold text-uppercase">Product Price:</label>
                        <input type="text" name="price" class="form-control rounded-0" value="<?php echo isset($product) ? $product->price : ''; ?>">
                        <small class="form-text text-danger"><?php echo form_error('price'); ?></small>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold text-uppercase">Product Description:</label>
                        <textarea class="form-control" name="description" id="producteditor"><?php echo isset($product) ? $product->description : ''; ?></textarea>
                        <small class="form-text text-danger"><?php echo form_error('description'); ?></small>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="font-weight-bold text-uppercase">Category:</label>
                        <select name="category_id" class="form-control rounded-0">
                            <option value="" disable selected>-- SELECT --</option>
                            <?php if (isset($categories)) : ?>
                                <?php foreach ($categories as $category) : ?>
                                <option value="<?php echo $category->id; ?>" <?php if(isset($product) && $category->id == $product->category_id){echo 'selected';} ?>>
                                    <?php echo $category->name; ?>
                                </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <small class="form-text text-danger"><?php echo form_error('category_id'); ?></small>
                    </div>
                    <div class="form-group border-bottom pb-2">
                        <label class="font-weight-bold text-uppercase">Image:</label>
                        <?php if(isset($product)) : ?>
                            <img src="<?php echo base_url('uploads/') . $product->image; ?>" class="img-fluid border mb-2">
                        <?php endif; ?>
                        <input type="file" name="image" class="form-control-file rounded-0">
                        <small class="form-text text-danger"><?php echo $this->session->flashdata('product_upload_error'); ?></small>
                    </div>

                    <button type="submit" class="btn btn-info rounded-0 mb-5">
                        <span data-feather="plus"></span>
                        <span class="text-uppercase">update</span>
                    </button>

                <?php echo form_close(); ?>
            </div>
        </div>
	</div>
</main>

<?php include_once __DIR__ . '/../footer.php'; ?>
