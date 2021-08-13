@extends('ipa::app')


@section('menu')
<li>
    <a href="{{ url('ipa_oct2/' . $ipa_oct3->IpaOct2()->bits) }}">{{ $ipa_oct3->IpaOct2()->bits }}</a>
</li>
<li>
    <a href="{{ url('ipa_oct3/' . $ipa_oct3->bits . '/edit') }}">EDIT</a>
</li>
@endsection


@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">DETAIL</h5>
        <dl class="row">
            <dt class="col-2">Bits</dt>
            <dd class="col-10">{{ $ipa_oct3->bits }}</dd>
            <dt class="col-2">Descript</dt>
            <dd class="col-10">{{ $ipa_oct3->descript }}</dd>
            <dt class="col-2">Assigned</dt>
            <dd class="col-10">{{ $ipa_oct3->assigned }}</dd>
        </dl>
    </div>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Address</th>
            <th>Status</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ipa_oct3->getAllBits() as $ipa_oct4)
        <tr class="{{ config('ipa.style')[$ipa_oct4->status] }}">
            <td><a href="{{ url('ipa_oct4/' . $ipa_oct4->bits) }}">{{ $ipa_oct4->bits }}</a></td>
            <td>{{ config('ipa.status')[$ipa_oct4->status] }}</td>
            <td>{{ $ipa_oct4->descript }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection