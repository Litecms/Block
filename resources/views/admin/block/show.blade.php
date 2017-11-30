<div class="nav-tabs-custom">
    <ul class="nav nav-tabs primary">
        <li class="active"><a href="#details" data-toggle="tab">  {!! trans('block::block.name') !!}</a></li>
        <li><a href="#images" data-toggle="tab">Images</a></li>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-success btn-sm" data-action='NEW' data-load-to='#block-block-entry' data-href='{{guard_url('block/block/create')}}'><i class="fa fa-plus-circle"></i> New</button>
            @if($block->id )
            <button type="button" class="btn btn-primary btn-sm" data-action="EDIT" data-load-to='#block-block-entry' data-href='{{ guard_url('block/block') }}/{{$block->getRouteKey()}}/edit'><i class="fa fa-pencil-square"></i> Edit</button>
            <button type="button" class="btn btn-danger btn-sm" data-action="DELETE" data-load-to='#block-block-entry' data-datatable='#block-block-list' data-href='{{ guard_url('block/block') }}/{{$block->getRouteKey()}}' >
            <i class="fa fa-times-circle"></i> Delete
            </button>
            @endif

        </div>
    </ul>
    {!!Form::vertical_open()
    ->id('block-block-show')
    ->method('POST')
    ->files('true')
    ->action(guard_url('block/block'))!!}
       <div class="tab-content clearfix">
            <div class="tab-pane active" id="details">
                <div class="tab-pan-title">  {!! trans('app.view') !!}  {!! trans('block::block.name') !!} [ {!!$block->name!!} ] </div>
                @include('block::admin.block.partial.entry')
            </div>
            <div class="tab-pane" id="images">
                <div class="row">
                        <div class='col-lg-12 col-sm-12'>
                            {!! $block->files('images')->editor()!!}
                        </div>
                </div>    
            </div>
        </div>
    {!! Form::close() !!}
</div>
