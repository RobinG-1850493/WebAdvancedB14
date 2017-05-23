<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('/') }}">Werkpakket 4</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('clients') }}">Klanten Overzicht</a></li>
        <li><a href="{{ URL::to('clients/create') }}">Klant Toevoegen</a></li>
    </ul>
</nav>
<div class="container">
<table class="table">
    <thead>
    <th>Id</th>
    <th>Voornaam</th>
    <th>Naam</th>
    <th>Bedrijf</th>
    </thead>
    @foreach($clients as $klant => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->voornaam }}</td>
            <td>{{ $value->naam }}</td>
            <td>{{ $value->bedrijf }}</td>
            <td>
                {{ Form::open(array('url' => 'clients/' . $value->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Klant Verwijderen', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}
            </td>
            <td><a class="btn btn-small btn-succes" href="{{ URL::to('clients/' . $value->id . '/edit') }}">Aanpassen</a></td>
        </tr>
        </tr>
    @endforeach
</table>
</div>
</body>