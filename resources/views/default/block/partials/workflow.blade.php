    @foreach($workflow as $key => $value)
        @if(empty($value['form']))
        <button type="button" class="btn btn-with-icon  btn-{!! @$value['label']['varient'] !!}"
            data-action='WORKFLOW'
            data-method='PATCH'
            data-list="#item-list"
            data-load-to="#app-entry"
            data-href="{!!$value['url']!!}">
            <i class="las la-{!! @$value['label']['icon'] !!}"></i> {!! @$value['label']['label'] !!}
        </button>
        @else
        <!-- Modal -->
        <button type="button" class="btn btn-with-icon btn-{!! $value['label']['varient'] !!}"
        data-backdrop="false"  data-toggle="modal" data-target="#{!!$value['name']!!}Modal">
        <i class="las la-{!! $value['label']['icon'] !!}"></i> {!! $value['label']['label'] !!}
        </button>
        <div class="modal fade" id="{!!$value['name']!!}Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="{!!$value['name']!!}ModalLabel">{!! $value['label']['label'] !!}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form-action-{{$value['name']}}">
                            <div class="row">
                                    @foreach($value['form'] as $key => $field)
                                    <div class="col-12">
                                        {!!
                                        Form::input($key)
                                        ->apply($field)
                                        !!}
                                    </div>
                                    @endforeach
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-with-icon  btn-{!! @$value['label']['varient'] !!}"
                            data-action='WORKFLOW'
                            data-method='PATCH'
                            data-form="#form-action-{{$value['name']}}"
                            data-list="#item-list"
                            data-load-to="#app-entry"
                            data-href="{!!$value['url']!!}">
                            <i class="las la-{!! @$value['label']['icon'] !!}"></i> {!! @$value['label']['label'] !!}
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endif
    @endforeach
