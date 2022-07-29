@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.roomsType.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.rooms-types.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.roomsType.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $roomsType->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.roomsType.fields.room_type') }}
                                    </th>
                                    <td>
                                        {{ $roomsType->room_type }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.rooms-types.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.relatedData') }}
                </div>
                <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                    <li role="presentation">
                        <a href="#room_type_create_vouchers" aria-controls="room_type_create_vouchers" role="tab" data-toggle="tab">
                            {{ trans('cruds.createVoucher.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="room_type_create_vouchers">
                        @includeIf('admin.roomsTypes.relationships.roomTypeCreateVouchers', ['createVouchers' => $roomsType->roomTypeCreateVouchers])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection