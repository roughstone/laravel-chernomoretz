@extends('layouts.app')

@section('content')
<div class="col-12 row justify-content-center">
    <div class="row col-12 col-sm-8 col-lg-6 pt-1 text-white">
        <div class="row col-9 month-record" data-url="{{route('month.update', $data->id)}}">
            <p class="col-4 text-center py-sm-2 bg-primary">{{$data->date_bg}}</p>
            <p class="active col-4 text-center py-sm-2 @if($data->active === 1) bg-success @else bg-danger @endif">Активен</p>
            <p class="paid col-4 text-center py-sm-2 @if($data->paid === 1) bg-success @else bg-danger @endif">Платил</p>
        </div>
        <div class="row col-3" data-url="{{route('month.update', $data->id)}}">
            <p class="col-12 text-center py-sm-2 bg-primary" data-toggle="modal" data-target="#paymentModal">Добави</p>
        </div>
        @foreach ($data->payment as $payment)
        <div class="col-12 row month-record payment-container mb-1" data-url="{{route('payments.update', $payment->id)}}" data-payment="{{json_encode($payment)}}">
            <p class="col-6 bg-primary py-sm-2"><span>{{$payment->reason}}</span> <span class="float-right">{{$payment->amount}}</span></p>
            <p class="paid col-3 text-center py-sm-2 @if($payment->paid === 1) bg-success @else bg-danger @endif">Платил</p>
            <p class="edit bg-primary col-3 text-center py-sm-2" data-toggle="modal" data-target="#paymentModal">Промени</p>
        </div>
        @endforeach
    </div>
    @include('payments/modal')
</div>
@endsection
