<!DOCTYPE html>
<html>

<head>
    <title>Online</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./../fonts/css/all.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #17a2b8;
            height: 100vh;
        }

        #login .container #login-row #login-column #login-box {
            margin-top: 70px;
            max-width: 500px;
            height: 470px;
            border: 1px solid #9C9C9C;
            background-color: #EAEAEA;
        }

        #login .container #login-row #login-column #login-box #login-form {
            padding: 50px;
        }

        /* #login .container #login-row #login-column #login-box #login-form #register-link {
            margin-top: 85px;
        } */

        /* .text-right {
            margin-left: 60%;
        } */
    </style>
</head>
<body>
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="<?php echo base_url('user')?>" method="post">
                            <img src="./storage/admin.png" width="25%" alt="" style="border-radius: 20px;margin-left: 130px;margin-bottom: 20px;">

                            

                            <h3 class="text-center text-info">User Login</h3>

                            <?php if( $this->session->flashdata( 'message' ) ) { ?>
                                            <span style="color:#F00; font-size:12px; font-weight:bold; text-align:center;">
                                                <?php echo $this->session->flashdata( 'message' ); ?>
                                            </span> 
                                        <?php  }else if( $this->session->flashdata( 'messages' ) ) { ?>
                                            <span style="color:green; font-size:12px; font-weight:bold; text-align:center;">
                                                <?php echo $this->session->flashdata( 'messages' ); ?>
                                            </span> 
                                        <?php  }else{ ?>
                                  
                 <?php } //print_r($this->session->all_userdata());?>
                                        <?php if(isset($error)) echo $error;?>
                            <div class="form-group">
                                <label for="username" class="text-info">Email:</label><br>
                                <input type="text" name="user_email" id="user_email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <!-- <div class="form-group">
                                
                                <label for="remember-me" class="">
    <button class="btn btn-info" style="margin-right: 260px;" 
            onclick="window.location.href='<?php echo base_url('user/registration') ?>';">
        <span>Click to Register</span>
    </button>
</label>

                                
                        
                                
                                <input type="submit" name="Submit" value="submit" class="btn btn-info" style="margin-left: 260px;"/>
                            
                            </div> -->
                            <div class="form-group" style="display: flex; justify-content: space-between; align-items: center;">
    <!-- Registration button -->
    <button class="btn btn-info">
<a href="#" onclick="reg_link()" style="color: white; text-decoration: none;">
        <span>Click to Register</span>
    </a>
</button>
    
    <!-- Submit button -->
    <input type="submit" name="Submit" value="submit" class="btn btn-info"/>
</div>                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

  <script type="text/javascript">

   var url = "<?php echo base_url('user/registration'); ?>";

   function reg_link(){

    //alert();
    window.open('<?php echo base_url('user/registration'); ?>');

//window.location.href = '<?php echo base_url('user/registration'); ?>';
   }

</script>
