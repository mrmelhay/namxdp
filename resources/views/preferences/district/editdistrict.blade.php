@extends('layouts.main')
@section('content')
    <div class="panel">
        <div class="panel-body container-fluid">
            <div class="row row-lg">
                <div class="col-sm-12">
                    <form class="form-horizontal" action="{{ url('/district/action/update') }}" method="post" name="addformupdate">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $district[0]->district_id }}" />


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
                                                    @if ($district[0]->region_id==$region->region_id)
                                                        <option value="{{ $region->region_id }}" selected="selected">{{ $region->region_name }}</option>
                                                    @else
                                                        <option value="{{ $region->region_id }}">{{ $region->region_name }}</option>
                                                    @endif

                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="col-sm-12">
                                            <label class="control-label" for="region">Туман/шахар номини киритинг</label>

                                            <input type="text" class="form-control" id="district_name" name="district_name" placeholder="Туман/шахар номини киритинг" autocomplete="off" value="{{ $district[0]->district_name }}">
                                        </div>
                                    </div>
                                    <div class="form-group form-material">
                                        <button type="button" class="btn btn-primary waves-effect waves-light" onclick="document.addformupdate.submit();">Сақлаш</button>
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
