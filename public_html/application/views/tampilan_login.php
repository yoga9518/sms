<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>INSPINIA | Login</title>

        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
<script type="text/javascript">
        function cekform()
        {
            if (!$("#username").val())
            {
                alert('Maaf username tidak boleh kosong');
                $("#username").focus();
                return false;
            }
            if (!$("#password").val())
            {
                alert('Maaf password tidak boleh kosong');
                $("#password").focus();
                return false;
            }
        }
    </script>
    </head>
    
    <body class="gray-bg">

        <div class="middle-box text-center loginscreen animated fadeInDown">
            <div>


                <p>Login in. To see it in action.</p>
                <form method="post" action="<?php echo base_url();?>index.php/auth/cek_login" onSubmit="return cekform();">
                    <div class="form-group">
                        <input name="username" id="username" type="text" class="form-control" placeholder="Username" required="">
                    </div>
                    <div class="form-group">
                        <input name="password" id="password" type="password" class="form-control" placeholder="Password" required="return cekform();">
                    </div>
                    <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                    <a href="login.html#"><small>Forgot password?</small></a>
                    <p class="text-muted text-center"><small>Do not have an account?</small></p>
                    <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a>
                </form>
            </div>
        </div>

        <!-- Mainly scripts -->
        <script src="<?php echo base_url(); ?>js/jquery-2.1.1.js"></script>
        <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

    </body>

</html>
