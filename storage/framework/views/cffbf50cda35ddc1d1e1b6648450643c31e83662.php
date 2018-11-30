<?php $__env->startSection('content'); ?>

    <div class="page-main panel">
        <?php if(count($notes) > 0): ?>
            <div class="page-content page-content-table">
                <div style="padding: 27px;">
                    <span style="margin-right: 6px;border-bottom: 0 solid #4caf50;border-left: 15px solid #4caf50;"></span><small>-  Оддий ахборот;</small>
                    <span style="margin-right: 6px;border-bottom: 0 solid #fbbdc4;border-left: 15px solid #fbbdc4;"></span><small>-  Огохлантириш;</small>
                    <span style="margin-right: 6px;border-bottom: 0 solid #ffe0b2;border-left: 15px solid #ffe0b2;"></span><small>-  Янги хат;</small>
                </div>
                <table class="table is-indent tablesaw" data-tablesaw-mode="stack" data-plugin="animateList"
                       data-animate="fade" data-child="tr" data-selectable="selectable">
                    <thead>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(\Illuminate\Support\Facades\Auth::user()->role_id!=3): ?>
                            <tr data-url="panel.tpl" data-toggle="slidePanel">
                                <td class=""><?php echo e($loop->iteration); ?></td>
                                <?php   $gp = array();   ?>
                                <?php if($note->markAs->count() != 0): ?>
                                    <?php $__currentLoopData = $note->markAs->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mark): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php   array_push($gp,$mark->reader_id);   ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td class="<?php echo e(in_array($user__id,$gp)?'':'alert alert-warning'); ?>">
                                        <p style="color: black;"><?php echo $note->message; ?></p>
                                    </td>
                                <?php else: ?>
                                    <td class="alert alert-warning">
                                        <p style="color: black;"><?php echo $note->message; ?></p>
                                    </td>
                                <?php endif; ?>
                                <td class="alert alert-<?php echo e(($note->message_type_id==1)?'success':'danger'); ?>"><?php echo e(($note->message_type_id==1)?'Ахборот':'Огохлантириш'); ?></td>
                                <td class=""><?php echo e($note->created_at->diffForHumans()); ?></td>
                                <td class=""><?php echo e(($note->sender_role_id==3)?'Республика':'Вилоят'); ?></td>
                            </tr>
                            <?php 
                                if($note->markAs->count() === 0){
                                    $data1['note_id'] = $note->id;
                                    $data1['sender_id'] = $note->sender_id;
                                    $data1['sender_role_id'] = $note->sender_role_id;
                                    $data1['is_read'] = 1;
                                    $data1['reader_id'] = $user__id;
                                    $data2[]=$data1;
                                    \App\MarkNotesAsRead::insert($data2);
                                }else{
                                $cd = \App\MarkNotesAsRead::where(['note_id' => $note->id,'reader_id' => $user__id]);
                                    if($cd->count()===0){
                                        $data1['note_id'] = $note->id;
                                        $data1['sender_id'] = $note->sender_id;
                                        $data1['sender_role_id'] = $note->sender_role_id;
                                        $data1['is_read'] = 1;
                                        $data1['reader_id'] = $user__id;
                                        $data2[]=$data1;
                                        \App\MarkNotesAsRead::insert($data2);
                                    }
                                }
                             ?>
                        <?php else: ?>
                            <tr data-url="panel.tpl" data-toggle="slidePanel">
                                <td class=""><?php echo e($loop->iteration); ?></td>
                                    <td class="">
                                        <p style="color: black;"><?php echo $note->message; ?></p>
                                    </td>
                                <td class="alert alert-<?php echo e(($note->message_type_id==1)?'success':'danger'); ?>"><?php echo e(($note->message_type_id==1)?'Ахборот':'Огохлантириш'); ?></td>
                                <td class=""><?php echo e($note->created_at->diffForHumans()); ?></td>
                                <td class=""><?php echo e(($note->sender_role_id==3)?'Республика':'Вилоят'); ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <div class="text-center"><?php echo e($notes->links()); ?></div>
            </div>
        <?php endif; ?>
    </div>
    <script type="text/javascript" src="<?php echo e(asset('js/loading.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>