@extends('ipa::app')


@section('menu')
<li>
    <a href="{{ url('ipa_oct4/' . $ipa_oct4->bits) }}">BACK</a>
</li>
@endsection


@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">EDIT</h5>
        {!! Form::model($ipa_oct4,['route' => ['ipa_oct4.update', $ipa_oct4->bits],'method' => 'PUT']) !!}
        
        <div class="mb-3">
            <label for="" class="form-label">Descript</label>
            {!! Form::text('descript',$ipa_oct4->descript,['class'=>'form-control']) !!}
        </div>
        
        <div class="mb-3">
            <label for="" class="form-label">Status</label>
            {!! Form::select('status',config('ipa.status'),$ipa_oct4->status,['class'=>'form-control']) !!}
        </div>
        
        {!! Form::submit('SUBMIT',['class'=>'btn btn-primary']) !!}
        
        {!! Form::close() !!}
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">DELETE</h5>
        {!! Form::model($ipa_oct4,['route' => ['ipa_oct4.destroy', $ipa_oct4->bits],'method' => 'delete']) !!}
        {!! Form::submit('DELETE',['class'=>'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
</div>
@endsection
