<div class="list-group">
    <a href="/home" class="list-group-item list-group-item-action">All Categorys</a>
    @foreach ($categorys as $item)
    <a href="{{route('filter',['cat_id'=>$item->id])}} " class="list-group-item list-group-item-action">{{$item->cat_title}}</a>
    @endforeach
</div>