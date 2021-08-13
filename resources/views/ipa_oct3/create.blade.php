@extends('ipa::app')


@section('menu')
<li>
    <a href="{{ url('ipa_oct3') }}">LIST</a>
</li>
@endsection


@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $bits }}</h5>
        {!! Form::open(['route' => 'ipa_oct3.store']) !!}
        {!! Form::hidden('bits', $bits) !!}
        {!! Form::submit('TO ENABLE',['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
@endsection
