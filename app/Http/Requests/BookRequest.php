<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
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
        ];
    }

    public function message()
    {
        return [
            'book_title.required' => 'Chưa nhập tên sách',
            'author.required' => 'Chưa nhập tên tác giả',
            'publish_date' => 'Chưa nhập ngày xuất bản',
            'publisher.required' => 'Chưa nhập nhà xuất bản',
            'group_id.required' => 'Nhóm không được để trống',
        ];
    }
}
