<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThemeRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
            {
                return [
                    'name'       => 'required|min:3|max:150',
                    'image1' => 'nullable|image|max:2048|dimensions:min_width=960,min_height=540',
                    'image2' => 'nullable|image|max:2048|dimensions:min_width=960,min_height=540',
                    'image3' => 'nullable|image|max:2048|dimensions:min_width=960,min_height=540',
                    'image4' => 'nullable|image|max:2048|dimensions:min_width=960,min_height=540',
                    'image5' => 'nullable|image|max:2048|dimensions:min_width=960,min_height=540',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name'      => 'required|min:3|max:150' ,
                    'image1' => 'nullable|image|max:2048|dimensions:min_width=960,min_height=540',
                    'image2' => 'nullable|image|max:2048|dimensions:min_width=960,min_height=540',
                    'image3' => 'nullable|image|max:2048|dimensions:min_width=960,min_height=540',
                    'image4' => 'nullable|image|max:2048|dimensions:min_width=960,min_height=540',
                    'image5' => 'nullable|image|max:2048|dimensions:min_width=960,min_height=540',
                ];
            }
            default: break;
        }
    }

    public function messages()
    {
        // use trans instead on Lang
        return [
            'image1.dimensions' => trans('hinterror'),
            'image2.dimensions' => trans('hinterror'),
            'image3.dimensions' => trans('hinterror'),
            'image4.dimensions' => trans('hinterror'),
            'image5.dimensions' => trans('hinterror'),
        ];
    }
}
