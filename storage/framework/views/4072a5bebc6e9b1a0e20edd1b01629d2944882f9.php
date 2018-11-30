<?php $__env->startSection('content'); ?>
<div class="panel">
    <div class="example-wrap">
        <div class="example table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th >БПТ номи</th>
                    <th >БПТдаги аъзолар сони</th>
                    <th >БПТ ташкил этилган санаси</th>
                    <th >БПТ манзили</th>
                    <th >БПТ раиси Ф.И.Ш</th>
                    <th >БПТ раиснинг туғилган йили</th>
                    <th >БПТ раиснинг яшаш манзили</th>
                    <th >Маълумоти мутахассислиги қачон,<br/>қайси ўқув юртини таъмомлаган</th>
                    <th >Иш жойи, лавозими,<br/>боғланиш телефонлари</th>
                </tr>
                </thead>
                <tbody>

                <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td> <?php echo e($report->bpt_name); ?></td>
                        <td> <?php echo e($report->bpcount); ?></td>
                        <td> <?php echo e($report->esdate); ?></td>
                        <td> <?php echo e($report->bpt_address); ?></td>
                        <td> <?php echo e($report->fullName); ?></td>
                        <td> <?php echo e($report->birthday); ?></td>
                        <td> <?php echo e($report->homeaddress); ?></td>
                        <td> <?php echo e($report->specialist); ?></td>
                        <td> <?php echo e($report->workPlaceAndPosition); ?> , <?php echo e($report->phoneNumber); ?></td>

                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
            </table>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>