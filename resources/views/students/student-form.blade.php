@extends('layout.master')

@section('page_title', 'Add a Student')

@section('content')

@if($edit)
   <h3>Edit Student: {{$student->fullname}}</h3>
@else
    <h3>Add New Student</h3>
@endif

<form action="/students" method="POST">
    @csrf
    @if($edit)
    <input type="hidden" name="id" value="{{$student->id}}">
    @method('PUT')
    @endif
  <div class="mb-3">
    <label for="firstname" class="form-label">First Name</label>
    <input type="text" required
    {{-- minlength="10" maxlength="100" --}}
    class="form-control @error('firstname') is-invalid @enderror"
    name="firstname"
    value="{{old('firstname') ? old('firstname') : $student->firstname}}" >
    @error('firstname')
     <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="lastname" class="form-label">Last Name</label>
    <input type="text" required
    {{-- minlength="10" maxlength="100" --}}
    class="form-control @error('lastname') is-invalid @enderror"
    name="lastname"
    value="{{old('lastname') ? old('lastname') : $student->lastname}}" >
    @error('lastname')
     <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="date_of_birth" class="form-label">Date of Birth</label>
    <input type="date" required 
    class="form-control @error('course_id') is-invalid @enderror"
    name="date_of_birth"
    value="{{old('date_of_birth') ? old('date_of_birth') : $student->date_of_birth}}" >
    @error('date_of_birth')
     <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="student_id" class="form-label">Student ID</label>
    <input type="text" required
    minlength="4" maxlength="20"
    class="form-control @error('student_id') is-invalid @enderror"
    name="student_id"
    value="{{old('student_id') ? old('student_id') : $student->student_id}}" >
    @error('student_id')
     <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="gender" class="form-label">Gender</label>
    <select name="gender"  required =" " class="form-control @error('gender') is-invalid @enderror"
    name="gender"
    value="{{old('gender') ? old('student_id') : $student->gender}}" >
    @error('gender')
     <div class="invalid-feedback">{{ $message }}</div>
    @enderror>
        <option selected="selected" value="">--SELECT GENDER</option>
        <option value="M">Male</option>
        <option value="F">Female</option>
    </select>
</div>



  <div class="mb-3">
    <label for="contact" class="form-label">Contact</label>
    <input type="tel" required
    min="10" max="35"
    class="form-control @error('contact') is-invalid @enderror"
    name="contact"
    value="{{old('contact') ? old('contact') : $student->duration}}" >
    @error('contact')
     <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
  Select Programme(s)
   <select name="programme_id" id="programme_id" class=" mb-3 mt-3">
    <option >Select Programme</option>
@foreach ($programmes as $programme)
  <option class="programme_id" type="dropdown" value="{{$programme->id}}"
  @if($student->registeredProgramme == $programme) selected @endif>
{{$programme->name}}
  </option>
@endforeach
   </select>
</div>

  <button type="submit" class="btn btn-primary ">Submit</button>
</form>
@endsection