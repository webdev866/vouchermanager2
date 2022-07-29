<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRoomsTypeRequest;
use App\Http\Requests\StoreRoomsTypeRequest;
use App\Http\Requests\UpdateRoomsTypeRequest;
use App\RoomsType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoomsTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('rooms_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roomsTypes = RoomsType::all();

        return view('admin.roomsTypes.index', compact('roomsTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('rooms_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.roomsTypes.create');
    }

    public function store(StoreRoomsTypeRequest $request)
    {
        $roomsType = RoomsType::create($request->all());

        return redirect()->route('admin.rooms-types.index');
    }

    public function edit(RoomsType $roomsType)
    {
        abort_if(Gate::denies('rooms_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.roomsTypes.edit', compact('roomsType'));
    }

    public function update(UpdateRoomsTypeRequest $request, RoomsType $roomsType)
    {
        $roomsType->update($request->all());

        return redirect()->route('admin.rooms-types.index');
    }

    public function show(RoomsType $roomsType)
    {
        abort_if(Gate::denies('rooms_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roomsType->load('roomTypeCreateVouchers');

        return view('admin.roomsTypes.show', compact('roomsType'));
    }

    public function destroy(RoomsType $roomsType)
    {
        abort_if(Gate::denies('rooms_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roomsType->delete();

        return back();
    }

    public function massDestroy(MassDestroyRoomsTypeRequest $request)
    {
        RoomsType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
