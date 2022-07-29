@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.roomsType.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.rooms-types.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('room_type') ? 'has-error' : '' }}">
                            <label class="required" for="room_type">{{ trans('cruds.roomsType.fields.room_type') }}</label>
                            <input class="form-control" type="text" name="room_type" id="room_type" value="{{ old('room_type', '') }}" required>
                            @if($errors->has('room_type'))
                                <span class="help-block" role="alert">{{ $errors->first('room_type') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.roomsType.fields.room_type_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection