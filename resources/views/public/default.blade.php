<div class="section-header">
    <h2>{!!$category->title!!}</h2>
    <p> {!!$category->details!!} </p>
</div>
@foreach ($blocks as $block)
<div class="col-sm-4 content-center text-center">
    <div class="list-view-item">
        <span class="{!!$block->icon!!}" style="font-weight: bolder; font-size:24px; color: red;"></span>
        <h5>{!!$block->name!!}</h5>
        <p>{!!$block->description!!}</p>
    </div>
</div>
@endforeach