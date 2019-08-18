<!DOCTYPE HTML>
<html>

<head>
    <title>Ticket System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="/panel2/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <link href="/panel2/css/style.css" rel='stylesheet' type='text/css' />
    <link href="/panel2/css/font-awesome.css" rel="stylesheet">
    <script src="/panel2/js/jquery.min.js"></script>
    <link rel="stylesheet" href="/css/ticketSyle.css">
    <link rel="stylesheet" href="/css/ticketSyle.css">
    <!-- Custom and plugin javascript -->

    <script src="/panel2/js/screenfull.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">

    <!-- DATE TİME PİCKER -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.1/moment.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/locale/tr.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel='stylesheet' type='text/css' />
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="/public/datetime/jquery.datetimepicker.css" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/12.3.1/classic/ckeditor.js"></script>
</head>

<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> <a class="navbar-brand" href="/adminpanel/welcome" style="margin-left:5px;"><i class="fas fa-chart-pie"></i><strong><span style="font-size:15px;"> Turkuaz Media Ticket System</span></strong></a> </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        User <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/adminpanel/ticket-add">Ticket Ekle</a></li>
                        <li><a href="/adminpanel/user-ticket-list">Açtığınız Ticketler</a></li>
                    </ul>
                </li>
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Admin <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/adminpanel/welcome">Ticketları Listele</a></li>
                    </ul>
                </li>
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Hesabım <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/logout">Oturumu Kapat</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav><?php /**PATH /mnt/c/www/ticketsystemlocal/resources/views/adminpanel/adminpanelmaster.blade.php ENDPATH**/ ?>