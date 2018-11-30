@extends('layouts.main')

@section('content')

    <div class="page-main panel">
        @if(count($notes) > 0)
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
                    @foreach($notes as $note)
                        @if(\Illuminate\Support\Facades\Auth::user()->role_id!=3)
                            <tr data-url="panel.tpl" data-toggle="slidePanel">
                                <td class="">{{$loop->iteration}}</td>
                                @php  $gp = array();  @endphp
                                @if($note->markAs->count() != 0)
                                    @foreach($note->markAs->all() as $mark)
                                        @php  array_push($gp,$mark->reader_id);  @endphp
                                    @endforeach
                                    <td class="{{in_array($user__id,$gp)?'':'alert alert-warning'}}">
                                        <p style="color: black;">{!! $note->message !!}</p>
                                    </td>
                                @else
                                    <td class="alert alert-warning">
                                        <p style="color: black;">{!! $note->message !!}</p>
                                    </td>
                                @endif
                                <td class="alert alert-{{($note->message_type_id==1)?'success':'danger'}}">{{($note->message_type_id==1)?'Ахборот':'Огохлантириш'}}</td>
                                <td class="">{{$note->created_at->diffForHumans()}}</td>
                                <td class="">{{($note->sender_role_id==3)?'Республика':'Вилоят'}}</td>
                            </tr>
                            @php
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
                            @endphp
                        @else
                            <tr data-url="panel.tpl" data-toggle="slidePanel">
                                <td class="">{{$loop->iteration}}</td>
                                    <td class="">
                                        <p style="color: black;">{!! $note->message !!}</p>
                                    </td>
                                <td class="alert alert-{{($note->message_type_id==1)?'success':'danger'}}">{{($note->message_type_id==1)?'Ахборот':'Огохлантириш'}}</td>
                                <td class="">{{$note->created_at->diffForHumans()}}</td>
                                <td class="">{{($note->sender_role_id==3)?'Республика':'Вилоят'}}</td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
                <div class="text-center">{{$notes->links()}}</div>
            </div>
        @endif
    </div>
    <script type="text/javascript" src="{{asset('js/loading.min.js')}}"></script>
@endsection