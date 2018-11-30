<?php $__env->startSection('content'); ?>
    <div class="panel">
    <div class="page animsition">

    <div class="page-content">

    <div class="documents-wrap articles">
        <ul class="blocks blocks-100 blocks-xlg-4 blocks-md-3 blocks-xs-2" data-plugin="matchHeight">
            <li>
                <div class="articles-item">
                    <i class="icon md-file" aria-hidden="true"></i>
                    <h4 class="title"><a href="<?php echo e(url('reports/indexbptcheif')); ?>">БПТ раислари таркиби тўғрисида</a></h4>

                </div>
            </li>
            <li>
                <div class="articles-item">
                    <i class="icon md-file" aria-hidden="true"></i>
                    <h4 class="title"><a href="<?php echo e(url('reports/indexbtpcount')); ?>">БПТлари сони тўғрисида</a></h4>
                </div>
            </li>
            
                
                    
                    
                
            
            <li>
                <div class="articles-item">
                    <i class="icon md-file" aria-hidden="true"></i>
                    <h4 class="title"><a href="<?php echo e(url('reports/indexbtpinfo')); ?>">БПТлари тўғрисида</a></h4>
                </div>
            </li>
            <li>
                <div class="articles-item">
                    <i class="icon md-file" aria-hidden="true"></i>
                    <h4 class="title"><a href="<?php echo e(url('reports/indexxdpinfo')); ?>">Партия аъзолигига қабул бўйича</a></h4>
                </div>
            </li>
            <li>
                <div class="articles-item">
                    <i class="icon md-file" aria-hidden="true"></i>
                    <h4 class="title"><a href="<?php echo e(url('reports/indexbptspecial')); ?>">БПТларнинг соҳалардаги тақсимот бўйича</a></h4>
                </div>
            </li>

        </ul>
    </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>