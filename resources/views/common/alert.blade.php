@if(session()->has('alert'))
<div class="alert alert-success" role="alert">
 {{session('alert')}}
</div>
@endif