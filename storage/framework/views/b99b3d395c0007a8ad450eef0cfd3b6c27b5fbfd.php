<!DOCTYPE HTML>
<html>
<head>
    <title> Login | ArtıSubs Rapor </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom Theme files -->
    <link href="/panel2/css/style.css" rel='stylesheet' type='text/css' />
    <link href="/panel2/css/font-awesome.css" rel="stylesheet">
    <script src="/panel2/js/jquery.min.js"> </script>
    <script src="/panel2/js/bootstrap.min.js"> </script>
</head>
<style>
       body {
        color:#777!important;
    }
    h2{
        color:#777!important;
    }
</style>
<body style=" background-color:#F3F3F4;  position: absolute; top:0; right: 0; left:0; bottom:0; background-repeat: no-repeat; background-size: cover;">


<div class="" style="position: absolute; top:0px; z-index: 99999999; width: 100%; left:0px; right:0px;margin-right: auto; margin-left:auto;">
   
    <div class="login-bottom ">

        <form action="/adminpanel" method="post">
            <?php echo e(csrf_field()); ?>

            <div class="col-md-12">
                <div class="login-mail">
                    <input type="text" placeholder="Email" required="" name="email" value="<?php echo @$_POST['email'] ?>">
                    <i class="fa fa-envelope"></i>
                </div>
                <div class="login-mail">
                    <input type="password" placeholder="Password" required=""   value="" name="password" >
                    <i class="fa fa-lock"></i>
                </div>

                <div class="col-md-12 login-do" style="width: 100%;">
                    <label class="hvr-shutter-in-horizontal login-sub">
                        <input style="font-weight:400; background-color: #e7e7e7; color:#777;" type="submit" value="Oturum Aç">
                    </label>

                </div>

            </div>


            <div class="clearfix"> </div>

        </form>

    </div>


</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>


<?php /**PATH /mnt/c/www/ticketsystemlocal/resources/views/adminpanel/login.blade.php ENDPATH**/ ?>