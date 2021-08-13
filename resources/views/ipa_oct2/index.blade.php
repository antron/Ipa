@extends('ipa::app')


@section('menu')
<li>
    <a href="{{ url('ipa_oct2/create') }}">CREATE</a>
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
        @foreach($ipa_oct2s as $ipa_oct2)
        <tr>
            <td><a href="{{ url('ipa_oct2/' . $ipa_oct2->bits) }}">{{ $ipa_oct2->bits }}</a></td>
            <td>{{ $ipa_oct2->descript }}</td>
            <td>{{ $ipa_oct2->assigned }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection