<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->hasAnyRole(['owner','teacher']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'path_trailer' => ['required', 'string', 'max:255'],
            'about' => ['required', 'string'],
            'thumbnail' => ['sometimes', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            'category_id' => ['required', 'exists:categories,id'],
            'course_keypoints.*' => ['required', 'string', 'max:255'],
        ];
    }
}