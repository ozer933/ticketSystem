<?php echo $__env->make('adminpanel.adminpanelmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="content-mid">
    <div class="jumbotron">
        <div class="middle-content">
            <div class="">


                <label><strong>Son Açılan 10 Ticket </strong></label>
                <hr>
                <table id="example2" class="display" style="width:100%; ">
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

                    <?php $__currentLoopData = $getHastagFindTicket; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>

                            <td><?php echo e($Ticket->subject); ?></td>
                            <td><?php echo e($Ticket->question_description); ?></td>
                            <td><?php echo e($Ticket->emergency_status); ?></td>
                            <td><?php echo e($Ticket->transaction_status); ?></td>
                            <td>
                                <a href="/adminpanel/ticket-edit/<?php echo e($Ticket->id); ?>" class="btn btn-success">Yanıtla</a>
                                <a   onclick="return confirm('Emin misiniz ? ');" href="/adminpanel/ticket-delete/<?php echo e($Ticket->id); ?>" class="btn btn-danger">Sil</a>
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

</html><?php /**PATH /mnt/c/www/ticketsystemlocal/resources/views/adminpanel/keywordfindticket.blade.php ENDPATH**/ ?>