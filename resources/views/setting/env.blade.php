@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Env Config</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
      {{-- <a class="btn btn-sm btn-outline-success" href="{{ route('users.create') }}"> Create New User</a> --}}
    </div>
  </div>
</div>
<x-alert/>
<form action="{{ route('saveEnv') }}" method="post">
	@csrf

	<textarea class="form-control" name="env"  rows="30">
    {{ $env }}
  </textarea>

	<br>
	<button type="submit" class="btn pull-right btn-danger"> Save .ENV </button>
</form>
@endsection