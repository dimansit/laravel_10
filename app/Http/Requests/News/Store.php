<?php

namespace App\Http\Requests\News;

use App\Enums\NewsStatus;
use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $newsStatus = NewsStatus::all();
        $category = (new Category())->getTable();
        return [
            'title'       => 'required|max:200',
            'author'      => 'required|string|min:4|max:50',
            'status'      => "required|in:".implode(',', $newsStatus),
            'description' => 'required|string',
            'category_id' => "required|exists:{$category},id",
        ];
    }
}
