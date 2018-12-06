<!DOCTYPE html>
<html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Chat Board</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <script src="<?php echo base_url() ?>js/jquery.min.js" type="text/javascript"></script>
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/demo.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/style.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/animate-custom.css" />
    </head>
    <body>
        <div class="container">
            <header>    
                <h1>User Dashboard</h1>
                <p>Welcome, <?php echo $this->session->userdata('username'); ?></p><br>
                <a href="<?php echo base_url().'login/logout'; ?>">Logout</a>
            </header>
            <section>				
                <div id="container_demo">
                    <div style="margin-left: 15px;">
                        <h1><b>All Users</b></h1><br>
                        <?php $i=1; foreach ($userData as $eachuser) { ?>
                            <h2><a href="javascript:void(0);" onclick="show_user_chatbox('<?php echo $eachuser['user_id']; ?>');"><?php echo $i.'  '.$eachuser['username']; ?></a></h2><br>
                        <?php $i++; } ?>
                    </div>
                    <div id="userchat">
                        
                    </div>
                    <div id="wrapper">
                        <div class="animate form">        
                        <!-- <?php foreach ($chatData as $value) { ?>
                            <h2><b><?php echo $value['username']; ?></b></h2>
                            <h2 style="text-align: right;"><?php echo $value['created_date'] ?></h2>
                            <h5><?php echo $value['message']; ?></h5><br>
                        <?php } ?>
                        <br>
                        <textarea id="message"  style="width: 100%;"></textarea>
                        <span style="color: brown;"></span>
                        <p class="login button"><input class="save_message" type="button" value="Send" /></p> -->
                        </div>

                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>
<script type="text/javascript">
    $('.save_message').click(function(){

        $('#msg_error').html();
        var message = $('#message').val();
        if(message==""){
            $('#msg_error').html('Please enter message');
            return false;
        }

        $.ajax({
            url : "<?php echo base_url('login/save_message'); ?>",
            data : { message : message },
            type : "POST",
            success : function(re){
                //alert(re); return;
                if(re=="success"){
                    setTimeout(function(){
                        window.location.href = 'http://localhost/avesh/login/chatbox';
                    },100);
                }
            }
        });
    });

    function show_user_chatbox(sender_id)
    {
       $.ajax({
            url : "<?php echo base_url('login/show_user_chatbox'); ?>",
            data : { sender_id : sender_id },
            type : "POST",
            success : function(re){
                //alert(re);
                $('#wrapper').html(re);
                
            }
        }); 
    }
</script>




