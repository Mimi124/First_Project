@extends('layout.master')

@section('page_title', 'List of courses')

@section('content')
<div>
    <a href="/courses/add" class="btn btn-dark my-5">Add Course</a>
</div>
  <table class="table table-success table-bordered">
  <thead>
    <tr>
      <th scope="col">Course Name</th>
      <th scope="col">Course ID</th>
      <th scope="col">Duration</th>
      <th scope="col">Programmes</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($courses as $course)
      <tr>
        <th scope="row">{{$course->name}}</th>
        <td>{{$course->course_id}}</td>
        <td>{{$course->duration}} day(s)</td>
        <td>
          @foreach ($course->programmes as $programmes)
          <a href="{{route('viewProgramme',['id'=>$programmes->id])}}">{{ $programmes->name }}</a>
      @endforeach
        <td>
            <a type="button"
            href="{{route('updateCourse', ['id' => $course->id])}}"
            class="btn btn-dark">Edit</a>

            <button type="button"
            onclick="openModal('{{$course->name}}', '{{$course->id}}')"
            class="btn btn-success"
            data-bs-toggle="modal"
            data-bs-target="#deleteCourseModal">Delete</button>
        </td>
      </tr>

      @endforeach
  </tbody>
</table>

 <form action="/courses" name="delete_form" method="POST">
    @method('DELETE')
    @csrf
    <input type="hidden" id="course_id_in_form" name="id">
</form>

{{-- confirmation modal --}}
<div class="modal fade" tabindex="-1" id="deleteCourseModal"
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
            <strong><em><span id="course_name_in_modal"></span></em></strong> ?
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" onclick="deleteCourse()" class="btn btn-danger">Yes, delete record</button>
      </div>
    </div>
  </div>
</div>

<script>
    function openModal(courseName, courseId){
       const modalCourseName = document.getElementById('course_name_in_modal');
       const formCourseId = document.getElementById('course_id_in_form');
       modalCourseName.textContent = courseName;
       formCourseId.value = courseId;
    }
    function deleteCourse(){
        const deleteForm = document.forms['delete_form'];
        deleteForm.submit();
    }
</script>
@endsection