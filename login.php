<!DOCTYPE html>
<html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Registration</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/demo.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/style.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/animate-custom.css" />
    </head>
    <body>
        <div class="container">
            <header>
                <h1>Login Form </h1>
            </header>
            <section>				
                <div id="container_demo" >
                    <div id="wrapper">
                        <div class="animate form">
                                <span style="color: brown;"><?php if(isset($msg)) echo $msg; ?></span>
                                <div style="color: brown;"><?php echo validation_errors(); ?></div>  

                                <?php echo form_open('login/login_page'); ?>
                                    <h5>Username</h5>
                                    <input name="username" value="<?php echo set_value('username'); ?>" type="text" placeholder="mymail@mail.com"/>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Password </label>
                                    <input id="password" name="password" value="<?php echo set_value('password'); ?>" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                                <p class="login button"> 
                                    <input type="submit" value="Login" /> 
								</p>
                                <p class="change_link">
									Not a member yet ?
									<a href="<?php echo base_url().'login/signup_page' ?>" class="to_register">Sign Up</a>
								</p>
                            <!-- </form> -->
                        </div>

                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>