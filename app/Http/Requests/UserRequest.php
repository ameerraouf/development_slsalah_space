<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'first_name'    => 'required|string|max:100',
            'last_name'     => 'required|string|max:100',
            'email'         => 'required|email|unique:users,email|unique:investors,email',
            'password'      => 'required|string|min:8',
            'account_type'  => 'required|in:business_pioneer,investor',
            'company_count' => 'requiredIf:account_type,investor|numeric',
            'from'          => 'requiredIf:account_type,investor|numeric',
            'to'            => 'requiredIf:account_type,investor|numeric',
            'company_name'  => 'requiredIf:account_type,business_pioneer|string'
        ];
    }

}
