@extends('layouts.main')
@section('content')
    <div class="panel">
        <div class="panel-body container-fluid">
            <div class="row row-lg">
                <div class="col-sm-12">
                    <form class="form-horizontal" action="{{ url('/district/action/save') }}" method="post" name="addform">

                        {{ csrf_field() }}
                        <div class="example-wrap">
                            <h4 class="example-title">Туман/шахарни киритиш ёки тахрирлаш</h4>
                            <div class="example">
                                <form autocomplete="off">
                                    <div class="form-group form-material row">
                                        <div class="col-sm-12">
                                            <label class="control-label" for="region">Худуд номи</label>
                                            <select class="form-control" data-plugin="select2" name="region_id" id="region_id">
                                                <option value="0">Танланг...</option>
                                                @foreach($regions  as $region)
                                                    <option value="{{ $region->region_id }}">{{ $region->region_name }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="col-sm-12">
                                            <label class="control-label" for="region">Туман/шахар номини киритинг</label>

                                            <input type="text" class="form-control" id="district_name" name="district_name" placeholder="Туман/шахар номини киритинг" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group form-material">
                                        <button type="button" class="btn btn-primary waves-effect waves-light" onclick="document.addform.submit();">Сақлаш</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection