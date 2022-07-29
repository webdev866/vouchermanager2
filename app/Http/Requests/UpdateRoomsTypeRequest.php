<?php

namespace App\Http\Requests;

use App\RoomsType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRoomsTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('rooms_type_edit');
    }

    public function rules()
    {
        return [
            'room_type' => [
                'string',
                'required',
            ],
        ];
    }
}
