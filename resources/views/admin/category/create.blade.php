
<div class="nav-tabs-custom">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs primary">
        <li class="active"><a href="#details" data-toggle="tab">Category</a></li>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-primary btn-sm" data-action='CREATE' data-form='#block-category-create'  data-load-to='#block-category-entry' data-datatable='#block-category-list'><i class="fa fa-floppy-o"></i> Save</button>
            <button type="button" class="btn btn-default btn-sm" data-action='CLOSE' data-load-to='#block-category-entry' data-href='{{guard_url('block/category/0')}}'><i class="fa fa-times-circle"></i> {{ trans('app.close') }}</button>
        </div>
    </ul>
    {!!Form::vertical_open()
    ->id('block-category-create')
    ->method('POST')
    ->files('true')
    ->action(guard_url('block/category'))!!}
    <div class="tab-content clearfix">
        <div class="tab-pane active" id="details">
            <div class="tab-pan-title"> {{ trans('app.create') }}  {!! trans('block::category.name') !!} </div>
            @include('block::admin.category.partial.entry')
        </div>
    </div>
    {!! Form::close() !!}
</div>