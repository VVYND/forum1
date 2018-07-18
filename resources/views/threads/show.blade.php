@extends('layouts.app')

@section('content')
<div class="container">

    {{-- Title & post thread --}}
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="level">
                        <span class="flex">
                                <a href="/profiles/{{$thread->creator->name}}">{{$thread->creator->name}}</a> posted:
                                {{ $thread->title }}
                        </span>

                        @can('update' ,$thread)
                        <form action="{{$thread->path()}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}

                            <button type="submit" class="btn ">Delete Thread</button>
                        </form>
                        @endcan
                    </div>

                </div>

                <div class="card-body">

                    {{$thread->body}}

                </div>
            </div>
            <br>
            <hr>

            {{-- reply section --}}
            <label for="" style="font-weight:bold; font-size:2em">Comment</label>

            @foreach($replies as $reply)
                @include ('threads.reply')
            @endforeach

            {{$replies->links()}}

                {{-- commen form --}}
            @if(auth()->check())


            <form method="POST" action="{{$thread->path(). '/replies'}}">
             {{ csrf_field() }}
             <div class="form-group">
                 <textarea name="body" id="body" class="form-control" placeholder="Have something to say?" rows="5">

                 </textarea>
             </div>

             <button type="submit" class="btn btn-primary">Post</button>
            </form>

            @else
             <p class="text-center">please <a href="{{route('login')}}">Sign In</a> to participate in this thread</p>
            @endif
        </div>

        <div class="col-md-4">

            <div class="card">
                <div class="card-header">

                </div>

                <div class="card-body">
                   created {{ $thread->created_at->diffForHumans() }}
                   by <a href="">{{ $thread->creator->name }}</a>
                   and has {{ $thread->replies_count}} {{str_plural('comment' , $thread->replies_count)}}.
                </div>
            </div>

        </div>

    </div>
</div>
@endsection

{{-- justify-content-center --}}
