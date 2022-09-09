<?php

namespace App\Http\Requests\Consultation;

use App\Models\MasterData\Consultation;
// use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

// this rule only at update&request
use Illuminate\Validation\Rule;

class UpdateConsultationRequest extends FormRequest
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
            'name' => [
                'required', 'email', 'max:255', Rule::unique('consultation')->ignore($this->consultation),
                // rule unique only works for other record id
            ],
        ];
    }
}
