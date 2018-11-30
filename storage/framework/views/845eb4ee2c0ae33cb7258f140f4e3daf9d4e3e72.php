<?php $__env->startSection('content'); ?>


    <div class="panel">
        <div class="example-wrap">


            <div class="example table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th rowspan="2">Ташкилотлар номи</th>
                        <th rowspan="2">БПТ раислари сони</th>
                        <th rowspan="2">Шундан,аёллар</th>
                        <th colspan="2">Маълумоти</th>
                        <th colspan="5">Ёши</th>
                    </tr>
                    <tr>
                        <td>Олий</td>
                        <td>ўрта</td>
                        <td>30 Ёшгача</td>
                        <td>30-45</td>
                        <td>45-55</td>
                        <td>55-60</td>
                        <td>60 ёшдан юқори</td>
                    </tr>


                    </thead>
                    <tbody>

                    <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td> <?php echo e($report->region_name); ?> <?php echo e($report->district_name); ?></td>
                            <td>
                                <?php echo e($report->lscount); ?>

                            </td>
                            <td>
                                <?php echo e($report->sxcount); ?>

                            </td>

                            <td>
                                <?php echo e($report->spccountoliy); ?>

                            </td>
                            <td>
                                <?php echo e($report->spccounturta); ?>

                            </td>

                            <td>
                                <?php echo e($report->age30); ?>

                            </td>
                            <td>
                                <?php echo e($report->age3040); ?>

                            </td>
                            <td>
                                <?php echo e($report->age4555); ?>

                            </td>
                            <td>
                                <?php echo e($report->age5560); ?>

                            </td>
                            <td>
                                <?php echo e($report->age60); ?>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>