<?php $__env->startSection('content'); ?>
    <div class="panel">
        <div class="example-wrap">
            <div class="example table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th rowspan="2">Туман(шахар) кенгаши номи</th>
                        <th rowspan="2">БПТ умумий сони</th>
                        <th colspan="6">Шу жумладан</th>
                    </tr>
                    <tr>
                        <td>Махалла фуқаролар йиғини</td>
                        <td>Ишлаб чиқариш</td>
                        <td>Қишлоқ хўжалиги</td>
                        <td>Хизмат кўрсатиш</td>
                        <td>Соғлиқни сақлаш</td>
                        <td>Бошқа соха</td>
                    </tr>


                    </thead>
                    <tbody>

                    <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td> <?php echo e($report->bpt_name); ?></td>
                            <td> <?php echo e($report->bptcount); ?></td>
                            <td> <?php echo e($report->bpt_mfy); ?></td>
                            <td> <?php echo e($report->ishlabchiqarish); ?></td>
                            <td> <?php echo e($report->qishloq); ?></td>
                            <td> <?php echo e($report->xizmat); ?></td>
                            <td> <?php echo e($report->sogliq); ?></td>
                            <td> 0</td>

                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>