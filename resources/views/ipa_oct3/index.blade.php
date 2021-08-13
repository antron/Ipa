@extends('ipa::app')


@section('menu')
<li>
    <a href="{{ url('ipa_oct2') }}">BACK</a>
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
        @foreach($ipa_oct3s as $ipa_oct3)
        <tr>
            <td><a href="{{ url('ipa_oct3/' . $ipa_oct3->bits) }}">{{ $ipa_oct3->bits }}</a></td>
            <td>{{ $ipa_oct3->descript }}</td>
            <td>{{ $ipa_oct3->assigned }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection