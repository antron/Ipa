@extends('ipa::app')


@section('menu')
<li>
    <a href="{{ url('ipa_oct2') }}">LIST</a>
</li>
@endsection


@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">CREATE</h5>

        {!! Form::open(['route' => 'ipa_oct2.store']) !!}
        <div class="mb-3">
            <label for="" class="form-label">IP Address</label>
            {!! Form::text('bits', '',['class'=>'form-control','placeholder'=>'192.168']) !!}
        </div>
        {!! Form::submit('CREATE',['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
@endsection
