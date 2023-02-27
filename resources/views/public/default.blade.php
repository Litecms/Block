@foreach ($blocks as $block)
<div class="col-md-6 col-lg-4">
    <div class="feature-card text-center">
        <div class="card-icon">
            <i class="{!!$block->icon!!}"></i>
        </div>
        <div class="card-text">
            <h3 class="title">{!!$block->name!!}</h3>
            <p>{!!$block->description!!}</p>
        </div>
    </div>
</div>
@endforeach
