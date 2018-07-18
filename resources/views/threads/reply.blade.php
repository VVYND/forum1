<div class="card">
        <div class="card-header">
            <div class="level">
                <h6 class="flex">
                    <a href="/profiles/{{$reply->owner->name}}"> {{$reply->owner->name}} </a> said
                    {{ $reply->created_at->diffForHumans()}}
                </h6>

                <div>

                    <form method="POST" action="/replies/{{$reply->id}}/favorites">
                        {{csrf_field()}}
                    <button type="submit" class="btn btn-secondary" {{$reply->isFavorited() ? 'disabled' : ''}}>
                            {{$reply->favorites()->count()}} {{str_plural('Favorite',$reply->favorites()->count())}}
                        </button>
                    </form>
                </div>
            </div>
        </div>

            <div class="card-body">

                {{$reply->body}}

            </div>

        </div>
        <br>
