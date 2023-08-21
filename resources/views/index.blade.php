@extends('templates.layout')
@section('content')
    <a class="icon-link mb-3" href="{{ route('employee.create')}}">Add</a>
    <form action="{{ route('employee.search')}}" method="GET">
        <span>Tìm kiếm nhân viên bằng tên. Nếu không có điều kiện, thì hiện thị toàn bộ. </span>
        <input type="text" name="keyword" class="form-control w-25 mb-2">
        <button type="submit" class="btn btn-dark">Search</button>
    </form>



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
            @foreach ($paginate as $item)
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

        <div class="pagination::bootstrap-4">
            {{ $paginate->links('name') }}
        </div>


@endsection
