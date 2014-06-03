<div id="contentBackground">
        <div id="forgotpass" style="min-height: 200px; padding: 20px; margin: 0px;">
            <p class="sucessmsg">
                                    <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}
                                echo validation_errors(); ?> </p>
            <?php echo form_open('view/authenticate_user'); ?>
            <p>Email :</p>
            <input type="email" placeholder="Email" class="placeholder" pattern="[\w-\.]+@([\w-]+\.)+[\w-]{2,4}" name="email" size="35" required/>
            <input type="submit" id="submitMe" value="Reset My Password">
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
</div>