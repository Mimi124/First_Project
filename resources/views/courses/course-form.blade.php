@extends('layout.master')

@section('page_title', 'Add a course')

@section('content')
<form action="/courses" method="POST">
    @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Course Name</label>
    <input type="text" class="form-control" name="name" >
  </div>

  <div class="mb-3">
    <label for="course_id" class="form-label">Course ID</label>
    <input type="text"  class="form-control" name="course_id" >
  </div>

  <div class="mb-3">
    <label for="duration" class="form-label">Duration (in days)</label>
    <input type="number"  class="form-control" name="duration" >
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
