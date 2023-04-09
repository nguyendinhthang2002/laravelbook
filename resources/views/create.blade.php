@extends('layouts.master')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">ADD</h3>
                <form method="post" action="{{ route('books.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblBookTitle">Tên sách</span>
                        <input type="text" class="form-control" name="book_title">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblAuthor">Tác giả</span>
                        <input type="text" class="form-control" name="author">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblPublishDate">Ngày xuất bản</span>
                        <input type="text" class="form-control" name="publish_date">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblPublisher">Nhà xuất bản</span>
                        <input type="text" class="form-control" name="publisher">
                    </div>

                    <div class="mb-3">
                        <select name="group_id" class="form-control" id="">
                            <option value="0">Chọn nhóm</option>
                            @if (!empty($allGroups))
                                @foreach ($allGroups as $item)
                                    <option value="{{ $item->id }}" {{ old('group_id') == $item->id ? 'selected' : false }}>{{ $item->name }}</option>
                                @endforeach
                            @endif
                        </select>
                        {{-- @error('group_id')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror --}}
                    </div>

                    <div class="form-group  float-end ">
                        <input type="submit" value="Lưu" class="btn btn-success">
                        <a href="{{route('books.index')}}" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>

@endsection('content')
