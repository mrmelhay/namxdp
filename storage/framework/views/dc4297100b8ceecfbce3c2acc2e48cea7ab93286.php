<?php $__env->startSection('content'); ?>
    <div class="panel">
        <div class="page-header">
            <div>
                <div class="btn-group" role="group" aria-label="...">
                    <button class="btn btn-primary btn-md" onclick="window.location='<?php echo e(url('users/create')); ?>';">+ Фойдаланувчи қўшиш</button>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th><input type="checkbox"  name="region" id="region" /></th>
                    <th>№</th>
                    <th>Ф.И.О</th>
                    <th>Email</th>
                    <th>Мавқе</th>
                    <th>Худуди</th>
                    <th>А'зо бўлган сана</th>
                    <th>Амаллар</th>
                </thead>
                <tbody>
                <?php if(isset($users)): ?>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><input type="checkbox" value="<?php echo e($user->id); ?>" class="selectable-item" name="region[]" id="region[]" /></td>
                            <td><a href="<?php echo e(url('/users/'.$user->id)); ?>/edit"><?php echo e($user->id); ?></a></td>
                            <td><?php echo e($user->name); ?></td>
                            <td><?php echo e($user->email); ?></td>
                            <td><?php echo e($user->role->role_name); ?></td>
                            <td><?php echo e($user->region_id==null?($user->district_id==null)?'Супер Админ':$user->district->district_name:$user->region->region_name); ?></td>
                            <td><?php  \Carbon\Carbon::setLocale('uz'); $date = \Carbon\Carbon::now();echo $user->created_at->diffForHumans($date);  ?></td>
                            <td>
                                <a href="<?php echo e(url('/users/'.$user->id)); ?>/edit"><i class="fa fa-pencil"></i></a>&nbsp;
                                <a onclick="document.getElementById('deleteForm').submit()"><i class="fa fa-trash"></i></a>

                                <form method="post" id="deleteForm" action="<?php echo e(url('users/'.$user->id)); ?>">
                                    <?php echo e(csrf_field()); ?><?php echo e(method_field('DELETE')); ?>

                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                <?php if(isset($regions)): ?>

                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>