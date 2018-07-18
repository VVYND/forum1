@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card-header" style="background-color:#7fb39c; color:#ffff">Forum Thread</div><br>
                @forelse ($threads as $thread)

                <div class="card">

                    <div class="card-body">
                    <div class="level">
                            <h4 class="flex">
                                <a href="{{$thread->path()}}" style="color:#00796B">{{ $thread->title }}</a>
                            </h4>

                        <a href="{{$thread->path()}}">{{$thread->replies_count}}
                            {{str_plural('reply',$thread->replies_count)}}
                        </a>
                        </div>

                        <div class="body">{{str_limit($thread->body , 250)}}</div>

                    </div>
                </div>
            <br>

            @empty
                <p>There are no relevan result at this moment.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
