<?php echo $__env->make('adminpanel.adminpanelmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<style>
    .color td {
        background-color: #5cb85c;
        color: white !important;
        font-weight: bolder;
    }

    th {
        color: black!important;
        font-weight: bolder;
    }

    table {
        border-color: #ccc;
        border: 1px solid #ccc;
    }

    body td {
        color: black!important;
    }
</style>
<div class="content-mid">
    <div class="jumbotron">
        <div class="middle-content">
            <div class="">



            </div>
            <div class="">
                <hr>
                <label><strong>Açtığınız Ticketlar </strong></label>
                <hr>
                <table id="example" class="display" style="width:100%; ">
                    <thead>
                    <tr>
                        <th>Konu</th>
                        <th>Açıklama</th>
                        <th>Aciliyet</th>
                        <th>Durumu</th>
                        <th>İşlem</th>

                    </tr>
                    </thead>
                    <tbody>

                    <?php $__currentLoopData = $ticketList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>

                            <td><?php echo e($value->subject); ?></td>
                            <td><?php echo e($value->question_description); ?></td>
                            <td><?php echo e($value->emergency_status); ?></td>
                            <td><?php echo e($value->transaction_status); ?></td>
                            <td>
                                <a href="/adminpanel/ticket-edit/<?php echo e($value->id); ?>" class="btn btn-success">Yanıtla</a>
                                <a onclick="return confirm('Emin misiniz ? ');" href="/adminpanel/ticket-delete/<?php echo e($value->id); ?>" class="btn btn-danger">Sil</a>
                            </td>


                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Konu</th>
                        <th>Açıklama</th>
                        <th>Aciliyet</th>
                        <th>Durumu</th>
                        <th>İşlem</th>

                    </tr>
                    </tfoot>
                </table>
            </div>

            <hr>



            <!-- start content_slider -->

            </section>
            <!--Section: Live preview-->

        </div>

        <script>
            $('#example').dataTable();
            $('#example2').dataTable();
        </script>
    </div>
    <div class="clearfix"> </div>
</div>
<!----->
<div class="content-bottom">
    <div class="col-md-6 post-top"> </div>
    <div class="clearfix"> </div>
</div>
<!--//content-->
<!---->
</div>
<div class="clearfix"> </div>
</div>
</div>
<?php echo $__env->make('adminpanel.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;

</body>

</html><?php /**PATH /mnt/c/www/ticketsystemlocal/resources/views/adminpanel/userTicketList.blade.php ENDPATH**/ ?>