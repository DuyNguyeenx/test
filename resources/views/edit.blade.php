@extends('templates.layout')
@section('content')
@include('templates.error')
<form method="post" action="{{ route('employee.edit',[$employee->id]) }} " enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" value="{{$employee->name}}">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label"> Email</label>
        <input type="text" class="form-control" name="email" value="{{$employee->email}}">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label"> Tel</label>
        <input type="tel" class="form-control" name="tel" value="{{$employee->tel}}">
      </div>


<button type="submit" class="btn btn-primary">Update</button>
<button class="btn btn-primary"><a class="text-white" href="{{ route('employee.index') }}">Back</a></button>
</form>
@endsection


