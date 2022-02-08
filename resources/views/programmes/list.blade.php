@extends('layout.master')

@section('page_title', 'List of Programmes')

@section('content')
<a href="/programmes/add" class="btn btn-dark my-5">Add Programme</a>
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
        <td>
          <a type="button" href="{{route('updateProgrammes', ['id' => $programmes->id])}}" class="btn btn-dark">Edit</a>
          <button type="button" onclick="openModal('{{$programmes->name}}', '{{$programmes->id}}')" class="btn btn-success"
          data-bs-toggle="modal"
          data-bs-target="#deleteProgrammeModal">Delete</button>
      </td>
      </td>
      </tr>

      @endforeach
  </tbody>
</table>

<form action="/programmes" name="delete_form" method="POST">
  @method('DELETE')
  @csrf
  <input type="hidden" id="programme_id_in_form" name="id">
</form>

{{-- confirmation modal --}}
<div class="modal fade" tabindex="-1" id="deleteProgrammeModal"
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
          Are you sure you want to delete Programme :
          <strong><em><span id="programme_name_in_modal"></span></em></strong> ?
      </p>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      <button type="button" onclick="deleteProgramme()" class="btn btn-danger">Yes, delete record</button>
    </div>
  </div>
</div>
</div>

<script>
  function openModal(programmeName, programmeId){
     const modalProgrammeName = document.getElementById('programme_name_in_modal');
     const formProgrammeId = document.getElementById('programme_id_in_form');
     modalProgrammeName.textContent = programmeName;
     formProgrammeId.value = programmeId;
  }
  function deleteProgramme(){
      const deleteForm = document.forms['delete_form'];
      deleteForm.submit();
  }
</script>
@endsection