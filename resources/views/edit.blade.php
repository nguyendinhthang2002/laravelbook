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
                <h3 class="text-center text-uppercase fw-bold">EDIT</h3>
                <form method="post" action="{{ route('books.update', $book->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblBookTitle">Tên sách</span>
                        <input type="text" class="form-control" name="book_title" value="{{ $book->book_title }}">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblAuthor">Tác giả</span>
                        <input type="text" class="form-control" name="author" value="{{ $book->author }}">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblPublishDate">Ngày xuất bản</span>
                        <input type="text" class="form-control" name="publish_date" value="{{ $book->publish_date }}">
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblPublisher">Nhà xuất bản</span>
                        <input type="text" class="form-control" name="publisher" value="{{ $book->publisher }}">
                    </div>

                    <div class="mb-3">
                        <select name="group_id" class="form-control" id="">
                            <option value="0">Chọn nhóm</option>
                            @if (!empty($allGroups))
                                @foreach ($allGroups as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('group_id') == $item->id || $book->group_id == $item->id ? 'selected' : false }}>
                                        {{ $item->name }}</option>
                                @endforeach
                            @endif
                        </select>
                        {{-- @error('group_id')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror --}}
                    </div>

                    <div class="form-group  float-end ">
                        <input type="hidden" name="hidden_id" value="{{ $book->id }}">
                        <input type="submit" value="Lưu" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </main>

@endsection('content')
