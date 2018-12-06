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
                <h1>Registration Form </h1>
            </header>
            <section>				
                <div id="container_demo">
                    <div id="wrapper">
                        <div id="" class="animate form">
                            <span style="color: brown;"><?php if(isset($msg)) echo $msg; ?></span>
                            <div style="color: brown;"><?php echo validation_errors(); ?></div>  

                            <?php echo form_open('login/signup_page'); ?>
                                <h1> Sign up </h1> 
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Username</label>
                                    <input type="text" name="username" value="<?php echo set_value('username'); ?>" size="50" placeholder="Username" />
                                </p>
                                <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" > Your email</label>
                                    <input id="emailsignup" name="email" type="email" value="<?php echo set_value('email'); ?>" placeholder="mysupermail@mail.com"/> 
                                </p>
                                    <h5>Password</h5>
                                    <input name="password" type="text" placeholder="eg. X8df!90EO" value="<?php echo set_value('password'); ?>" />
                                
                                    <h5>Password Confirm</h5>
                                    <input name="passconf" type="text" placeholder="eg. X8df!90EO" value="<?php echo set_value('passconf'); ?>" />
                                
                                <p class="signin button"> 
									<input type="submit" value="Sign up"/> 
								</p>
                                <p class="change_link">  
									Already a member ?
									<a href="<?php echo base_url().'login/login_page' ?>" class="to_register"> Go and log in </a>
								</p>
                            </form>
                        </div>
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>