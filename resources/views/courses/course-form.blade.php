@extends('layout.master')

@section('page_title', 'Add a course')

@section('content')

@if($edit)
   <h3>Edit Course: {{$course->name}}</h3>
@else
    <h3>Add New Course</h3>
@endif

<form action="/courses" method="POST">
    @csrf
    @if($edit)
    <input type="hidden" name="id" value="{{$course->id}}">
    @method('PUT')
    @endif
  <div class="mb-3">
    <label for="name" class="form-label">Course Name</label>
    <input type="text" required
    minlength="10" maxlength="100"
    class="form-control @error('name') is-invalid @enderror"
    name="name"
    value="{{old('name') ? old('name') : $course->name}}" >
    @error('name')
     <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="course_id" class="form-label">Course ID</label>
    <input type="text" required
    minlength="4" maxlength="20"
    class="form-control @error('course_id') is-invalid @enderror"
    name="course_id"
    value="{{old('course_id') ? old('course_id') : $course->course_id}}" >
    @error('course_id')
     <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

  <div class="mb-3">
    <label for="duration" class="form-label">Duration (in days)</label>
    <input type="number" required
    min="10" max="35"
    class="form-control @error('duration') is-invalid @enderror"
    name="duration"
    value="{{old('name') ? old('duration') : $course->duration}}" >
    @error('duration')
     <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
  Select Programme(s)
@foreach ($programmes as $programmes)
  <div class="form-check">
  <input class="form-check-input" type="checkbox" value="{{$programmes->id}}" name="programmes[]"
  @if($course->programmes->contains($programmes)) checked @endif>
  <label class="form-check-label" for="programmes">
  {{$programmes->name}} ({{$programmes->programme_id}})
  </label>
  </div>
@endforeach
</div>

  <button type="submit" class="btn btn-primary ">Submit</button>
</form>
@endsection