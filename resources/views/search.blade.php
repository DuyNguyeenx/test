@extends('templates.layout')
@section('content')
@include('templates.error')
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Tel</th>
            <th>Action</th>
        </tr>
    </thead>


    <tbody>
        @foreach ($employee as $item)
        <tr>
            <td>{{$item->id }}</td>
            <td>{{htmlspecialchars($item->name) }}</td>
            <td>{{$item->email }}</td>
            <td>{{$item->tel }}</td>
            <td>
                <a class="icon-link" href="{{ route('employee.edit',[$item->id])}}">Edit</a>
                <a class="icon-link" href="{{ route('employee.delete',[$item->id])}}" onclick="confirm('bạn có chắc chắn muốn xóa không?')">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
<button class="btn btn-primary"><a class="text-white" href="{{ route('employee.index') }}">Back</a></button>
@endsection
