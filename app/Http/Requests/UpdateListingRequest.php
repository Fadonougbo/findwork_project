<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateListingRequest extends FormRequest
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
        $currentModel=$this->route()->parameter('listing');

        return [
            'title'=>['required',Rule::unique('listings','title')->ignoreModel($currentModel)],
            'company'=>['required',Rule::unique('listings','company')->ignoreModel($currentModel)],
            'location'=>['required'],
            'website'=>['required'],
            'email'=>['required','email'],
            'tags'=>['required'],
            'description'=>['required'],
            'slug'=>[Rule::unique('listings','slug')->ignoreModel($currentModel),'nullable'],
            'logo'=>['file','image'],
            'delete_status'=>['boolean']
        ];
    }
}
