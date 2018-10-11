@extends('layouts.main')

@section('content')
    <h4>Ushbu bulim qayta ishlanmoqda</h4>
    @foreach($reports as $report)
    {{ $report->fullName.' '.$report->sex_name.' '.$report->nation_name }}<br/>
    @endforeach
@endsection