@extends('layouts.main')

@section('content')

    <div class="page-main">
        <div class="page-header">
            <div>
                <div class="btn-group" role="group" aria-label="...">
                    <button class="btn btn-primary btn-md" onclick="window.location='{{url('membership/create')}}';">+ A'zo Qo'shish</button>
                    <button class="btn btn-warning btn-md" id="editBtn"> <span id="countt"></span> <span style="font-size: 11px;" class="glyphicon glyphicon-pencil"></span> O'zgartirish</button>
                    <button class="btn btn-default btn-md">Pensiya</button>
                    <button class="btn btn-default btn-md">Badal</button>
                    <button class="btn btn-danger btn-md" id="deleteBpt"><span id="count"></span> <span style="font-size: 11px;" class="glyphicon glyphicon-trash"></span> O'chirish</button>
                    <button class="btn btn-info btn-md" id="count_records"> <span id="coun"></span> ta tanlandi</button>
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
                    <th class="cell-300" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">Ismi</th>
                    <th class="cell-300" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">BPT Nomi</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">A'zo bo'lgan sana</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">Tug'ilgan sana</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">Badal</th>
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
@endsection