<?php $__env->startSection('content'); ?>
    <div class="page animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
        <div class="page-content">
            <div class="page-brand-info">
                <div class="brand">
                    <img class="brand-img" src="<?php echo e(asset('images/logo_new.png')); ?>" alt="...">
                    <h2 class="brand-text font-size-40">ХАЛҚ ДЕМОКРАТИК ПАРТИЯСИ</h2>
                </div>
            </div>
            <div class="page-login-main">
                <div class="brand visible-xs">
                    <img class="brand-img" src="<?php echo e(asset('images/logo_new.png')); ?>" alt="...">
                    <h3 class="brand-text font-size-40">ХАЛҚ ДЕМОКРАТИК ПАРТИЯСИ</h3>
                </div>
                <h3 class="font-size-24">Тизимга кириш</h3>

                <form method="post" action="<?php echo e(route('login')); ?>" autocomplete="off" >
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group form-material floating">
                        <input type="email" class="form-control empty" id="inputEmail" name="email" value="<?php echo e(old('email')); ?>">
                        <label class="floating-label" for="inputEmail">Е-mail</label>
                        <?php if(isset($errors) && $errors->has('email')): ?>
                            <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                        <?php endif; ?>
                    </div>
                    <div class="form-group form-material floating">
                        <input type="password" class="form-control empty" id="inputPassword" name="password">
                        <label class="floating-label" for="inputPassword">Пароль</label>
                        <?php if(isset($errors) && $errors->has('password')): ?>
                            <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Кириш</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>