<!DOCTYPE html>
<html class="no-js css-menubar" lang="<?php echo e(app()->getLocale()); ?>">
<?php echo $__env->make('commons.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body class="site-navbar-small dashboard layout-boxed">
<!--[if lt IE 8]>
<p class="browserupgrade">Вы используюте <strong>устаревший</strong> браузер. Обновите <a href="http://browsehappy.com/">Ваш браузер</a> для лучшей работы сайта.</p>
<![endif]-->
<?php echo $__env->make('commons.navigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="page">
    <div class="page-content container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
</div>

<?php echo $__env->make('commons.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('commons.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>