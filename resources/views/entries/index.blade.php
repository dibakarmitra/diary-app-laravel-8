@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 20px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($entries as $entry)
            <div class="col-md-12">
                <div class="card border-success mb-3 note">
                    <div class="card-header bg-transparent border-success">
                        <h5 class="card-title">{{$entry->title}}</h5>
                    </div>
                    @if($entry->file)
                    <div class="row">
                        <div class="card-body text-success col-6 float-left">
                            <p>{{$entry->body}}</p>
                        </div>
                        <div class="col-6 float-right"><img class="img-fluid rounded" src="{{ url($entry->file) }}" alt="{{$entry->id}}" /></div>
                    </div>
                    @else
                    <div class="card-body text-success">
                        <p>{{$entry->body}}</p>
                    </div>
                    @endif

                    <div class="card-footer bg-transparent border-success">
                        <div style="display:inline-block; margin-top:7px;">
                            {{$entry->updated_at}}
                        </div>
                        <div style="float:right;">
                            <form method="post" action="{{ route('entries.destroy', $entry->id) }}">
                                @csrf
                                @method('DELETE')
                                <a href="/entries/{{$entry->id}}/edit" class="btn btn-success">Edit</a>
                                <button type="submit" name="delete" class="btn btn-success">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
    @if($entries->links())
    <div class="d-flex justify-content-center">
        {!! $entries->links() !!}
    </div>
    @endif
</div>
@endsection