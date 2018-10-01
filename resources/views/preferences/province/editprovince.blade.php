@extends('layouts.main')
@section('content')
<div class="panel">
    <div class="panel-body container-fluid">
        <div class="row row-lg">
            <div class="col-sm-12">
               <form class="form-horizontal" action="{{ url('/province/action/update') }}" method="post" name="addform">
                   <input type="hidden" name="id" value="{{ $province[0]->region_id }}"/>
                   {{ csrf_field() }}
                <div class="example-wrap">
                    <h4 class="example-title">Худуни киритиш ва тахрирлаш</h4>
                    <div class="example">
                        <form autocomplete="off">
                            <div class="form-group form-material row">
                                <div class="col-sm-12">
                                    <label class="control-label" for="inputBasicFirstName">Худуд номи</label>
                                    <input type="text" class="form-control" id="region_name" name="region_name" placeholder="Худудни номини киритинг" autocomplete="off" value="{{ $province[0]->region_name }}">
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