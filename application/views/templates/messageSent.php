<?php
if (isset($query)) {
    foreach ($query as $data) {
        $to = $data->user_email;
        $token = $data->user_auth_key;
    }
}
?>

<div id="contentBackground">
    <div id="forgotpass" style="min-height: 200px; padding: 20px; margin: 0px;">

        <p>click the following link to reset your password <a style="color: #000;" href="<?php echo base_url(); ?>index.php/view/resetPassword?id=<?php echo $to; ?>&&resetPassword=<?php echo $token; ?>">RESET PASSWORD</a></p>
    </div>
</div>
</div>
</div>








