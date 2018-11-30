<?php $__env->startSection('content'); ?>
    <div class="panel">
        <div class="page-header">
            <div>
                <div class="btn-group" role="group" aria-label="...">
                    <button class="btn btn-primary btn-md" onclick="window.location='<?php echo e(url('bpt/create')); ?>';">+ Бпт қўшиш</button>
                    <a class="btn btn-default btn-md" target="_blank" href="<?php echo e(url('export/bpt')); ?>">Экспорт</a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <form action="<?php echo e(route('search')); ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                        <th class="cell-30" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3"></th>
                        <th class="cell-300" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">
                            <input class="form-control" name="bpt_name" placeholder="БПТ номи" type="text"/>
                        </th>
                        <th class="cell-300" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">
                            <select name="bpt_speciality_id" id="bpt_speciality_id" data-plugin="select2">
                                <option disabled selected>Соҳани танлаш</option>
                                <?php $__currentLoopData = $bpt_specs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bpt_spec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($bpt_spec->id); ?>"><?php echo e($bpt_spec->bpt_spec_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </th>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">
                            <select  data-plugin="select2"  name="isFeePaid">
                                <option disabled selected>М.Ф.Й</option>
                                <option value="1">М.Ф.Й</option>
                                <option value="0">М.Ф.Й эмас</option>
                            </select>
                        </th>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">
                            <select class="form-control" data-plugin="select2" onchange="getDistrict(this)" name="bpt_region_id" name="" id="">
                                <option disabled selected>Вилоят</option>
                                <?php $__currentLoopData = $regions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $region): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($region->region_id); ?>"><?php echo e($region->region_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </th>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">
                            <select name="bpt_district_id" data-plugin="select2" class="form-control" id="response">
                                <option selected disabled>Туман</option>
                            </select>
                        </th>
                        <th class="suf-cell">
                            <input class="form-control" name="bpt_address" placeholder="БПТ манзили" type="text">
                        </th>
                        <th class="suf-cell">
                            <select class="form-control" data-plugin="select2" name="bpt_party_id" id="">
                                <option disabled selected>Партия номи</option>
                                <?php $__currentLoopData = $councils; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $council): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($council->party_id); ?>"><?php echo e($council->party_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </th>
                        <th style="border: none;"><button type="submit" class="btn btn-default"><i class="fa-search"> </i></button></th>
                        <th style="border: none;"><button type="submit" class="btn btn-default"><i class="fa-filter"> </i></button></th>
                        <input type="hidden" name="key" value="_bpt">
                    </form>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>БПТ номи</th>
                    <th>БПТ соҳаси</th>
                    <th>БПТ ташкил топган сана</th>
                    <th>МФЙми?</th>
                    <th>БПТ вилояти</th>
                    <th>БПТ тумани</th>
                    <th>БПТ манзили</th>
                    <th>Партия номи</th>
                    <th>Амаллар</th>
                    <th></th>
                </thead>
                <tbody>
                <?php $__currentLoopData = $bpts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bpt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><a href="<?php echo e(url('/bpt/'.$bpt->bpt_id)); ?>/edit"><?php echo e($bpt->bpt_id); ?></a></td>
                        <td><?php echo e($bpt->bpt_name); ?></td>
                        <td><?php echo e($bpt->spec->bpt_spec_name); ?></td>
                        <td><?php echo e($bpt->bpt_establish_date); ?></td>
                        <td><?php echo e(($bpt->bpt_is_mfy)?'M.F.Y':'Yo\'q'); ?></td>
                        <td><?php echo e($bpt->region->region_name); ?></td>
                        <td><?php echo e($bpt->district->district_name); ?></td>
                        <td><?php echo e($bpt->bpt_address); ?></td>
                        <td><?php echo e($bpt->party->party_name); ?></td>
                        <td>
                            <a href="<?php echo e(url('/bpt/'.$bpt->bpt_id)); ?>/edit"><i class="fa fa-pencil"></i></a>&nbsp;
                            <a onclick="document.getElementById('deleteForm').submit()"><i class="fa fa-trash"></i></a>

                            <form method="post" id="deleteForm" action="<?php echo e(url('bpt/'.$bpt->bpt_id)); ?>">
                                <?php echo e(csrf_field()); ?><?php echo e(method_field('DELETE')); ?>

                                <input type="hidden" name="bpt_id" value="<?php echo e($bpt->bpt_id); ?>">
                            </form>
                        </td>
                        <td></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        function getDistrict(select){
            var xhttp = new XMLHttpRequest();


            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var data = JSON.parse(this.responseText);


                    var textP;
                    for(var i=0; i<data.districts.length; ++i){
                        textP += '<option value="'+ data.districts[i].district_id +'">'+ data.districts[i].district_name +'</option>';
                    }
                    document.getElementById('response').innerHTML = textP;
                }
            };
            xhttp.open("GET", '<?php echo e(url('api/getDistricts/')); ?>/'+select.value, true);
            xhttp.send();
        }
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>