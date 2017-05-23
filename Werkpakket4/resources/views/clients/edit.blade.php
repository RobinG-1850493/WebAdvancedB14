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


<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
<div class="container">
    <h2>Edit {{ $klant->voornaam }} {{ $klant->naam }}</h2>
    <hr/>
    {!! Form::model($klant, array('route' => array('clients.update', $klant->id), 'method' => 'PUT', 'class' => 'form  ')) !!}
    <div class="form-group">
        {!! Form::label('voornaam', 'Voornaam', array('class' => 'control-label')) !!}
        {!! Form::text('voornaam', null, array('class' => 'form-control form-control-danger')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('naam', 'Naam', array('class' => 'control-label')) !!}
        {!! Form::text('naam', null, array('class' => 'form-control form-control-danger')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('straat', 'Straat', array('class' => 'control-label')) !!}
        {!! Form::text('straat', null, array('class' => 'form-control form-control-danger')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('postcode', 'Postcode', array('class' => 'control-label')) !!}
        {!! Form::text('postcode', null, array('class' => 'form-control form-control-danger')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('telefoonnummer', 'Telefoonnummer', array('class' => 'control-label')) !!}
        {!! Form::text('telefoonnummer', null, array('class' => 'form-control form-control-danger')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('stad', 'Stad', array('class' => 'control-label')) !!}
        {!! Form::text('stad', null, array('class' => 'form-control form-control-danger')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('bedrijf', 'Bedrijf', array('class' => 'control-label')) !!}
        {!! Form::text('bedrijf', null, array('class' => 'form-control form-control-danger')) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Aanpassen!',
          array('class'=>'btn btn-primary')) !!}
    </div>
    {!! Form::close() !!}
</div></body>