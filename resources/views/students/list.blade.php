@extends('layout.master')

@section('page_title', 'Student Page')

@section('content')


  <a href="/students/add" class="btn btn-dark my-5">Add Student</a>

  <form class="d-flex my-3" method="GET" action="{{route('showAllStudents')}}" >
    <input
    class="form-control me-2"
    type="search"
    name="search"
    placeholder="Type Student name or ID to search"
    aria-label="Search">
    <button class="btn btn-outline-success" type="submit">
        Search
    </button>
  </form>

  <table class="table table-success table-striped">
  <thead>
    <tr>
      <th scope="col">Student Name</th>
      <th scope="col">Student ID</th>
      <th scope="col">Student Age</th>
      <th scope="col">Registered Programme</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($students as $student)
      <tr>
        <th scope="row">{{$student->fullname}}</th>
        <td>{{$student->student_id}}</td>
        <td>{{$student->age}}</td>
        <td>{{$student->registeredProgramme->name}}</td>
            <td>
            <a type="button"
            href="{{route('updateStudent', ['id' => $student->id])}}" class="btn btn-dark">Edit</a>

            <a type="button" href="{{route('viewStudent', ['id' => $student->id])}}"
            class="btn btn-secondary">View</a>

            <button type="button"
            onclick="openModal('{{$student->name}}', '{{$student->id}}')"
            class="btn btn-success"
            data-bs-toggle="modal"
            data-bs-target="#deleteStudentModal">Delete</button>
        </td>
      </tr>

      @endforeach
    </tbody>
  </table>
  {{$students->links()}}

 <form action="/students" name="delete_form" method="POST">
    @method('DELETE')
    @csrf
    <input type="hidden" id="student_id_in_form" name="id">
</form>

{{-- confirmation modal --}}
<div class="modal fade" tabindex="-1" id="deleteStudentModal"
data-bs-backdrop="static"
data-bs-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirm Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>
            Are you sure you want to delete course :
            <strong><em><span id="student_name_in_modal"></span></em></strong> ?
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" onclick="deleteStudent()" class="btn btn-danger">Yes, delete record</button>
      </div>
    </div>
  </div>
</div>

<script>
    function openModal(studentName, studentId){
       const modalStudentName = document.getElementById('student_name_in_modal');
       const formStudentId = document.getElementById('student_id_in_form');
       modalStudentName.textContent = studentName;
       formSTUDENTId.value = studentId;
    }
    function deleteStudent() {
        const deleteForm = document.forms['delete_form'];
        deleteForm.submit();
    }
</script>
@endsection