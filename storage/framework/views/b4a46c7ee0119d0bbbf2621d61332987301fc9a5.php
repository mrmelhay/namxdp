<?php $__env->startSection('content'); ?>
    <div class="panel">
        <div class="example-wrap">
            <div class="example table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th rowspan="2">Ташкилотлар номи</th>
                        <th rowspan="2">БПТлар сони</th>
                        <th rowspan="2">Ундаги партия аъзолар сони</th>
                        <th rowspan="2">БПТлардаги ўртача партия аъзолари сони</th>
                        <th colspan="7">Шундан,бошлангич партия ташкилотлардаги аъзолар сони</th>
                    </tr>
                    <tr>
                        <td>3 нафардан 5тагача</td>
                        <td>5 нафардан 15 тагача</td>
                        <td>15 нафардан 25 тагача</td>
                        <td>25 нафардан 40 тагача</td>
                        <td>40 нафардан 60 гача</td>
                        <td>60 нафардан 100 тагача</td>
                        <td>100 нафардан юқори</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php 
                            $_3_5 = 0;
                            $_0_3 = 0;
                            $_5_15 = 0;
                            $_15_25 = 0;
                            $_25_40 = 0;
                            $_40_60 = 0;
                            $_60_100 = 0;
                            $_100_ = 0;
                         ?>
                        <?php 
                            $cd = \App\BPT::where('bpt_region_id' , $report->regionId)->get();
                            foreach ($cd as $k){
                                $c = $k->members->count();
                                if($c > 2 && $c < 6){
                                    $_3_5++;
                                }if($c > 5 && $c < 16){
                                    $_5_15++;
                                }if($c > 15 && $c < 26){
                                    $_15_25++;
                                }if($c > 25 && $c < 41){
                                    $_25_40++;
                                }if($c > 40 && $c < 61){
                                    $_40_60++;
                                }if($c > 60 && $c < 101){
                                    $_60_100++;
                                }if($c > 100){
                                    $_100_++;
                                }
                            }
                         ?>
                        <tr>
                            <td> <?php echo e($report->region_name); ?> <?php echo e((isset($report->district_name))?$report->district_name:''); ?></td>
                            <td> <?php echo e($report->bptcount); ?></td>
                            <td> <?php echo e($report->ismember); ?></td>
                            <td> <?php echo e(round($report->ismember/$report->bptcount)); ?></td>
                            <td> <?php echo e(round($_3_5)); ?></td>
                            <td> <?php echo e(round($_5_15)); ?></td>
                            <td> <?php echo e(round($_15_25)); ?></td>
                            <td> <?php echo e(round($_25_40)); ?></td>
                            <td> <?php echo e(round($_40_60)); ?></td>
                            <td> <?php echo e(round($_60_100)); ?></td>
                            <td> <?php echo e(round($_100_)); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>