@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-6">
                    <a href="{{ route('books.index') }}" class="btn btn-primary btn-sm float-end">Xem tất cả</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"><b>Mã sách</b></label>
                <div class="col-sm-10">
                    {{ $book->id }}
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form"><b>Tên sách</b></label>
                <div class="col-sm-10">
                    {{ $book->book_title }}
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form"><b>Tác giả</b></label>
                <div class="col-sm-10">
                    {{ $book->author }}
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form"><b>Ngày xuất bản</b></label>
                <div class="col-sm-10">
                    {{ $book->publish_date }}
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form"><b>Nhà xuất bản</b></label>
                <div class="col-sm-10">
                    {{ $book->publisher }}
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form"><b>Thể loại</b></label>
                <div class="col-sm-10">
                    @if ($book->group_id == 1)
                        {{'Văn học'}}
                    @else
                        {{'Tiểu thuyết'}}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection('content')
