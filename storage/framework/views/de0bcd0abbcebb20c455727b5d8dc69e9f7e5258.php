<!DOCTYPE html>
<html class="no-js css-menubar" lang="<?php echo e(app()->getLocale()); ?>">
<?php echo $__env->make('commons.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body class="page-login-v2 layout-full page-dark">

<!--[if lt IE 8]>
<p class="browserupgrade">Вы используюте <strong>устаревший</strong> браузер. Обновите <a href="http://browsehappy.com/">Ваш браузер</a> для лучшей работы сайта.</p>
<![endif]-->
<?php echo $__env->yieldContent('content'); ?>
<?php echo $__env->make('commons.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>
