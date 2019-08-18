<?php echo $__env->make('adminpanel.adminpanelmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php error_reporting(0) ?>
<div class="col-md-12">
    <button class="togglee btn btn-success float-right " style="margin: 5px;">Yanıtla</button> <span class="float-right" style="margin: 5px;"><button class="btn btn-success">Aciliyet:<?php echo e($activeEmergencyStatus); ?> </button> <button class="btn btn-success"> Ticket Durumu:  <?php echo e($activeTransactionStatus); ?></button></span> </div>
<div class="clearfix"></div>
<script>
    $(document).ready(function() {
        $(".togglee").click(function() {
            $(".middle-content").toggle(200);
        });
    });
</script>
<div class="content-mid">
    <div>
        <div class="middle-content" style="display: none;">
            <input class="form-control" value="<?php echo e($selectedTicket->first()->subject); ?>" disabled/>
            <form action="/adminpanel/ticket-edit/<?php echo e($selectedTicket->first()->id); ?>" method="post" name="list" autocomplete="off" style="margin-bottom:15px;"> <?php echo csrf_field(); ?>
                <label>Yanıtlama Kutusu</label>
                <textarea name="reply" id="editor"> </textarea>
                <script>
                    editor.isReadOnly = false;
                    ClassicEditor.create(document.querySelector('#editor')).catch(error => {
                        console.error(error);
                    });
                    ClassicEditor.create(document.querySelector('#editor2')).catch(error => {
                        console.error(error);
                    });
                </script>
                <label> <strong>Ticket Durumu</strong> </label>
                <select class="form-control date" name="ticketStatus"> <?php $__currentLoopData = $ticketStatusData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticketStatus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($ticketStatus); ?>" <?php if($activeTransactionStatus==$ticketStatus): ?> selected <?php endif; ?>><?php echo e($ticketStatus); ?></option> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </select>
                <div style="height: 10px"></div>
                <input type="submit" value="YANITLA" class="btn btn-success testsend" name="list" style="width: 100%; font-weight: bolder;" /> </form>
            <!-- start content_slider -->
            </section>
            <!--Section: Live preview-->
        </div>
    </div> <?php $__currentLoopData = $subTicketList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subTicket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="ticketBox">
            <div class="col-md-12 ticketTitle"> <i class="fas fa-user fontsize26"></i> <?php echo e($subTicket->name); ?>

                <div class="float-right"><?php echo e(date('d-m-Y H:i:s',strtotime($subTicket->inserted_at))); ?></div>
            </div>
            <div class="col-md-12" style="color:black;"> <?php echo e(strip_tags($subTicket->reply)); ?> </div>
        </div> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <div class="ticketBox">
        <div class="col-md-12 ticketTitle" > <i class="fas fa-user" style="font-size:26px;"></i> <?php echo e($selectedTicket->first()->name); ?>

            <div class="float-right"><?php echo e(date('d-m-Y H:i:s',strtotime($subTicket->inserted_at))); ?></div>
        </div>
        <div class="col-md-12" style="color:black;"> <?php echo e($selectedTicket->first()->question_description); ?> Tags
            <hr> </div>
    </div>
</div>
<?php echo $__env->make('adminpanel.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
</body>

</html><?php /**PATH /mnt/c/www/ticketsystemlocal/resources/views/adminpanel/ticketedit.blade.php ENDPATH**/ ?>