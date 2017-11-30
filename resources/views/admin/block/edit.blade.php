
    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#block" data-toggle="tab">{!! trans('block::block.tab.name') !!}</a></li>
            <li><a href="#images" data-toggle="tab">Images</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#block-block-edit'  data-load-to='#block-block-entry' data-datatable='#block-block-list'><i class="fa fa-floppy-o"></i> Save</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#block-block-entry' data-href='{{guard_url('block/block')}}/{{$block->getRouteKey()}}'><i class="fa fa-times-circle"></i> {{ trans('app.cancel') }}</button>
            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('block-block-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(guard_url('block/block/'. $block->getRouteKey()))!!}
        <div class="tab-content clearfix">
            <div class="tab-pane active" id="details">
                <div class="tab-pan-title">  {!! trans('app.edit') !!}  {!! trans('block::block.name') !!} [ {!!$block->name!!} ]</div>
                @include('block::admin.block.partial.entry', ['mode' => 'edit'])
            </div>
            <div class="tab-pane" id="images">
                <div class="row">
                    <div class="form-group">
                        <label for="images" class="control-label col-lg-12 col-sm-12 text-left">
                            {{trans('block::block.label.images') }}
                        </label>
                        <div class='col-lg-6 col-sm-12'>
                            {!! $block->files('images')->url($block->getUploadUrl('images'))->dropzone()!!}
                        </div>
                        <div class='col-lg-12 col-sm-12'>
                            {!! $block->files('images')->editor()!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!!Form::close()!!}
    </div>