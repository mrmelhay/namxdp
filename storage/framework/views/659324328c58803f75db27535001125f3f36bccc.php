<?php $__env->startSection('content'); ?>

    <div class="page-main panel">
        <div class="page-header">
            <div>
                <div class="btn-group" role="group" aria-label="...">
                    <button class="btn btn-primary btn-md" onclick="window.location='<?php echo e(url('membership/create')); ?>';">+ Аъзо қўшиш</button>
                    <button class="btn btn-warning btn-md" id="editBtn"> <span id="countt"></span> <span style="font-size: 11px;" class="glyphicon glyphicon-pencil"></span> Ўзгартириш</button>
                    <button class="btn btn-default btn-md" id="pensionerButton"> <span id="counp"></span> Пенсия</button>
                    <button class="btn btn-default btn-md" id="feeButton"> <span id="counb"></span> Бадал</button>
                    <button class="btn btn-danger btn-md" id="deleteBpt"><span id="count"></span> <span style="font-size: 11px;" class="glyphicon glyphicon-trash"></span> Аъзоликдан чиқариш</button>
                    <button class="btn btn-default btn-md" onclick="window.location='<?php echo e(url('arxiv')); ?>'">Архив</button>
                    <a class="btn btn-default btn-md" target="_blank" href="<?php echo e(url('export/member')); ?>">Экспорт</a>
                    <button class="btn btn-info btn-md" id="count_records"> <span id="coun"></span> та танланди</button>
                </div>
            </div>
        </div>
        <div class="page-content page-content-table">
            <table class="table is-indent tablesaw" data-tablesaw-mode="stack" data-plugin="animateList"
                   data-animate="fade" data-child="tr" data-selectable="selectable">
                <thead>
                <tr>
                    <form action="<?php echo e(route('search')); ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                        <th class="pre-cell"></th>
                        <th class="cell-30" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3"></th>
                        <th class="cell-300" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">
                            <input class="form-control" name="fullName" type="text"></th>
                        <th class="cell-300" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">

                        <th class="cell-300" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">
                            <select name="bpt_id" data-plugin="select2">
                                <option disabled selected>БПТ номи</option>
                                <?php $__currentLoopData = $bpts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bpt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($bpt->bpt_id); ?>"><?php echo e($bpt->bpt_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </th>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4"><input class="form-control" name="unionJoinDate" type="text" data-provide="datepicker"></th>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4"><input class="form-control" name="birthday" type="text" data-provide="datepicker"></th>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">
                            <select  data-plugin="select2"  name="isFeePaid">
                                <option disabled selected>Бадал</option>
                                <option value="1">Тўлайди</option>
                                <option value="0">Тўламайди</option>
                            </select></th>
                        <th class="suf-cell"></th>

                        <th style="border: none;"><button type="submit" class="btn btn-default"><i class="fa-search"> </i></button></th>
                        <th style="border: none;"><button type="submit" class="btn btn-default"><i class="fa-filter"> </i></button></th>
                        <input type="hidden" name="key" value="_member">
                    </form>
                </tr>
                <tr>
                    <th class="pre-cell"></th>
                    <th class="" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">
                    </th>
                    <th class="" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">Ф.И.О</th>
                    <th class="" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">Сурати</th>
                    <th class="" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">БПТ номи</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">Аъзолик санаси</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">Туғилган санаси</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">Бадал</th>

                    <th class="suf-cell"></th>
                    <th class="suf-cell"></th>
                </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr data-url="panel.tpl" data-toggle="slidePanel">
                            <td class="pre-cell"></td>
                            <td class="">
                                <span class="checkbox-custom checkbox-primary checkbox-lg">
                                    <input type="checkbox" class="contacts-checkbox selectable-item" id="contacts_<?php echo e($member->id); ?>"/>
                                    <label for="contacts_<?php echo e($member->id); ?>"></label>
                                </span>
                            </td>
                            <td class="">
                                <?php echo e($member->fullName); ?>

                            </td>
                            <td class="">
                                <img style="width: 50px;" src="<?php echo e(asset('store/members/'.$member->photo->photo_path)); ?>" alt="">
                            </td>
                            <td class=""><?php echo e($member->bpt->bpt_name); ?></td>
                            <td class=""><?php echo e($member->unionJoinDate); ?></td>
                            <td class=""><?php echo e($member->birthday); ?></td>
                            <td class="piad"><?php echo e(($member->isFeePaid==0)?'Тўламайди':'Тўлайди'); ?></td>
                            <td></td>
                            <td class="suf-cell"></td>
                            <td class="suf-cell"></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="text-center"><?php echo e($members->links()); ?></div>
        </div>
    </div>
    <!-- Button trigger modal -->
    <button type="button" style="display: none;" class="btn btn-primary btn-lg" id="btnModal" data-toggle="modal" data-target="#myModal"></button>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">А'золарни бадалдан озод етиш тўгрисида ма'лумотлар</h4>
                </div>
                <form id="feeSubmit" onsubmit="return false">
                <div class="modal-body">
                    <input id="feeDate" name="feeDate" required="required" class="form-control" type="text" data-provide="datepicker" placeholder="Озод этиш санаси"><br>
                    <textarea id="feeReason" name="feeReason" required="required"  class="form-control" cols="30">Озод этиш сабаби</textarea><br>
                </div>
                <div class="modal-footer">
                    <button type="button" id="closeFee" class="btn btn-default" data-dismiss="modal">Бекор қилиш</button>
                    <button type="submit" class="btn btn-primary">Тасдиқлаш</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->
    <button type="button" style="display: none;" class="btn btn-primary btn-lg" id="btnModalD" data-toggle="modal" data-target="#myModalD"></button>
    <!-- Modal -->
    <div class="modal fade" id="myModalD" tabindex="99999" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">А'зони ўчириш тўгрисида ма'лумотлар</h4>
                </div>
                <form id="feeSubmitD" onsubmit="return false">
                    <div class="modal-body">
                    <input id="feeDate" name="feeDate" required="required" class="form-control" type="text" data-provide="datepicker" placeholder="Ўчириш санаси"><br><br>
                        <select name="feeReason_id" id="feeReason_id" class="form-control" >
                            <?php $__currentLoopData = $reasons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reason): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($reason->reason_id); ?>"><?php echo e($reason->reason_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                <div class="modal-footer">
                    <button type="button" id="closeDee" class="btn btn-default" data-dismiss="modal">Бекор қилиш</button>
                    <button type="submit" class="btn btn-primary">Тасдиқлаш</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <button type="button" style="display: none;" class="btn btn-primary btn-lg" id="btnModalP" data-toggle="modal" data-target="#myModalP"></button>
    <!-- Modal -->
    <div class="modal fade" id="myModalP" tabindex="99999" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">А'зони нафақага тайинлаш тўгрисида ма'лумотлар</h4>
                </div>
                <form id="feeSubmitP" onsubmit="return false">
                    <div class="modal-body">
                    <input id="feeDate" name="feeDate" required="required" class="form-control" type="text" data-provide="datepicker" placeholder="Нафақага чиқиш санаси"><br><br>
                    </div>
                <div class="modal-footer">
                    <button type="button" id="closePee" class="btn btn-default" data-dismiss="modal">Бекор қилиш</button>
                    <button type="submit" class="btn btn-primary">Тасдиқлаш</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo e(asset('vendor/jquery/jquery.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('vendor/bootstrap/bootstrap.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('vendor/bootbox/bootbox.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/loading.min.js')); ?>"></script>
    <script type="text/javascript">

        window.onload = function() {

            //------------------------------   EDIT BUTTON CLICK EVENT   -----------------------------//

            document.getElementById('editBtn').addEventListener('click' , function(e){
                e.preventDefault()
                if(data.length < 1){
                    toastr.warning('Илтимос рўйхатдагилардан бирини танланг!')
                }if(data.length > 1){
                    toastr.warning('Илтимос рўйхатдан фақат битта маълумотни танланг!')
                }if(data.length == 1){
                    var idd = data[0];
                    var ids = idd.split("contacts_");
                    window.location = '<?php echo e(url('/membership')); ?>'+'/'+ids[1]+'/edit';
                }
            })

            //------------------------------   ADD CLICK EVENT TO ALL CHECKBOXES   -----------------------------//

            var selectors = document.getElementsByClassName('contacts-checkbox');
            var editButton = document.getElementsByClassName('contacts-checkbox');
            var data = [];
            for (var i = 0; i < selectors.length; i++) {
                selectors[i].addEventListener('change', ggg);
            }

            //------------------------------   fEE BUTTON CLICK EVENT   -----------------------------//

            document.getElementById('feeButton').addEventListener('click',function (e) {
                e.preventDefault()
                if(data.length == 1){
                    var textC = document.getElementById(data[0]).parentNode.parentNode.parentNode.childNodes[15];
                    if(textC.textContent =="Тўламайди"){
                        toastr.warning('Ушбу а\'зо бадал тулашдан озод етиб бўлинган!')
                        return false;
                    }
                    document.getElementById('btnModal').click()
                    document.getElementById('feeSubmit').addEventListener('submit',function (e) {
                        e.preventDefault()
                        document.getElementById('closeFee').click()
                        H5_loading.show()
                        console.log(data[0]);
                        var xhr = new XMLHttpRequest();
                        var reason = e.target.feeReason.value
                        var dateF = e.target.feeDate.value
                        var dateD = dateF.replace("/", "-");
                        var dateS = dateD.replace("/", "-");
                        var elementD = data[0];
                        var idT = elementD.split("contacts_");
                        var g = parseInt(idT[1])
                        xhr.open('GET', '<?php echo e(url('feeSubmit')); ?>'+'/'+dateS+'/'+reason+'/'+g, true);
                        xhr.send()
                        xhr.onreadystatechange = function() {
                            if (this.readyState != 4) return;
                            if (this.status != 200) {
                                toastr.warning('Техник хатолик!')
                                H5_loading.hide()
                                return;
                            }
                            e.target.feeDate.value =''
                            e.target.feeReason.value =''
                            console.log(this.responseText)
                            toastr.success('А\'зо БАДАЛдан озод этилди!')
                            for(var t=0;t<data.length;++t){
                                var l = document.getElementById(data[t]).parentNode.parentNode.parentNode.childNodes[15];
                                l.textContent = 'Тўламайди';
                                document.getElementById('contacts_'+g).checked = false;
                            }
                            data=[];
                            document.getElementById('count_records').style.display = 'none';
                            document.getElementById('coun').innerHTML = ''
                            document.getElementById('count').innerHTML = ''
                            document.getElementById('counp').innerHTML = ''
                            document.getElementById('counb').innerHTML = ''
                            document.getElementById('countt').innerHTML = ''
                            H5_loading.hide()
                        }
                        return false;
                        H5_loading.hide()
                    })
                }else {
                    H5_loading.hide()
                    toastr.warning('Илтимос рўйхатдагилардан фақат биттасини танланг!')

                }
            })

            //------------------------------   DELETE BUTTON CLICK EVENT   -----------------------------//

            document.getElementById('deleteBpt').addEventListener('click',function(e){
                e.preventDefault()
                if(data.length==1){
                        document.getElementById('btnModalD').click()
                        document.getElementById('feeSubmitD').addEventListener('submit',function (e) {
                            e.preventDefault()
                            document.getElementById('closeDee').click()
                            H5_loading.show()
                            console.log(data[0]);
                            var xhr = new XMLHttpRequest();
                            var reason = e.target.feeReason_id.value
                            console.log(reason)
                            var dateF = e.target.feeDate.value
                            var dateD = dateF.replace("/", "-");
                            var dateS = dateD.replace("/", "-");
                            var elementD = data[0];
                            var idT = elementD.split("contacts_");
                            var g = parseInt(idT[1])
                            xhr.open('GET', '<?php echo e(url('api/deleteMember')); ?>'+'/'+dateS+'/'+reason+'/'+g, true);
                            xhr.send()
                            xhr.onreadystatechange = function() {
                                if (this.readyState != 4)  return;
                                if (this.status != 200) {
                                    toastr.warning('Техник хатолик!')
                                    H5_loading.hide()
                                    return;
                                }
                                e.target.feeDate.value =''
                                toastr.success('А\'зо ўчирилди')
                                var l = document.getElementById(data[0]).parentNode.parentNode.parentNode;
                                l.parentNode.removeChild(l)
                                document.getElementById('count_records').style.display = 'none';
                                document.getElementById('coun').innerHTML = ''
                                document.getElementById('count').innerHTML = ''
                                document.getElementById('counp').innerHTML = ''
                                document.getElementById('counb').innerHTML = ''
                                document.getElementById('countt').innerHTML = ''
                                data=[];
                                H5_loading.hide()
                            }
                            return false;
                            H5_loading.hide()
                        })
                }else{
                    H5_loading.hide()
                    toastr.warning('Илтимос рўйхатдагилардан фақат биттасини танланг!')
                }
            })

            //------------------------------   PENSIONER BUTTON CLICK EVENT   -----------------------------//

            document.getElementById('pensionerButton').addEventListener('click',function(e){
                e.preventDefault()
                if(data.length==1){
                        document.getElementById('btnModalP').click()
                        document.getElementById('feeSubmitP').addEventListener('submit',function (e) {
                            e.preventDefault()
                            document.getElementById('closePee').click()
                            H5_loading.show()
                            var xhr = new XMLHttpRequest();
                            var dateF = e.target.feeDate.value
                            var dateD = dateF.replace("/", "-");
                            var dateS = dateD.replace("/", "-");
                            var elementD = data[0];
                            var idT = elementD.split("contacts_");
                            var g = parseInt(idT[1])
                            xhr.open('GET', '<?php echo e(url('api/markMemberAsPensioner')); ?>'+'/'+dateS+'/'+g, true);
                            xhr.send()
                            xhr.onreadystatechange = function() {
                                if (this.readyState != 4) return;
                                if (this.status != 200) {
                                    toastr.warning('Техник хатолик!')
                                    H5_loading.hide()
                                    return;
                                }
                                var j = JSON.parse(this.responseText)
                                if(j.data==2){
                                    toastr.warning('А\'зо аввалроқ нафақага чиқарилган!')
                                    H5_loading.hide()
                                    return false;
                                }
                                document.getElementById(data[0]).checked = false;
                                e.target.feeDate.value =''
                                toastr.success('А\'зога нафақа тайинланди')
                                document.getElementById('count_records').style.display = 'none';
                                document.getElementById('coun').innerHTML = ''
                                document.getElementById('count').innerHTML = ''
                                document.getElementById('counp').innerHTML = ''
                                document.getElementById('counb').innerHTML = ''
                                document.getElementById('countt').innerHTML = ''
                                data=[];
                                H5_loading.hide()
                            }
                            return false;
                            H5_loading.hide()
                        })
                }else{
                    H5_loading.hide()
                    toastr.warning('Илтимос рўйхатдагилардан фақат биттасини танланг!')
                }
            })

            //------------------------------   DISPLAY COUNT OF SELECTED ELEMENTS EVENT   -----------------------------//

            function ggg(e) {
                if (e.target.checked) {
                    data.push(e.target.id)
                } else {
                    data.splice(data.indexOf(e.target.id), 1)
                }
                if(data.length){
                    document.getElementById('count_records').style.display = 'block';
                    document.getElementById('count').innerHTML = '('+data.length+')'
                    document.getElementById('counb').innerHTML = '('+data.length+')'
                    document.getElementById('counp').innerHTML = '('+data.length+')'
                    document.getElementById('countt').innerHTML = '('+data.length+')'
                    document.getElementById('coun').innerHTML = data.length
                }else{
                    document.getElementById('count_records').style.display = 'none';
                    document.getElementById('counp').innerHTML = ''
                    document.getElementById('coun').innerHTML = ''
                    document.getElementById('counb').innerHTML = ''
                    document.getElementById('count').innerHTML = ''
                    document.getElementById('countt').innerHTML = ''
                }
            }
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>