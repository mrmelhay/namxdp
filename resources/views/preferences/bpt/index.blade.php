@extends('layouts.main')
@section('content')
    <div class="panel">

        <div class="page-header">
            <div>
                <div class="btn-group" role="group" aria-label="...">
                    <button class="btn btn-primary btn-md" onclick="window.location='{{url('bpt/create')}}';">+ Бпт қўшиш</button>
                    <button class="btn btn-warning btn-md" id="editBtn"> <span id="countt"></span> <span style="font-size: 11px;" class="glyphicon glyphicon-pencil"></span> Ўзгартириш</button>
                    {{--<button class="btn btn-default btn-md">Пенсия</button>--}}
                    {{--<button class="btn btn-default btn-md">Бадал</button>--}}
                    <button class="btn btn-danger btn-md" id="deleteBpt"><span id="count"></span> <span style="font-size: 11px;" class="glyphicon glyphicon-trash"></span> Ўчириш</button>
                    <button class="btn btn-default btn-md" onclick="window.location='{{url('arxiv')}}'">Архив</button>
                    <button class="btn btn-info btn-md" id="count_records"> <span id="coun"></span> та танланди</button>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>БПТ номи</th>
                    <th>БПТ соҳаси</th>
                    <th>МФЙми?</th>
                    <th>БПТ вилояти</th>
                    <th>БПТ тумани</th>
                    <th>БПТ манзили</th>
                    <th>Партия номи</th>
                    <th>Амаллар</th>
                </thead>
                <tbody>
                @foreach($bpts as $bpt)
                    <tr>
                        <td><input type="checkbox" value="{{ $bpt->bpt_id }}" class="selectable-item contacts-checkbox" name="region[]" id="contacts_{{$bpt->bpt_id}}" /></td>
                        <td><a href="{{ url('/bpt/'.$bpt->bpt_id) }}/edit">{{ $bpt->bpt_id}}</a></td>
                        <td>{{ $bpt->bpt_name }}</td>
                        <td>{{ $bpt->bpt_speciality }}</td>
                        <td>{{ ($bpt->bpt_is_mfy)?'M.F.Y':'Yo\'q' }}</td>
                        <td>{{ $bpt->region->region_name }}</td>
                        <td>{{ $bpt->district->district_name }}</td>
                        <td>{{ $bpt->bpt_address }}</td>
                        <td>{{ $bpt->party->party_name }}</td>
                        <td>
                            <a href="{{ url('/bpt/'.$bpt->bpt_id) }}/edit"><i class="fa fa-pencil"></i></a>&nbsp;
                            <a onclick="document.getElementById('deleteForm').submit()"><i class="fa fa-trash"></i></a>

                            <form method="post" id="deleteForm" action="{{url('bpt/'.$bpt->bpt_id)}}">
                                {{csrf_field()}}{{method_field('DELETE')}}
                                <input type="hidden" name="bpt_id" value="{{$bpt->bpt_id}}">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        window.onload = function() {
            document.getElementById('editBtn').addEventListener('click' , function(e){
                e.preventDefault()
                if(data.length < 1){
                    toastr.warning('Илтимос рўйхатдагилардан бирини танланг!')
                }if(data.length > 1){
                    toastr.warning('Илтимос рўйхатдагилардан фақатгина биттасини танланг!')
                }if(data.length == 1){
                    console.log(data)
                    var idd = data[0];
                    var ids = idd.split("contacts_");
                    window.location = '{{url('/bpt')}}'+'/'+ids[1]+'/edit';
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
                            url:'{{url('api/deleteBpt')}}',
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
                                    toastr.warning('Texnik xatolik!')
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