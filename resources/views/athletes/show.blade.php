@extends('layouts.app')

@section('content')
<div class="row col-12 justify-content-center">
    <div class="row col-12 col-sm-7 border border-info text-white">
        <a class="col-4 px-0" href="{{ route('athletes.edit', $data->id) }}">
            <div class="w-100 h-100 athlete-image" style="background-image: url('{{ !empty($data->image) ? $data->image : Storage::disk('images')->url('kid.svg')}}')">
            </div>
        </a>
        <div class="row col-8 row">
            <a class="text-center bg-primary col-12 p-sm-3 m-0" href="{{ route('athletes.edit', $data->id) }}">
                <span>{{$data->f_name}}</span> <span>{{$data->m_name}}</span> <span>{{$data->l_name}}</span>
            </a>
            @foreach ($data->currentThreeMonths as $month)
                <div class="col-4 month-record px-0 @if(!$loop->last) border-right border-white @endif"
                    data-url="{{route('month', $month->id)}}">
                    <p class="h-33 text-center border-bottom border-white bg-dark p-sm-3 m-0">
                        {{substr($month->date_bg, 0, strrpos($month->date_bg, ' '))}}
                    </p>
                    <p class="active h-33 text-center border-bottom border-white p-sm-3 m-0 @if($month->active === 1) bg-success @else bg-danger @endif">Активен</p>
                    <p class="paid h-33 text-center p-sm-3 m-0 @if($month->paid === 1) bg-success @else bg-danger @endif">Платил</p>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row col-12 col-sm-7 my-3 my-sm-0 text-center text-white">
        <a class="col-6 p-sm-3 m-0 bg-success h5" href="">Плащане</a>
        <a class="col-6 p-sm-3 m-0 bg-primary h5" href="">Промени</a>
        <a class="col-6 p-sm-3 m-0 bg-danger h5" href="">Деактивирай</a>
        <a class="col-6 p-sm-3 m-0 bg-dark h5" href="">Изтрий</a>
    </div>
    <div class="row col-12 col-sm-7 my-sm-0 text-center text-white">
        <p class="text-center bg-primary col-12 m-0">
            Всички тренирани месеци:
        </p>
        <a class="col-12 bg-success m-0 h5 py-1" href="">Покажи плащания</a>
        @foreach ($data->allMonths as $month)
            <div class="col-3 col-sm-2 month-record px-0 @if(!$loop->last) border-right border-white @endif"
                data-url="{{route('month', $month->id)}}">
                <p class="h-33 text-center border-bottom border-white bg-dark p-sm-3 m-0">
                    {{ $month->date_bg }}
                </p>
                <p class="active h-33 text-center border-bottom border-white p-sm-3 m-0 @if($month->active === 1) bg-success @else bg-danger @endif">Активен</p>
                <p class="paid h-33 text-center p-sm-3 m-0 @if($month->paid === 1) bg-success @else bg-danger @endif">Платил</p>
            </div>
        @endforeach
    </div>
</div>
@endsection
