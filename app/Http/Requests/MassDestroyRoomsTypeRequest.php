<?php

namespace App\Http\Requests;

use App\RoomsType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyRoomsTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('rooms_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:rooms_types,id',
        ];
    }
}
