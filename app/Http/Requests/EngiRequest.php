<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EngiRequest extends FormRequest
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
            'engi.title' => 'required|max:100',
            'engi.item_num' => 'required|numeric|min:1|max:16'
        ];
    }

    public function validationData()
    {
        $return_data = [];
        $return_data['engi'] = json_decode($this->engi, true);

        return $return_data;
    }
}
