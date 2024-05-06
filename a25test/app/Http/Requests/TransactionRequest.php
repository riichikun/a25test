<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
{
    public function rules(): array
    {
        $rules = [
            'employee_id' => 'required|integer|exists:mysql.employees,id',
        ];
        switch ($this->getMethod()) {
            case 'GET':
            case 'DELETE':
                return $rules;
            case 'POST':
                $rules['hours'] = 'required|integer';
                return $rules;
        }
    }
}
