@extends('layouts.master')
@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <a href="{{ route('books.create') }}" class="btn btn-outline-success ms-0">Thêm mới</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên sách</th>
                            <th scope="col">Tác giả</th>
                            <th scope="col">Ngày xuất bản</th>
                            <th scope="col">Nhà xuất bản</th>
                            <th scope="col">Thể loại</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($data) > 0)
                            @foreach ($data as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->book_title }}</td>
                                    <td>{{ $row->author }}</td>
                                    <td>{{ $row->publish_date }}</td>
                                    <td>{{ $row->publisher }}</td>
                                    <td>{{ $row->group_name }}</td>
                                    <td>
                                        <form method="post" action="{{ route('books.destroy', $row->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('books.show', $row->id) }}" class="btn btn-outline-primary btn-sm">Xem</a>
                                            <a href="{{ route('books.edit', $row->id) }}" class="btn btn-outline-warning btn-sm">Sửa</i></a>
                                            <input type="submit" class="btn btn-outline-danger btn-sm" value="Xóa" />
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center">No Data Found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                {{-- {!! $data->links() !!} --}}
            </div>
        </div>
    </main>
@endsection('content')
