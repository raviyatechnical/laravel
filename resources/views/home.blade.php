@extends('layouts.app')
@section('head')
<style>
    .bs-example{
    	margin: 20px;
/*        position: relative;
*/    }
</style>
<script>
    $(document).ready(function(){
        $(".show-toast").click(function(){
            $("#myToast").toast('show');
        });
    });
</script>
@endsection
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">{{ __('Dashboard') }}</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
      {{-- <a class="btn btn-sm btn-outline-success" href="{{ route('roles.index') }}">Back</a> --}}
    </div>
  </div>
</div>                
@if (session('status'))
<div class="alert alert-success" role="alert">
{{ session('status') }}
</div>
@endif

{{ __('You are logged in!') }}
<div class="bs-example">
	<p><strong>Note:</strong> By default toasts will automatically hide if you do not set autohide to false.</p>
	<button type="button" class="btn btn-primary show-toast">Show Toast</button>

    <div style="position: relative; min-height: 300px;">

    <div class="toast" id="myToast" style="position: absolute; top: 0; right: 0;">
        <div class="toast-header">
            <strong class="mr-auto"><i class="fa fa-grav"></i>Raj Technologies</strong>
            <small>11 mins ago</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            <div>It's been a long time since you visited us. We've something special for you. <a href="#">Click here!</a></div>
        </div>
    </div>

	</div>
</div>
@endsection
