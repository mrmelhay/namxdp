@extends('layouts.main')

@section('content')

    <div class="page-main">
        <div class="page-header">
            <div>
                <div class="btn-group" role="group" aria-label="...">
                    <button class="btn btn-primary btn-md" onclick="window.location='{{url('membership/create')}}';">+ Аъзо қўшиш</button>
                    <button class="btn btn-warning btn-md" id="editBtn"> <span id="countt"></span> <span style="font-size: 11px;" class="glyphicon glyphicon-pencil"></span> Ўзгартириш</button>
                    <button class="btn btn-default btn-md">Пенсия</button>
                    <button class="btn btn-default btn-md">Бадал</button>
                    <button class="btn btn-danger btn-md" id="deleteBpt"><span id="count"></span> <span style="font-size: 11px;" class="glyphicon glyphicon-trash"></span> Ўчириш</button>
                    <button class="btn btn-info btn-md" id="count_records"> <span id="coun"></span> та танланди</button>
                </div>
            </div>
            <div class="page-header-actions">
                <form>
                    <div class="input-search input-search-dark">
                        <i class="input-search-icon md-search" aria-hidden="true"></i>
                        <input type="text" class="form-control" name="" placeholder="Izlash...">
                    </div>
                </form>
            </div>
        </div>
        <div class="page-content page-content-table">
            <!-- Contacts -->
            <table class="table is-indent tablesaw" data-tablesaw-mode="stack" data-plugin="animateList"
                   data-animate="fade" data-child="tr" data-selectable="selectable">
                <thead>
                <tr>
                    <th class="pre-cell"></th>
                    <th class="cell-30" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">
                    </th>
                    <th class="cell-300" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">Ф.И.О</th>
                    <th class="cell-300" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">БПТ номи</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">Аъзолик санаси</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">Туғилган санаси</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">Бадал</th>
                    <th class="suf-cell"></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($members as $member)
                        <tr data-url="panel.tpl" data-toggle="slidePanel">
                            <td class="pre-cell"></td>
                            <td class="cell-30">
                                <span class="checkbox-custom checkbox-primary checkbox-lg">
                                    <input type="checkbox" class="contacts-checkbox selectable-item" id="contacts_{{$member->id}}"/>
                                    <label for="contacts_{{$member->id}}"></label>
                                </span>
                            </td>
                            <td class="cell-300">
                                {{$member->fullName}}
                            </td>
                            <td class="cell-300">{{$member->bpt->bpt_name}}</td>
                            <td class="cell-300">{{$member->unionJoinDate}}</td>
                            <td class="cell-300">{{$member->birthday}}</td>
                            <td class="cell-300">{{($member->isFeePaid==0)?'To\'lamaydi':'To\'laydi'}}</td>
                            <td></td>
                            <td class="suf-cell"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">{{$members->links()}}</div>
        </div>
    </div>

    <script type="text/javascript">
        window.onload = function() {
            document.getElementById('editBtn').addEventListener('click' , function(e){
                e.preventDefault()
                if(data.length < 1){
                    toastr.warning('Iltimos r\'oyhatdagilardan birini tanlang!')
                }if(data.length > 1){
                    toastr.warning('Iltimos r\'oyhatdagilardan faqat bittasini tanlang!')
                }if(data.length == 1){
                    var idd = data[0];
                    var ids = idd.split("contacts_");
                    window.location = '{{url('/membership')}}'+'/'+ids[1]+'/edit';
                }
            })
            var selectors = document.getElementsByClassName('contacts-checkbox');
            var editButton = document.getElementsByClassName('contacts-checkbox');
            var data = [];
            for (var i = 0; i < selectors.length; i++) {
                selectors[i].addEventListener('change', ggg);
            }

//            document.getElementById('count_records').style.display = 'none';
            document.getElementById('deleteBpt').addEventListener('click',function(e){
                e.preventDefault()
                var bool = confirm('Qaydlarni o\'chirmoqchimisiz?')
                if(bool){
                    var data1=[];
                    if(data.length > 0){
                        for(var i=0;i<data.length;++i){
                            var element = data[i];
                            var id = element.split("contacts_");
                            data1.push(parseInt(id[1]))
                            console.log(data1);
                        }
                        $.ajax({
                            url:'{{url('api/deleteMember')}}',
                            type: 'POST',
                            dataType:'json',
                            contentType: 'json',
                            data: JSON.stringify(data1),
                            contentType: 'application/json; charset=utf-8',
                            success: function(data11){
                                if(!data11.error){
                                    toastr.success('O\'CHIRILDI!')
                                    for(var t=0;t<data.length;++t){
                                        console.log(data[t])
                                        var l = document.getElementById(data[t]).parentNode.parentNode.parentNode;
                                        console.log(l.parentNode.removeChild(l));
                                    }
                                    data = [];
                                }else{
                                    toastr.warning('Texnik xatolik!')
                                }
                            }
                        });

                    }else{
                        toastr.warning('O\'chirish uchun qaydlardan birini yoki bir nechtasini tanlang!')
                    }
                }
            })

            function ggg(e) {
                if (e.target.checked) {
                    data.push(e.target.id)
                    console.log(data.length)
                } else {
                    data.splice(data.indexOf(e.target.id), 1)
                    console.log(data.length)
                }
                if(data.length){
                    document.getElementById('count_records').style.display = 'block';
                    document.getElementById('count').innerHTML = '('+data.length+')'
                    document.getElementById('countt').innerHTML = '('+data.length+')'
                    document.getElementById('coun').innerHTML = data.length
                }else{
                    document.getElementById('count_records').style.display = 'none';
                    document.getElementById('coun').innerHTML = ''
                    document.getElementById('count').innerHTML = ''
                    document.getElementById('countt').innerHTML = ''
                }
            }
        }
    </script>
@endsection