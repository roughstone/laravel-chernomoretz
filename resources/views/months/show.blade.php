@extends('layouts.app')

@section('content')
<div class="col-12 row justify-content-center">
    <div class="row col-12 col-sm-8 col-lg-6 pt-1 text-white athlete-container">
        <p class="text-center bg-primary col-12 py-sm-2 mb-2">
            <span class="athlete-name">{{$data->athlete->f_name}} {{$data->athlete->m_name}} {{$data->athlete->l_name}}</span>
        </p>
        <div class="row col-9 month-record" data-url="{{route('month.update', $data->id)}}">
            <p class="col-4 text-center py-sm-2 bg-primary">{{$data->date_bg}}</p>
            <p class="active col-4 text-center py-sm-2 @if($data->active === 1) bg-success @else bg-danger @endif">Активен</p>
            <p class="paid col-4 text-center py-sm-2 @if($data->paid === 1) bg-success @else bg-danger @endif">Платил</p>
        </div>
        <div class="row col-3" data-url="{{route('month.update', $data->id)}}">
            <p class="col-12 text-center py-sm-2 bg-primary" data-toggle="modal" data-target="#paymentModal">Добави</p>
        </div>
        @foreach ($data->payment as $payment)
        <div class="col-12 row month-record payment-container" data-url="{{route('payments.update', $payment->id)}}" data-payment="{{json_encode($payment)}}">
            <p class="col-6 bg-primary m-0 mt-1 reason"><span>{{$payment->reason}}</span> <span class="float-right">{{$payment->amount}}лв.</span></p>
            <p class="paid col-3 text-center m-0 mt-1 @if($payment->paid === 1) bg-success @else bg-danger @endif">Платил</p>
            <p class="edit bg-primary col-3 text-center m-0 mt-1" data-toggle="modal" data-target="#paymentModal">Промени</p>
        </div>
        @endforeach
    </div>
    @include('payments/modal')
</div>
@endsection
