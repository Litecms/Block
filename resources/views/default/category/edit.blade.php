<div class="app-entry-form-wrap">
    <div class="app-sec-title app-sec-title-with-icon app-sec-title-with-action">
        <i class="lab la-product-hunt app-sec-title-icon"></i>
        <h2>{{__('Edit')}} {!! trans('block::category.tab.name') !!} [ {!!$category->name!!} ]</h2>
        <div class="actions">
            <button type="button" class="btn btn-with-icon btn-link  btn-outline" data-action='UPDATE'
                data-form="#form-edit" data-load-to="#app-entry" data-list="#item-list">
                <i class="las la-save"></i>{{__('Save')}}
            </button>
            <button type="button" class="btn btn-with-icon btn-link  btn-outline" data-action='SHOW'
                data-load-to="#app-entry" data-url="{{guard_url('block/category')}}/{!!$category->getRouteKey()!!}">
                <i class="las la-window-close"></i>{{__('Cancel')}}
            </button>
        </div>
    </div>

    {!!Form::vertical_open()
    ->method('PUT')
    ->id('form-edit')
    ->action(guard_url('block/category/'. $category->getRouteKey()))!!}

    @include('block::category.partial.entry', ['mode' => 'edit'])

    {!!Form::close()!!}
</div>