<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Group;
use Illuminate\Http\Request;
use DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = Book::all();
        // $data = DB::table('books')
        //     ->join('groups', 'books.group_id', '=', 'groups.id')
        //     ->select('books.*', 'groups.name as group_name')
        //     ->get();
        // dd($data);

        $data = Book::join('groups', 'books.group_id', '=', 'groups.id')
        ->select('books.*', 'groups.name as group_name')
        ->get();

        return view('index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $groups = new Group();
        $allGroups = $groups->getAll();

        return view('create', compact('allGroups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'book_title' => 'required|string|max:255',
                'author' => 'required|string|max:255',
                'publish_date' => 'required|date',
                'publisher' => 'required|string|max:255',
                'group_id' => [
                    'required',
                    'integer',
                    function ($attribute, $value, $fail) {
                        if ($value == 0) {
                            $fail('Bắt buộc phải chọn nhóm');
                        }
                    },
                ],
            ],
            [
                'book_title.required' => 'Chưa nhập tên sách',
                'author.required' => 'Chưa nhập tên tác giả',
                'publish_date' => 'Chưa nhập ngày xuất bản',
                'publisher.required' => 'Chưa nhập nhà xuất bản',
                'group_id.required' => 'Nhóm không được để trống',
            ],
        );

        $book = new Book();

        $book->book_title = $request->book_title;
        $book->author = $request->author;
        $book->publish_date = $request->publish_date;
        $book->publisher = $request->publisher;
        $book->group_id = $request->group_id;

        $book->save();

        return redirect()
            ->route('books.index')
            ->with('success', 'Thêm sách thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $groups = new Group();
        $allGroups = $groups->getAll();

        return view('show', compact('book', 'allGroups'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $groups = new Group();

        $allGroups = $groups->getAll();

        return view('edit', compact('book', 'allGroups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate(
            [
                'book_title' => 'required|string|max:255',
                'author' => 'required|string|max:255',
                'publish_date' => 'required|date',
                'publisher' => 'required|string|max:255',
                'group_id' => [
                    'required',
                    'integer',
                    function ($attribute, $value, $fail) {
                        if ($value == 0) {
                            $fail('Bắt buộc phải chọn nhóm');
                        }
                    },
                ],
            ],
            [
                'book_title.required' => 'Chưa nhập tên sách',
                'author.required' => 'Chưa nhập tên tác giả',
                'publish_date' => 'Chưa nhập ngày xuất bản',
                'publisher.required' => 'Chưa nhập nhà xuất bản',
                'group_id.required' => 'Nhóm không được để trống',
            ],
        );
        $book = Book::find($request->hidden_id);

        $book->book_title = $request->book_title;
        $book->author = $request->author;
        $book->publish_date = $request->publish_date;
        $book->publisher = $request->publisher;
        $book->group_id = $request->group_id;

        $book->save();

        return redirect()
            ->route('books.index')
            ->with('success', 'Sửa sách thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()
            ->route('books.index')
            ->with('success', 'Xóa sách thành công.');
    }
}
