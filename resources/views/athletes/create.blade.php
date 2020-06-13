@extends('layouts.app')

@section('content')
@if (\Session::has('msg'))
<h3 class="row justify-content-center">
    <span class="bg-danger text-white rounded p-2 mt-1">{{\Session::get('msg')}}</</span>
</h3>
@endif
<div class="container-fluid row justify-content-center px-2">
    <form class="col-12 col-sm-10 col-xl-6 row" method="POST" enctype="multipart/form-data"
        action="{{ empty($data) ? route('athletes.store') : route('athletes.update', $data->id) }}">
        @if (!empty($data))
            @method('PUT')
        @else
            @method('POST')
        @endif
        {{ csrf_field() }}
        <div class="input-group custom-image-upload-container justify-content-center mt-3">
            <img class="athlete" src="{{ !empty($data->image) ? $data->image : Storage::disk('images')->url('kid.svg')}}"
                alt="{{ !empty($data->title) ? $data->title : ''}}">
            <div class="custom-file d-none">
                <input id="image-input" type="text" value="{{ !empty($data->image) ? $data->image : ''}}"
                class="form-control @error('image') is-invalid @enderror" name="image" placeholder="Имена на треиращия">
                <input type="file" class="custom-file-input" id="file_image" name="file_image" accept="image/png, image/jpeg">
            </div>
        </div>

        <div class="input-group mt-3 col-4 px-0">
            <input id="f_name" type="text" value="{{ !empty($data->f_name) ? $data->f_name : ''}}"
            class="form-control @error('f_name') is-invalid @enderror" name="f_name" placeholder="Име" required>

            @error('f_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-group mt-3 col-4 px-0">
            <input id="m_name" type="text" value="{{ !empty($data->m_name) ? $data->m_name : ''}}"
            class="form-control @error('m_name') is-invalid @enderror" name="m_name" placeholder="Презиме">

            @error('m_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-group mt-3 col-4 px-0">
            <input id="l_name" type="text" value="{{ !empty($data->l_name) ? $data->l_name : ''}}"
            class="form-control @error('l_name') is-invalid @enderror" name="l_name" placeholder="Фамилия" required>

            @error('l_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-group mt-3">
            <input id="parent_names" type="text" value="{{ !empty($data->parent_names) ? $data->parent_names : ''}}"
            class="form-control @error('parent_names') is-invalid @enderror" name="parent_names" placeholder="Имена на родителя">

            @error('parent_names')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-group mt-3">
            <input id="month_payment" type="text" value="{{ !empty($data->month_payment) ? $data->month_payment : ''}}"
            class="form-control @error('month_payment') is-invalid @enderror" name="month_payment" placeholder="Месечна такса">

            @error('month_payment')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-group mt-3">
            <input id="viber" type="text" value="{{ !empty($data->viber) ? $data->viber : ''}}"
            class="form-control @error('viber') is-invalid @enderror" name="viber" placeholder="Viber номер">

            @error('viber')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary w-100 w-md-50 mt-3">
            {{ __('forms.save') }}
        </button>
    </form>
</div>
@endsection
