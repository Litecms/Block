<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-square"></i> {!! trans('block::block.name') !!} <small> {!! trans('app.manage') !!} {!! trans('block::block.names') !!}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! guard_url('/') !!}"><i class="fa fa-dashboard"></i> {!! trans('app.home') !!} </a></li>
            <li class="active">{!! trans('block::block.names') !!}</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div id='block-block-entry'>
    </div>
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                    <li class="active"><a href="{!!guard_url('block/block')!!}">Blocks</a></li>
                    <li><a href="{!!guard_url('block/category')!!}">Categories</a></li>
            </ul>
            <div class="tab-content">
                <table id="block-block-list" class="table table-striped data-table">
                    <thead class="list_head">
                    <th>{!! trans('block::block.label.category_id')!!}</th>
                    <th>{!! trans('block::block.label.name')!!}</th>
                    <th>{!! trans('block::block.label.url')!!}</th>
                    <th>{!! trans('block::block.label.status')!!}</th>
                    </thead>
                    <thead  class="search_bar">
                    <th>{!! Form::text('search[category_id]')->raw()!!}</th>
                    <th>{!! Form::text('search[name]')->raw()!!}</th>
                    <th>{!! Form::text('search[url]')->raw()!!}</th>
                    <th>{!! Form::text('date[status]')->raw()!!}</th>
                    </thead>
                </table>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">

var oTable;
$(document).ready(function(){
    app.load('#block-block-entry', '{!!guard_url('block/block/0')!!}');
    oTable = $('#block-block-list').dataTable( {
        "bProcessing": true,
        "sDom": 'R<>rt<ilp><"clear">',
        "bServerSide": true,
        "sAjaxSource": '{!! guard_url('block/block') !!}',
        "fnServerData" : function ( sSource, aoData, fnCallback ) {

            $('#block-block-list .search_bar input, #block-block-list .search_bar select').each(
                function(){
                    aoData.push( { 'name' : $(this).attr('name'), 'value' : $(this).val() } );
                }
            );
            app.dataTable(aoData);
            $.ajax({
                'dataType'  : 'json',
                'data'      : aoData,
                'type'      : 'GET',
                'url'       : sSource,
                'success'   : fnCallback
            });
        },

        "columns": [
            {data :'category_id'},
            {data :'name'},
            {data :'url'},
            {data :'status'},
        ],
        "pageLength": 25
    });

    $('#block-block-list tbody').on( 'click', 'tr', function () {

        oTable.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');

        var d = $('#block-block-list').DataTable().row( this ).data();

        $('#block-block-entry').load('{!!guard_url('block/block')!!}' + '/' + d.id);                                                           
    });

    $("#block-block-list .search_bar input, #block-block-list .search_bar select").on('keyup select', function (e) {
        e.preventDefault();
        console.log(e.keyCode);
        if (e.keyCode == 13 || e.keyCode == 9) {
            oTable.api().draw();
        }
    });
});
</script>