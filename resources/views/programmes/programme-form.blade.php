@extends('layout.master')

@section('page_title', 'Add a Programmes')

@section('content')

@if($edit)
   <h2>Edit Programmes: {{$programmes->name}}</h2>
@else
  <h2>Add New Programme</h2>
@endif
<form action="/programmes" method="POST">
    @csrf
    @if($edit)
    <input type="hidden" name="id" value="{{$programmes->id}}">
    @method('PUT')
    @endif

  <div class="mb-3">
    <label for="name" class="form-label">Programme Name</label>
    <input type="text" required minlength="10" maxlength="100" class="form-control @error('name') is-invalid @enderror" name="name"
    value="{{old('name') ? old('name') : $programmes->name}}" >
    @error('name')
     <div class="invalid-feedback">{{ $message }}</div>
    @enderror

  <div class="mb-3">
    <label for="programme_id" class="form-label">Programme ID</label>
    <input type="text" required minlength="10" maxlength="100" class="form-control @error('programme_id') is-invalid @enderror" name="programme_id"
    value="{{old('programme_id') ? old('programme_id') : $programmes->programme_id}}" >
    @error('programme_id')
     <div class="invalid-feedback">{{ $message }}</div
      @enderror
     </div>

  <div class="mb-3">
    <label for="duration" class="form-label">Duration</label>
    <input type="number" required
    min="10" max="35" class="form-control @error('duration') is-invalid @enderror" name="duration"
    value="{{old('name') ? old('duration') : $programmes->duration}}" >
    @error('duration')
     <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
