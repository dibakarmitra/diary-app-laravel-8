@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 60px;">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card border-success mb-3" style="max-width: 18rem;">
                <div class="card-header bg-transparent border-success">Entries</div>
                <div class="card-body text-success">
                    <p class="card-text">{{$record['entries']}}</p>
                </div>
                <div class="card-footer bg-transparent border-success">
                    <a class="create" href="entries/create">Create Entry</a>
                    <a class="view" href="entries">View All</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
