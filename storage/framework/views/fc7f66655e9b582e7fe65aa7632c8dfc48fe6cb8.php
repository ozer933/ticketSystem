 <?php echo $__env->make('adminpanel.adminpanelmaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="content-mid">
    <div class="jumbotron">
        <div class="middle-content">

                <form action="/adminpanel/ticket-add" method="post" autocomplete="off">
                    <?php echo csrf_field(); ?>

                <label>
                    <strong>Konu giriniz</strong>
                </label>
                <input class="form-control"  name="subject" type="text" placeholder="Konu giriniz" required/>
                <label>
                    <strong>Aciliyet durumu</strong>
                </label>
                <select class="form-control date" name="emergencyStatus"> <?php $__currentLoopData = $emergencyStatusData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emergency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <option value="<?php echo e($emergency); ?>"><?php echo e($emergency); ?></option> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <label>
                    <strong>Açıklama giriniz</strong>
                </label>
                <textarea name="content" class="form-control textareaa" placeholder="Açıklama giriniz" id="exampleFormControlTextarea1"></textarea>
                <label>
                    <strong>Tag giriniz</strong>
                </label>
                <input class="form-control " name="tags"  type="text" placeholder="Aralarına virgül koyarak tagları giriniz. Örn: Php,Laravel,MYSQL,MSSQL " required/>



                <input type="submit" value="TİCKET DÜZENLE" class="btn btn-success " name="list" style="width: 100%; font-weight: bolder;" />
            </form>
            <!-- start content_slider -->
            </section>
            <!--Section: Live preview-->
        </div>
    </div>
</div>
 <?php echo $__env->make('adminpanel.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
</body>
</html><?php /**PATH /mnt/c/www/ticketsystemlocal/resources/views/adminpanel/ticketadd.blade.php ENDPATH**/ ?>