@extends('layouts.main')

@section('content')

    <div class="page-main panel">
        <div class="page-header">
            <div>
                <div class="btn-group" role="group" aria-label="...">
                    <button class="btn btn-success btn-md" id="restoreBpt"><span id="count"></span> <span style="font-size: 11px;" class="glyphicon glyphicon-repeat"></span> Тиклаш</button>
                    <button class="btn btn-info btn-md" id="count_records"> <span id="coun"></span> та танланди</button>
                </div>
            </div>
        </div>
        <div class="page-content page-content-table">
            <!-- Contacts -->
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
                                <option disabled selected>Bpt nomi</option>
                                @foreach($bpts as $bpt)
                                    <option value="{{$bpt->bpt_id}}">{{$bpt->bpt_name}}</option>
                                @endforeach
                            </select>
                        </th>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4"><input class="form-control" name="unionJoinDate" type="text" data-provide="datepicker"></th>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4"><input class="form-control" name="birthday" type="text" data-provide="datepicker"></th>
                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">
                            <select  data-plugin="select2"  name="isFeePaid">
                                <option disabled selected>Badal</option>
                                <option value="1">To'laydi</option>
                                <option value="0">To'lamaydi</option>
                            </select></th>
                        <th class="suf-cell"></th>
                        <th style="border: none;">
                            <button type="submit" class="btn btn-default">Izlash</button>
                        </th>
                        <input type="hidden" name="is_deleted" value="1">
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
                </tr>
                </thead>
                <tbody>
                @foreach($archives as $member)
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
            <div class="text-center">{{$archives->links()}}</div>
        </div>
    </div>

    <script type="text/javascript">
        window.onload = function() {
            var selectors = document.getElementsByClassName('contacts-checkbox');
            var editButton = document.getElementsByClassName('contacts-checkbox');
            var data = [];
            for (var i = 0; i < selectors.length; i++) {
                selectors[i].addEventListener('change', ggg);
            }

//            document.getElementById('count_records').style.display = 'none';
            document.getElementById('restoreBpt').addEventListener('click',function(e){
                e.preventDefault()
                var bool = confirm('Qaydlarni tiklamoqchimisiz?')
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
                            url:'{{url('api/restoreMember')}}',
                            type: 'POST',
                            dataType:'json',
                            data: JSON.stringify(data1),
                            contentType: 'application/json; charset=utf-8',
                            success: function(data11){
                                if(!data11.error){
                                    toastr.success('Tiklandi!')
                                    for(var t=0;t<data.length;++t){
                                        console.log(data[t])
                                        var l = document.getElementById(data[t]).parentNode.parentNode.parentNode;
                                        console.log(l.parentNode.removeChild(l));
                                    }
                                    document.getElementById('count_records').style.display = 'none';
                                    document.getElementById('coun').innerHTML = ''
                                    document.getElementById('count').innerHTML = ''
                                }else{
                                    toastr.warning('Texnik xatolik!')
                                }
                            }
                        });

                    }else{
                        toastr.warning('Tiklash uchun qaydlardan birini yoki bir nechtasini tanlang!')
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
                    document.getElementById('coun').innerHTML = '('+data.length+')'
                }else{
                    document.getElementById('count_records').style.display = 'none';
                    document.getElementById('coun').innerHTML = ''
                    document.getElementById('count').innerHTML = ''
                }
            }
        }
    </script>
@endsection