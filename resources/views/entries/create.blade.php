@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 20px;">
  <div class="row justify-content-center">
    <div class="col-md-6 createForm">
      <h3>Create Entry</h3>
      <form method="post" action="{{ route('entries.store') }}" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="form-group row">
          <label for="title" class="col-3 control-form-label col-form-label-md">Title</label>
          <div class="col-9">
            <input type="text" name="title" class="form-control" id="" placeholder="Entry title">
          </div>
        </div>
        <div class="form-group row">
          <label for="body" class="col-3 control-form-label col-form-label-md">Body</label>
          <div class="col-9">
            <textarea name="body" id="" rows="6" class="form-control" placeholder="Entry details"></textarea>
          </div>
        </div>
        <div class="form-group row">
        <label for="body" class="col-3 control-form-label col-form-label-md">Chose file</label>
          <div class="col-sm-9 input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
            </div>
            <div class="custom-file">
              <input type="file" name="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <div class="offset-md-2 col-md-10">
            <button type="submit" class="btn btn-outline-success link-btn">Create</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection