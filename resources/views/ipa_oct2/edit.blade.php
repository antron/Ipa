@extends('ipa::app')


@section('menu')
<li>
    <a href="{{ url('ipa_oct2/' . $ipa_oct2->bits) }}">BACK</a>
</li>
@endsection


@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">EDIT</h5>
        {!! Form::model($ipa_oct2,['route' => ['ipa_oct2.update', $ipa_oct2->bits],'method' => 'PUT']) !!}
        
        <div class="mb-3">
            <label for="" class="form-label">Descript</label>
            {!! Form::text('descript',$ipa_oct2->descript,['class'=>'form-control']) !!}
        </div>
        
        {!! Form::submit('SUBMIT',['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">DELETE</h5>
        @if($ipa_oct2->hasNotChild())
        {!! Form::model($ipa_oct2,['route' => ['ipa_oct2.destroy', $ipa_oct2->bits],'method' => 'delete']) !!}
        {!! Form::submit('DELETE') !!}
        {!! Form::close() !!}
        @endif
    </div>
</div>

@endsection
