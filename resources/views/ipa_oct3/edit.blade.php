@extends('ipa::app')


@section('menu')
<li>
    <a href="{{ url('ipa_oct3/' . $ipa_oct3->bits) }}">BACK</a>
</li>
@endsection


@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">EDIT</h5>
        {!! Form::model($ipa_oct3,['route' => ['ipa_oct3.update', $ipa_oct3->bits],'method' => 'PUT']) !!}
        
        <div class="mb-3">
            <label for="" class="form-label">Descript</label>
            {!! Form::text('descript',$ipa_oct3->descript,['class'=>'form-control']) !!}
        </div>
        
        <div class="mb-3">
            <label for="" class="form-label">Descript</label>
        {!! Form::select('status',config('ipa.status'),$ipa_oct3->status,['class'=>'form-control']) !!}
        </div>
        {!! Form::submit('SUBMIT',['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">DELETE</h5>
        {!! Form::model($ipa_oct3,['route' => ['ipa_oct3.destroy', $ipa_oct3->bits],'method' => 'delete']) !!}
        {!! Form::submit('DELETE') !!}
        {!! Form::close() !!}
    </div>
</div>
@endsection
