<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class ListingFormRequest extends FormRequest
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
        return [
            'title'=>['required','unique:listings,title'],
            'company'=>['required','unique:listings,company'],
            'location'=>['required'],
            'website'=>['required'],
            'email'=>['required','email'],
            'tags'=>['required'],
            'description'=>['required'],
            'slug'=>['unique:listings,slug','nullable'],
            'logo'=>['file','image']
        ];
    }

    public function prepareForValidation() {
        return $this->merge([
            'slug'=>Str::slug( $this->input('slug')??$this->input('company') )
        ]);
    }
}
