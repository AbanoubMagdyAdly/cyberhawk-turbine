<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateInspectionRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'turbine_components' => 'required|array',
            'turbine_components.*.turbine_components_id' => 'required|integer|exists:turbine_components,id',
            'turbine_components.*.grade' => 'required|integer|min:1|max:5',
        ];
    }
}
