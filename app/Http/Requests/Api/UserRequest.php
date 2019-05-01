<?php

namespace App\Http\Requests\Api;

use App\Helpers\APIHelper;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

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
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|unique:users,email',
            'mobile'=>'required',
            'password'=>'required|min:6',
        ];
    }

    public function messages()
    {
        return[
            'first_name.required'=>[60001,'first name required'],
            'last_name.required'=>[60001,'last name required'],
            'mobile.required'=>[60001,'mobile required'],
            'email.required'=>[60001,'email required'],
            'email.unique'=>[60002,'email already taken'],
            'password.required'=>[60001,'first name required'],
            'password.min'=>'60004|At least minimum 6 characters need',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        $message=APIHelper::errorsResponse($errors);

        throw new HttpResponseException(response()->json($message,JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }
}
