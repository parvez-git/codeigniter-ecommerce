<div class="modal fade" id="loginModalLong" tabindex="-1" role="dialog" aria-labelledby="loginModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLongTitle">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?php echo form_open('users/login'); ?>

            <div class="modal-body">
                <div class="form-group">
                    <?php echo form_label('Email Address', 'loginemail'); ?>
                    <?php 
                        $loginemail = array(
                            'name'          => 'email',
                            'id'            => 'loginemail',
                            'type'          => 'email',
                            'class'         => 'form-control rounded-0'
                        );
                        echo form_input($loginemail); 
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('Password', 'loginpass'); ?>
                    <?php 
                        $loginemail = array(
                            'name'          => 'password',
                            'id'            => 'loginpass',
                            'type'          => 'password',
                            'class'         => 'form-control rounded-0'
                        );
                        echo form_input($loginemail); 
                    ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal">Close</button>
                <?php 
                    $login = array(
                        'name'          => 'login',
                        'value'         => 'true',
                        'type'          => 'submit',
                        'class'         => 'btn btn-primary rounded-0',
                        'content'       => 'Login'
                    );
                    echo form_button($login);
                ?>
            </div>

            <?php echo form_close(); ?>

        </div>
    </div>
</div>