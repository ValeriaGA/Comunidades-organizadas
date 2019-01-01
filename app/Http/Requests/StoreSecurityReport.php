<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSecurityReport extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'title' => 'required|string|max:255',
            'community_group' => 'required',
            'date' => 'required|date|before_or_equal:today',
            'time' => 'required',
            'description' => 'required',
            'longitud' => 'required|numeric|between:-90,90',
            'latitud' => 'required|numeric|between:-180,180',
            'type' => 'required',
            'weapon' => 'required',
            'transportation' => 'required'
        ];
        if($this->request->get('victim_gender')){
            foreach($this->request->get('victim_gender') as $key => $val)
            {
                $rules['victim_gender.'.$key] = 'required';
            }
        }
        if($this->request->get('perpetrator_gender')){
            foreach($this->request->get('perpetrator_gender') as $key => $val)
            {
                $rules['perpetrator_gender.'.$key] = 'required';
                $rules['perpetrator_description.'.$key] = 'required';
            }
        }
        if($this->files->get('evidence_file')){
            foreach($this->files->get('evidence_file') as $key => $val)
            {
                $rules['evidence_file.'.$key] = 'required|file|max:2048';
            }
        }

        return $rules;
    }
}
