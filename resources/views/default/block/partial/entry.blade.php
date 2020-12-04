<div class="container-fluid">
    <div class="row">
        <div class="col-9">
            <div class="app-entry-form-section" id="basic">
                <div class="section-title">Details</div>
                <div class='row disabled'>
                    {!! Form::hidden('upload_folder')!!}
                    <div class='col-md-6 col-sm-6'>
                        {!! Form::text('name')
                        -> required()
                        -> label(trans('block::block.label.name'))
                        -> placeholder(trans('block::block.placeholder.name'))!!}
                    </div>
                    <div class='col-md-6 col-sm-6'>
                        {!! Form::select('category_id')
                        ->required()
                        ->options(Block::selectCategories())
                        -> label(trans('block::block.label.category_id'))
                        -> placeholder(trans('block::block.placeholder.category_id'))!!}
                    </div>
                    <div class='col-md-6 col-sm-6'>
                        {!! Form::select('status')
                        -> options(trans('block::block.options.status'))
                        -> label(trans('block::block.label.status'))
                        -> placeholder(trans('block::block.placeholder.status'))!!}
                    </div>
                    <div class='col-md-6 col-sm-6'>
                        {!! Form::url('url')
                        -> label(trans('block::block.label.url'))
                        -> placeholder(trans('block::block.placeholder.url'))!!}
                    </div>
                    <div class='col-md-6 col-sm-6'>
                        {!! Form::number('order')
                        -> label(trans('block::block.label.order'))
                        -> placeholder(trans('block::block.placeholder.order'))!!}
                    </div>
                    <div class='col-md-6 col-sm-6'>
                        {!! Form::text('icon')
                        -> label(trans('block::block.label.icon'))
                        -> placeholder(trans('block::block.placeholder.icon'))!!}
                    </div>
                    <div class='col-md-12 col-sm-12'>
                        {!! Form::textarea('description')
                        -> addClass('html-editor-mini')
                        -> label(trans('block::block.label.description'))
                        -> placeholder(trans('block::block.placeholder.description'))!!}
                     
                    </div>
                </div>
            </div>
            <div class="app-entry-form-section" id="images">
                <div class="section-title">Images</div>
                <div class="row">
                    <div class="form-group">
                        <label for="images" class="control-label col-lg-12 col-sm-12 text-left">
                            {{trans('block::block.label.images') }}
                        </label>
                        <div class='col-12'>
                            {!! $block->files('images')
                            ->url($block->getUploadUrl('images'))->dropzone()!!}
                            {!! $block->files('images')->editor()!!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <aside class="app-create-steps">
                <h5 class="steps-header">Steps</h5>
                <div class="steps-wrap" id="steps_nav">
                    <a class="step-item active" href="#basic"><span>1</span> Basic Details</a>
                    <a class="step-item" href="#images"><span>2</span> Images</a>
                </div>
            </aside>
        </div>
    </div>
</div>