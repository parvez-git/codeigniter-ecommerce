<div class="modal fade" id="registerModalLong" tabindex="-1" role="dialog" aria-labelledby="registerModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLongTitle">Register</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?php echo form_open('users/register'); ?>

            <div class="modal-body">
                <div class="form-group">
                    <label for="regname">Full Name</label>
                    <input type="text" name="name" class="form-control rounded-0" id="regname" value="<?php echo set_value('name'); ?>">
                    <small class="text-danger"><?php echo form_error('name'); ?></small>
                </div>
                <div class="form-group">
                    <label for="regemail">Email Address</label>
                    <input type="email" name="email" class="form-control rounded-0" id="regemail" value="<?php echo set_value('email'); ?>">
                    <small class="text-danger"><?php echo form_error('email'); ?></small>
                </div>
                <div class="form-group">
                    <label for="regpass">Password</label>
                    <input type="password" name="password" class="form-control rounded-0" id="regpass" value="<?php echo set_value('password'); ?>">
                    <small class="text-danger"><?php echo form_error('password'); ?></small>
                </div>
                <div class="form-group">
                    <label for="regpassconf">Password Confirmation</label>
                    <input type="password" name="passconf" class="form-control rounded-0" id="regpassconf">
                    <small class="text-danger"><?php echo form_error('passconf'); ?></small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary rounded-0">Register</button>
            </div>

            <?php echo form_close(); ?>

        </div>
    </div>
</div>