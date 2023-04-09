<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('book_title');
            $table->string('author');
            $table->date('publish_date');
            $table->string('publisher');
            $table->unsignedBigInteger('group_id');
            $table->foreign('group_id')->references('id')->on('groups');
            $table->timestamps();
        });

        $books = [
            [
                'book_title' => 'Tiểu thuyết Đắc nhân tâm',
                'author' => 'Dale Carnegie',
                'publish_date' => '1936-10-01',
                'publisher' => 'Simon & Schuster',
                'group_id' => '1',
            ],
            [
                'book_title' => 'Truyện Kiều',
                'author' => 'Nguyễn Du',
                'publish_date' => '1814-01-01',
                'publisher' => 'Văn học',
                'group_id' => 2,
            ],
            [
                'book_title' => '1984',
                'author' => 'George Orwell',
                'publish_date' => '1949-06-08',
                'publisher' => 'Secker & Warburg',
                'group_id' => 1,
            ]
        ];

        DB::table('books')->insert($books);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
