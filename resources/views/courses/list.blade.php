@extends('layout.master')

@section('page_title', 'List of courses')

@section('content')
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Course Name</th>
      <th scope="col">Course ID</th>
      <th scope="col">Duration</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($courses as $course)
      <tr>
        <th scope="row">{{$course->name}}</th>
        <td>{{$course->course_id}}</td>
        <td>{{$course->duration}} day(s)</td>
      </tr>

      @endforeach
  </tbody>
</table>
@endsection
