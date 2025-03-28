<!DOCTYPE html>
<html>

<head>
    <title>Online</title>
    <meta charset="utf-8">
    <!-- <link rel="stylesheet" href="./../fonts/css/all.css"> -->
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
        }

        #login .container #login-row #login-column #login-box {
            margin-top: 60px;
            max-width: 500px;
            height: 800px;
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
                        <form  class="form" action="<?php echo base_url('user/registration')?>" method="post">
                            
                            <h3 class="text-center text-info">User Registration</h3>
                            <?php if( $this->session->flashdata( 'success_message' ) ) { ?>
                                            <span style="color:green; font-size:12px; font-weight:bold; text-align:center;">
                                                <?php echo $this->session->flashdata( 'success_message' ); ?>
                                            </span> 
                                        <?php  }?>

                            <div class="form-group">
                                <label for="firstname" class="text-info">First name:</label><br>
                                <input type="text" name="firstname" id="firstname" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="lastname" class="text-info">Last name:</label><br>
                                <input type="text" name="lastname" id="lastname" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="mobile" class="text-info">Mobile:</label><br>
                                <input type="number" name="mobile" id="mobile" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-info">Email:</label><br>
                                <input type="text" name="email" id="email" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" value="" class="form-control">
                            </div>
                             <div class="form-group">
                             	<label for="remember-me" class="text-info"><span> Male</span> 
                             		<span><input  name="gender" value="male" checked type="radio"></span>
                                </label>
                                <label for="remember-me" class="text-info"><span> Female</span> 
                             		<span><input  name="gender" value="female" type="radio"></span>
                                </label>
                             </div>
                             <div class="form-group">
                             	<label for="address" class="text-info"><span> Address:</span> 
                                </label>

                             </div>
                             <div class="form-group">
                             	
                                <textarea rows="4" cols="45" id="address" name="address" value="" type="textarea"></textarea> 
                             </div>
                            <div class="form-group">
                                
                                <label for="remember-me" class="text-info"> 
                                    <a  style="text-decoration: underline;" href="<?php echo base_url('user')?>">
                                        <span>Back to Login</span>
                                    </a>
                                </label>
                                <input type="submit" name="Submit" value="submit" class="btn btn-info" style="margin-left: 260px;"/>
                            </div>                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>