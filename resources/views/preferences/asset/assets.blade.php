@extends('layouts.main')

@section('content')

    <div class="page-main">
        <div class="page-header">
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
                <span class="checkbox-custom checkbox-primary checkbox-lg contacts-select-all">
                  <input type="checkbox" class="contacts-checkbox selectable-all" id="select_all"
                          />
                  <label for="select_all"></label>
                </span>
                    </th>
                    <th class="cell-300" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">Name</th>
                    <th class="cell-300" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">Phone</th>
                    <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">Email</th>
                    <th class="suf-cell"></th>
                </tr>
                </thead>
                <tbody>
                    <tr data-url="panel.tpl" data-toggle="slidePanel">
                    <td class="pre-cell"></td>
                    <td class="cell-30">
                <span class="checkbox-custom checkbox-primary checkbox-lg">
                  <input type="checkbox" class="contacts-checkbox selectable-item" id="contacts_1"
                          />
                  <label for="contacts_1"></label>
                </span>
                    </td>
                    <td class="cell-300">
                        <a class="avatar" href="javascript:void(0)">
                            <img class="img-responsive" src="images/1.jpg" alt="...">
                        </a>
                        Herman Beck
                    </td>
                    <td class="cell-300">(119)-298-8025</td>
                    <td>julio.williamson73@gmail.com</td>
                    <td class="suf-cell"></td>
                </tr>
                </tbody>
            </table>
            <ul data-plugin="paginator" data-total="50" data-skin="pagination-gap"></ul>
        </div>
    </div>
    <div class="site-action">
        <button type="button" onclick="window.location='{{url("membership/create")}}'" class="site-action-toggle btn-raised btn btn-success btn-floating">
            <i class="front-icon md-plus animation-scale-up" aria-hidden="true"></i>
            <i class="back-icon md-close animation-scale-up" aria-hidden="true"></i>
        </button>
        <div class="site-action-buttons">
            <button type="button" data-action="trash" class="btn-raised btn btn-success btn-floating animation-slide-bottom">
                <i class="icon md-delete" aria-hidden="true"></i>
            </button>
            <button type="button" data-action="folder" class="btn-raised btn btn-success btn-floating animation-slide-bottom">
                <i class="icon md-folder" aria-hidden="true"></i>
            </button>
        </div>
    </div>
    <script type="text/javascript">
        var selectors = document.getElementsByClassName('contacts-checkbox');
        var selec = document.getElementsByClassName('selectable-all')[0];
        selec.addEventListener('change' , ttt)
        var data=[];
        for (var i=0; i<selectors.length; i++) {
            selectors[i].addEventListener('change',ggg);
        }

        function ttt(e){
            if(e.target.checked){
                for (var i=0; i<selectors.length; i++) {
                    selectors[i].checked = true;
                }
                toggle(['a'])
            }else{
                for (var i=0; i<selectors.length; i++) {
                    selectors[i].checked = false;
                }
                toggle([])
            }
        }

        function ggg(e){

            if(e.target.checked){
                data.push(e.target.id)
//                console.log(data.length)
                toggle(data)
            }else{
                  data.splice(data.indexOf(e.target.id) , 1)
//                console.log(data.isEmpty?'em':'no')
                toggle(data)
            }
        }

        function toggle(array){
            if(array.length > 0){
                document.getElementsByClassName('site-action-buttons')[0].style.display = 'block';
            }else{
                document.getElementsByClassName('site-action-buttons')[0].style.display = 'none';
            }
        }
    </script>
@endsection