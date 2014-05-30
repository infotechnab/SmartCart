<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">

        <title>
            <?php
            if ($meta) {
                $i = 0;
                foreach ($meta as $data) {
                    $meta_data[$i] = $data->value;
                    $i++;
                }
            }

            foreach ($headertitle as $header) {
                $title = $header->description;
                // echo $title;
            }

            if (isset($pageTitle)) {
                echo $pageTitle . "-" . $title;
            } else {
                echo $pageTitle = $title;
            }
            ?>
        </title>

        <script src="<?php echo base_url() . 'content/jquery.js'; ?>" type="text/javascript"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" media="only screen" href="<?php echo base_url() . "content/uploads/styles/styles.css"; ?>" type="text/css">     
        <link rel="shortcut icon" href="<?php echo base_url() . 'content/uploads/images/' . $meta_data[4]; ?>" type="image/x-icon">

        <link rel="shortcut icon" href="<?php echo base_url() . "content/uploads/images/favicon1.jpg"; ?>" type="image/x-icon"> 
        <script src="<?php echo base_url() . 'content/uploads/scripts/jquery-placeholder.js'; ?>" type="text/javascript"></script>



        <meta name="title" content="Smart Access Services">
        <meta name="description" content="Smart Access Services">
        <meta name="keywords" content="Shopping cart, Cart, Jackek, Smart Access Services">
    </head>

    <body>

        <div id="fb-root"></div>
        <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>

        <div id="fb-root"></div>
        <script>
            window.fbAsyncInit = function() {
                FB.init({
                    appId: '798589833503780',
                    status: true, // check login status
                    cookie: true, // enable cookies to allow the server to access the session
                    xfbml: true  // parse XFBML
                });

                // Here we subscribe to the auth.authResponseChange JavaScript event. This event is fired
                // for any authentication related change, such as login, logout or session refresh. This means that
                // whenever someone who was previously logged out tries to log in again, the correct case below 
                // will be handled. 
                FB.Event.subscribe('auth.authResponseChange', function(response) {
                    // Here we specify what we do with the response anytime this event occurs. 
                    if (response.status === 'connected') {
                        // The response object is returned with a status field that lets the app know the current
                        // login status of the person. In this case, we're handling the situation where they 
                        // have logged in to the app.
                        testAPI();
                    } else if (response.status === 'not_authorized') {
                        // In this case, the person is logged into Facebook, but not into the app, so we call
                        // FB.login() to prompt them to do so. 
                        // In real-life usage, you wouldn't want to immediately prompt someone to login 
                        // like this, for two reasons:
                        // (1) JavaScript created popup windows are blocked by most browsers unless they 
                        // result from direct interaction from people using the app (such as a mouse click)
                        // (2) it is a bad experience to be continually prompted to login upon page load.
                        FB.login();
                    } else {
                        // In this case, the person is not logged into Facebook, so we call the login() 
                        // function to prompt them to do so. Note that at this stage there is no indication
                        // of whether they are logged into the app. If they aren't then they'll see the Login
                        // dialog right after they log in to Facebook. 
                        // The same caveats as above apply to the FB.login() call here.
                        FB.login();
                    }
                });
            };

            // Load the SDK asynchronously
            (function(d) {
                var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
                if (d.getElementById(id)) {
                    return;
                }
                js = d.createElement('script');
                js.id = id;
                js.async = true;
                js.src = "//connect.facebook.net/en_US/all.js";
                ref.parentNode.insertBefore(js, ref);
            }(document));

            // Here we run a very simple test of the Graph API after login is successful. 
            // This testAPI() function is only called in those cases. 
            function testAPI() {
                console.log('Welcome!  Fetching your information.... ');
                FB.api('/me', function(response) {
                    console.log('Good to see you, ' + response.name + '.');
                });
            }
        </script>
<script>
// This adds 'placeholder' to the items listed in the jQuery .support object. 
jQuery(function() {
   jQuery.support.placeholder = false;
   test = document.createElement('input');
   if('placeholder' in test) jQuery.support.placeholder = true;
});
// This adds placeholder support to browsers that wouldn't otherwise support it. 
$(function() {
   if(!$.support.placeholder) {
       alert('here');
      var active = document.activeElement;
      $(':text').focus(function () {
         if ($(this).attr('placeholder') != '' && $(this).val() == $(this).attr('placeholder')) {
            $(this).val('').removeClass('hasPlaceholder');
         }
      }).blur(function () {
         if ($(this).attr('placeholder') != '' && ($(this).val() == '' || $(this).val() == $(this).attr('placeholder'))) {
            $(this).val($(this).attr('placeholder')).addClass('hasPlaceholder');
         }
      });
      $(':text').blur();
      $(active).focus();
      $('form:eq(0)').submit(function () {
         $(':text.hasPlaceholder').val('');
      });
   }
});
</script>
        <div id="container">
            <div id="headerBackground">
                <div id="headerContent">
                    <?php foreach ($headerlogo as $header) {
                        ?>
                        <div id="headerLogo">
                            <img src="<?php echo base_url() . 'content/uploads/images/' . $header->description; ?>" alt="Smartaservices logo"/>
                        </div>
                    <?php } ?>

                    <?php foreach ($headerdescription as $header) {
                        ?>
                        <div id="headerLogoContent">
                            <h1><?php echo $header->description; ?></h1>
                        </div>
                     <?php  if ($this->session->userdata('logged_in')){ ?>
            <div id="signupHeader" style="min-width: 15%; float: right;">
                            <div style="border-radius: 3px; padding: 5px; min-width:40%; text-align: center; margin: 15% 1% 0% 1.5%; float: left; background-color: #6fa5e2; color: #000;"><?php echo $this->session->userdata ('username'); ?></div>
                            <div style="border-radius: 3px; padding: 5px; min-width:40%; text-align: center; margin: 15% 1% 0% 1.5%; float: left; background-color: #f61938; color: #000;"><?php echo anchor('view/logout','Log Out') ?></div>
                        </div>
            <?php }
            else{ ?>
                <div id="signupHeader" style="width: 15%; float: right;">
                            <div style="border-radius: 3px; padding: 5px; min-width:40%; text-align: center; margin: 15% 1% 0% 1.5%; float: left; background-color: #6fa5e2; color: #000;"><?php echo anchor('view/homeLogin', 'login') ?></div>
                            <div style="border-radius: 3px; padding: 5px; min-width:40%; text-align: center; margin: 15% 1% 0% 1.5%; float: left; background-color: #f61938; color: #000;"><?php echo anchor('view/homeLogin', 'signup') ?></div>
                        </div>
         <?php   }
                 } ?>  
                    <div class="clear"></div>