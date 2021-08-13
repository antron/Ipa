@extends('ipa::app')


@section('menu')
<li>
    <a href="{{ url('ipa_oct3') }}">BACK</a>
</li>
@endsection


@section('content')
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Address</th>
            <th>Descript</th>
            <th>Assigned</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ipa_oct4s as $ipa_oct4)
        <tr class="{{ config('ipa.style')[$ipa_oct4->status] }}">
            <td><a href="{{ url('ipa_oct4/' . $ipa_oct4->bits) }}">{{ $ipa_oct4->bits }}</a></td>
            <td>{{ config('ipa.status')[$ipa_oct4->status] }}</td>
            <td>{{ $ipa_oct4->descript }}</td>
            <td>{{ $ipa_oct4->assigned }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection