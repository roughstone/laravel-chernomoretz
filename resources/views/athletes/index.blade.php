@extends('layouts.app')

@section('content')
    @foreach ($dataset as $data)
        <div class="row col-12 col-sm-4 col-lg-3 border border-info text-white">
            <a class="text-center bg-primary col-12 p-0 m-0" href="{{ route('athletes.show', $data->id) }}">
                <span>{{$data->f_name}}</span> <span>{{$data->m_name}}</span> <span>{{$data->l_name}}</span>
                @if (count($data->payments) > 0)
                    @php
                        $count = 0;
                        foreach ($data->payments as $payment) {
                            if ($payment->paid == 0) {
                                $count++;
                            }
                        }
                    @endphp
                    @if ($count > 0)
                        <span class="font-weight-bold absolute-right">Задължения {{$count}}</span>
                    @endif
                @endif
            </a>
            <a class="col-3 px-0" href="{{ route('athletes.show', $data->id) }}">
                <div class="w-100 h-100 athlete-image" style="background-image: url('{{ !empty($data->image) ? $data->image : Storage::disk('images')->url('kid.svg')}}')">
                </div>
            </a>
            @foreach ($data->currentThreeMonths as $month)
                <div class="col-3 month-record px-0 @if(!$loop->last) border-right border-white @endif"
                    data-url="{{route('month.update', $month->id)}}">
                    <p class="show-month h-33 text-center border-bottom border-white bg-dark p-0 m-0">
                        {{substr($month->date_bg, 0, strrpos($month->date_bg, ' '))}}
                    </p>
                    <p class="active h-33 text-center border-bottom border-white p-0 m-0 @if($month->active === 1) bg-success @else bg-danger @endif">Активен</p>
                    <p class="paid h-33 text-center p-0 m-0 @if($month->paid === 1) bg-success @else bg-danger @endif">Платил</p>
                </div>
            @endforeach
        </div>
    @endforeach
@endsection
