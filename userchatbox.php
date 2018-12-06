<div class="animate form">
<h1></h1>        
<?php foreach ($chatData as $value) { ?>
    <h2><b><?php echo $value['username']; ?></b></h2>
    <h2 style="text-align: right;"><?php echo $value['created_date'] ?></h2>
    <h5><?php echo $value['message']; ?></h5><br>
<?php } ?>
<br>
<textarea id="chat_message" style="width: 100%;"></textarea>
<span id="chat_err" style="color: brown;"></span>
<p class="login button"><input class="save_user_chat" type="button" value="Send" /></p>
</div>

<script type="text/javascript">
    $('.save_user_chat').click(function(){

        $('#chat_err').html();

        var sender_id = '<?php echo $sender_id; ?>';
        var message = $('#chat_message').val();
        if(message==""){
            $('#chat_err').html('Please enter message');
            return false;
        }

        $.ajax({
            url : "<?php echo base_url('login/save_chat_message'); ?>",
            data : { message : message, sender_id : sender_id },
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
</script>
