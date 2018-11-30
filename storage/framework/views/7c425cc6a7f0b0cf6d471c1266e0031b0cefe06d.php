<?php $__env->startSection('content'); ?>
    <div class="panel">
        <div class="example-wrap">
            <div class="example table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th rowspan="3" style="text-align: center;vertical-align: center">Кенгаш номи</th>
                        <th rowspan="2">Аъзолар сони</th>
                        <th rowspan="2">Ўтган ойга нисбатан</th>
                        <th rowspan="2">БПТ сони</th>
                        <th rowspan="2">Ўтган ойга нисбатан</th>
                        <th rowspan="2">Аъзоларга нисбатан БПТда ўртача сони</th>
                        <th colspan="3">Бир ойда қабул</th>
                        <th colspan="2">Шундан</th>
                        <th colspan="2">Бир ойдан хисоблан чиқарилганлар</th>
                        <th colspan="2">Шундан</th>
                        <th rowspan="2">Йил бошидан қабул</th>
                        <th colspan="2">Шундан</th>
                        <th rowspan="2">Жами хисобдан чиқарилганлар</th>
                        <th colspan="2">Шундан</th>
                        <th rowspan="2">Жами аёллар</th>
                        <th rowspan="2">Жами ёшлар</th>
                    </tr>
                    <tr>
                        <td>Жами қаубл</td>
                        <td>Янги қабул</td>
                        <td>Шундан бошқа тумандан келган</td>
                        <td>Аёллар</td>
                        <td>Ёшлар</td>
                        <td>Жами хисобдан чиқарилганлар</td>
                        <td>Шундан бошқа туманга кетган</td>
                        <td>Аёллар</td>
                        <td>Ёшлар</td>
                        <td>Аёллар</td>
                        <td>Ёшлар</td>
                        <td>Аёллар</td>
                        <td>Ёшлар</td>

                    </tr>
                    <tr>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                        <td>9</td>
                        <td>10</td>
                        <td>11</td>
                        <td>12</td>
                        <td>13</td>
                        <td>14</td>
                        <td>15</td>
                        <td>16</td>
                        <td>17</td>
                        <td>18</td>
                        <td>19</td>
                        <td>20</td>
                        <td>21</td>
                        <td>22</td>
                    </tr>


                    </thead>
                    <tbody>

                    <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td> <?php echo e($report->district_name); ?></td>
                            <td> <?php echo e($report->memcount); ?></td>
                            <td> 0</td>
                            <td> <?php echo e($report->bptcount); ?></td>
                            <td> 0</td>
                            <td> 0</td>
                            <td> 0</td>
                            <td> 0</td>
                            <td> 0</td>
                            <td> 0</td>
                            <td> 0</td>
                            <td> 0</td>
                            <td> 0</td>
                            <td> 0</td>
                            <td> 0</td>
                            <td> 0</td>
                            <td> 0</td>
                            <td> 0</td>
                            <td> 0</td>
                            <td> 0</td>
                            <td> 0</td>
                            <td> <?php echo e($report->womtotal); ?></td>
                            <td> <?php echo e($report->mentotal); ?></td>


                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>