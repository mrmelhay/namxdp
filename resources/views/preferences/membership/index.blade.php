@extends('layouts.main')

@section('content')

    <div class="page-main panel">
        <div class="page-header">
            <div>
                <div class="btn-group" role="group" aria-label="...">
                    <button class="btn btn-primary btn-md" onclick="window.location='{{url('membership/create')}}';">+ Аъзо қўшиш</button>
                    <button class="btn btn-warning btn-md" id="editBtn"> <span id="countt"></span> <span style="font-size: 11px;" class="glyphicon glyphicon-pencil"></span> Ўзгартириш</button>
                    <button class="btn btn-default btn-md" id="pensionerButton"> <span id="counp"></span> Пенсия</button>
                    <button class="btn btn-default btn-md" id="feeButton"> <span id="counb"></span> Бадал</button>
                    <button class="btn btn-danger btn-md" id="deleteBpt"><span id="count"></span> <span style="font-size: 11px;" class="glyphicon glyphicon-trash"></span> Ўчириш</button>
                    <button class="btn btn-default btn-md" onclick="window.location='{{url('arxiv')}}'">Архив</button>
                    <button class="btn btn-info btn-md" id="count_records"> <span id="coun"></span> та танланди</button>
                </div>
            </div>
        </div>
        <div class="page-content page-content-table">
            <table class="table is-indent tablesaw" data-tablesaw-mode="stack" data-plugin="animateList"
                   data-animate="fade" data-child="tr" data-selectable="selectable">
                <thead>
                <tr>
                    <form action="{{route('search')}}" method="post">
                        {{csrf_field()}}
                        <th class="pre-cell"></th>
                        <th class="cell-30" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3"></th>
                        <th class="cell-300" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3"><input class="form-control" name="fullName" type="text"></th>
                        <th class="cell-300" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">
                            <select name="bpt_id" data-plugin="select2">
                                <option disabled selected>БПТ номи</option>
                                @foreach($bpts as $bpt)
                                    <option value="{{$bpt->bpt_id}}">{{$bpt->bpt_name}}</option>
                                    @endforeach
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
                    <th class="cell-30" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">
                    </th>
                    <th class="cell-300" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">Ф.И.О</th>
                    <th class="cell-300" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">БПТ номи</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">Аъзолик санаси</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">Туғилган санаси</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">Бадал</th>

                    <th class="suf-cell"></th>
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
                            <td class="cell-3">{{($member->isFeePaid==0)?'Тўламайди':'Тўлайди'}}</td>
                            <td></td>
                            <td class="suf-cell"></td>
                            <td class="suf-cell"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">{{$members->links()}}</div>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('assets/vendor/jquery/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendor/bootstrap/bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendor/bootbox/bootbox.js')}}"></script>
    <script type="text/javascript">
        window.onload = function() {
            document.getElementById('editBtn').addEventListener('click' , function(e){
                e.preventDefault()
                if(data.length < 1){
                    toastr.warning('Илтимос рўйхатдагилардан бирини танланг!')
                }if(data.length > 1){
                    toastr.warning('Илтимос рўйхатдан фақат битта маълумотни танланг!')
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

            var feeB = document.getElementById('feeButton').addEventListener('click',function (e) {
                e.preventDefault()
                var bool = bootbox.confirm('Ушбу а\'золарни БАДАЛ тулашдан озод етилсинми ?',function(result){
                    if(result){
                        bootbox.prompt({
                            title: "Бадалдан озод этиш санасини курсатинг!",
                            inputType: 'date',
                            callback: function (result1) {
                                if(result1!==null){
                                    bootbox.prompt({
                                        title: "А'зони бадалдан озод этилиш сабабини киритинг!",
                                        inputType:'text',
                                        callback: function(result2){
                                            if(result2.length>5){
                                                var reason  = result2
                                                var data1=[];
                                                if(data.length > 0){
                                                    for(var i=0;i<data.length;++i){
                                                        var element = data[i];
                                                        var id = element.split("contacts_");
                                                        data1.push(parseInt(id[1]))
                                                    }
                                                    $.ajax({
                                                        url:'{{url('api/checkAsUnFee')}}',
                                                        type: 'POST',
                                                        dataType:'json',
                                                        data: JSON.stringify({ids:data1,reason:reason}),
                                                        contentType: 'application/json; charset=utf-8',
                                                        success: function(data11){
                                                            if(!data11.error){
                                                                toastr.success('Азолар БАДАЛдан озод этилди!')
                                                                for(var t=0;t<data.length;++t){
                                                                    // console.log();
                                                                    var l = document.getElementById(data[t]).parentNode.parentNode.parentNode.childNodes[13];
                                                                    l.textContent = 'Тўламайди';
                                                                }
                                                                data=[];
                                                                document.getElementById('count_records').style.display = 'none';
                                                                document.getElementById('coun').innerHTML = ''
                                                                document.getElementById('count').innerHTML = ''
                                                                document.getElementById('countt').innerHTML = ''
                                                            }else{
                                                                toastr.warning('Техник хатолик!')
                                                            }
                                                        }
                                                    });

                                                }else{
                                                    toastr.warning('Ўзгартириш учун қайдлардан бирини ёки бир нечтасини танланг!')
                                                }
                                            }
                                        }
                                    })
                                }
                            }
                        });
                    }
                })
            })

//            document.getElementById('count_records').style.display = 'none';
            document.getElementById('deleteBpt').addEventListener('click',function(e){
                e.preventDefault()
                var bool = confirm('Қайдларни ўчирмоқчимисиз?')
                if(bool){
                    var data1=[];
                    if(data.length > 0){
                        for(var i=0;i<data.length;++i){
                            var element = data[i];
                            var id = element.split("contacts_");
                            data1.push(parseInt(id[1]))
                        }
                        $.ajax({
                            url:'{{url('api/deleteMember')}}',
                            type: 'POST',
                            dataType:'json',
                            data: JSON.stringify(data1),
                            contentType: 'application/json; charset=utf-8',
                            success: function(data11){
                                if(!data11.error){
                                    toastr.success('O\'CHIRILDI!')
                                    for(var t=0;t<data.length;++t){
                                        var l = document.getElementById(data[t]).parentNode.parentNode.parentNode;
                                        l.parentNode.removeChild(l)
                                    }
                                    data=[];
                                        document.getElementById('count_records').style.display = 'none';
                                        document.getElementById('coun').innerHTML = ''
                                        document.getElementById('count').innerHTML = ''
                                        document.getElementById('countt').innerHTML = ''
                                }else{
                                    toastr.warning('Техник хатолик!')
                                }
                            }
                        });

                    }else{
                        toastr.warning('Ўчириш учун қайдлардан бирини ёки бир нечтасини танланг!')
                    }
                }
            })

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
@endsection