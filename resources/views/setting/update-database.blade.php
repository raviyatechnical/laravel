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
@if($count > 0)
  <form action="{{ route('updatedatabase.post') }}" method="POST" role="form">
    {{ csrf_field() }}
    <button type="submit" class="btn btn-block btn-danger">{{ trans('common.update_now') }}</button>
  </form>
@else
  <div class="alert alert-success">
    <strong>There are no pending updates}</strong>
  </div>
@endif
<br>

<pre class="text-center">
{!! $output !!}
</pre>
@endsection