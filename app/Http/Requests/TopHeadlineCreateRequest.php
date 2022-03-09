<?php

namespace App\Http\Requests;

use App\Services\CategoryService;
use App\Services\CountryService;
use Illuminate\Foundation\Http\FormRequest;

class TopHeadlineCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            "category" => 'nullable|in:'. collect(CategoryService::all())->flatten(),
            "country" => 'nullable|in:'. collect(CountryService::all())->flip()->flatten(),
            'search' => 'nullable|string'
        ];
    }
}
