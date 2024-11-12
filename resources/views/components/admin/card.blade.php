@props(['model' ])
<div class="card">
    <div class="card-body">
        {{$slot}}
    </div>
    @if(isset($model))
        <div class="card-footer">
            {!! $model->links() !!}
        </div>
    @endif
</div>
