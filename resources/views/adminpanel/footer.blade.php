<!---->
<!--scrolling js-->
<script src="/panel2/js/bootstrap.min.js"></script>
<script src="/public/panel2/js/jquery.nicescroll.js"></script>
<script src="/public/panel2/js/scripts.js"></script>
<!--//scrolling js-->
<script src="/public/datetime/node_modules/php-date-formatter/js/php-date-formatter.min.js"></script>
<script src="/public/datetime/node_modules/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="/public/datetime/jquery.datetimepicker.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script>
    $.datetimepicker.setLocale('tr');
    $('#datetimepicker_mask2').datetimepicker({
        lang: 'tr',
        timepicker: false,
        format: 'd-m-Y',
        step: 5,
        scrollMonth: false
    });
    $('#datetimepicker_mask33').datetimepicker({
        lang: 'tr',
        timepicker: false,
        format: 'd-m-Y',
        step: 5,
        scrollMonth: false
    });
</script>

