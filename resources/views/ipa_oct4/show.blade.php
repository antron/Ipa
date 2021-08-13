@extends('ipa::app')


@section('menu')
<li>
    <a href="{{ url('ipa_oct3/' . $ipa_oct4->IpaOct3()->bits) }}">{{  $ipa_oct4->IpaOct3()->bits }}</a>
</li>
<li>
    <a href="{{ url('ipa_oct4/' . $ipa_oct4->bits . '/edit') }}">EDIT</a>
</li>
@endsection


@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">DETAIL</h5>
        <dl class="row">
            <dt class="col-2">Bits</dt>
            <dd class="col-10">{{ $ipa_oct4->bits }}</dd>
            <dt class="col-2">Descript</dt>
            <dd class="col-10">{{ $ipa_oct4->descript }}</dd>
            <dt class="col-2">Status</dt>
            <dd class="col-10">{{ config('ipa.status')[$ipa_oct4->status] }}</dd>
        </dl>
    </div>
</div>
@endsection