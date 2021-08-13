@extends('ipa::app')


@section('menu')
<li>
    <a href="{{ url('ipa_oct2') }}">LIST</a>
</li>
<li>
    <a href="{{ url('ipa_oct2/' . $ipa_oct2->bits . '/edit') }}">EDIT</a>
</li>
@endsection


@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">DETAIL</h5>
        <dl class="row">
            <dt class="col-2">Bits</dt>
            <dd class="col-10">{{ $ipa_oct2->bits }}</dd>
            <dt class="col-2">Descript</dt>
            <dd class="col-10">{{ $ipa_oct2->descript }}</dd>
            <dt class="col-2">Assigned</dt>
            <dd class="col-10">{{ $ipa_oct2->assigned }}</dd>
        </dl>
    </div>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Address</th>
            <th>Descript</th>
            <th>Assigned</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ipa_oct2->getAllBits() as $ipa_oct3)
        <tr class="{{ config('ipa.style')[$ipa_oct3->status] }}">
            <td><a href="{{ url('ipa_oct3/' . $ipa_oct3->bits) }}">{{ $ipa_oct3->bits }}</a></td>
            <td>{{ $ipa_oct3->descript }}</td>
            <td>{{ $ipa_oct3->assigned }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection