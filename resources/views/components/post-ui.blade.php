<div class="card" style="width: 18rem;">
    <img class="card-img-top" src="{{ url('uploads/' . $post->photo) }}" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title">{{ $post->title }}</h5>
        <p class="card-text">{{ $post->photo }} Some quick example text to build on the card title and make up the bulk
            of the card's
            content.</p>
        <a href="{{ url('news/'.$post->id) }}" class="btn btn-primary">READ MORE</a>
        
    </div>
</div>
