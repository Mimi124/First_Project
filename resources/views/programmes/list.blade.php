@extends('layout.master')

@section('page_title', 'List of Programmes')

@section('content')
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Programme Name</th>
      <th scope="col">Programme ID</th>
      <th scope="col">Duration</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($programmes as $programmes)
      <tr>
        <th scope="row">{{$programmes->name}}</th>
        <td>{{$programmes->programme_id}}</td>
        <td>{{$programmes->duration}} day(s)</td>
      </tr>

      @endforeach
  </tbody>
</table>
@endsection
