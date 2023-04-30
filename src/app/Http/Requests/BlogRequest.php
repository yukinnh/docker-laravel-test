<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'article.title' => 'required|string|max:100',
            'article.period_start' => 'required|date',
            'article.period_end' => 'required|date|after_or_equal:article.period_start',
            'article.abstract' => 'required|string|max:500',
        ];
    }
}
