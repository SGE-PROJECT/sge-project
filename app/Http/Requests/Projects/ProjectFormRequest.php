<?php

namespace App\Http\Requests\Projects;

use Illuminate\Foundation\Http\FormRequest;

class ProjectFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //'fullname_student' => 'required',
            //'id_student' => 'bail|required|numeric',
            //'group_student' => 'required',
            'phone_student' => 'bail|required|numeric',
            //'email_student' => 'bail|required|email',
            //'startproject_date' => 'bail|required|date',
            //'endproject_date' => 'bail|required|date',
            'name_project' => 'required',
            'company_name' => 'bail|required|string',
            'company_address' => 'bail|required|string',
            'name' => 'bail|required|string',
            'position' => 'bail|required|string',
            'phone' => 'bail|required|numeric',
            'email' => 'bail|required|email',
            'project_area' => 'bail|required|string',
            'general_objective' => 'bail|required|string',
            'problem_statement' => 'bail|required|string',
            'justification' => 'bail|required|string',
            'activities' => 'bail|required|string',
        ];
    }
}
