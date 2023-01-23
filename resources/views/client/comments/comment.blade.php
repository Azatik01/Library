<div class="">
    <div class="media g-mb-30 media-comment">
        <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
            <div class="g-mb-15">
                <h5 class="h5 g-color-gray-dark-v1 mb-0">{{$comment->author}}</h5>
                <h5 class="h5 g-color-gray-dark-v1 mb-0">{{$comment->rating}}</h5>
                <span class="g-color-gray-dark-v4 g-font-size-12">{{$comment->created_at->diffForHumans()}}</span>
            </div>
            <p>
                {{$comment->description}}
            </p>
        </div>
    </div>
</div>



