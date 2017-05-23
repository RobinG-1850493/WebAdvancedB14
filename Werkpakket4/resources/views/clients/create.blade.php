<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('clients') }}">Werkpakket 4</a>
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
    {!! Form::open(array('url' => 'clients', 'class' => 'form  ')) !!}
    <div class="form-group">
        {!! Form::label('voornaam', 'Voornaam', array('class' => 'control-label')) !!}
        {!! Form::text('voornaam', Input::old('voornaam'), array('class' => 'form-control form-control-danger')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('naam', 'Naam', array('class' => 'control-label')) !!}
        {!! Form::text('naam', Input::old('naam'), array('class' => 'form-control form-control-danger')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('straat', 'Straat', array('class' => 'control-label')) !!}
        {!! Form::text('straat', Input::old('straat'), array('class' => 'form-control form-control-danger')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('postcode', 'Postcode', array('class' => 'control-label')) !!}
        {!! Form::text('postcode', Input::old('postcode'), array('class' => 'form-control form-control-danger')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('telefoonnummer', 'Telefoonnummer', array('class' => 'control-label')) !!}
        {!! Form::text('telefoonnummer', Input::old('telefoonnummer'), array('class' => 'form-control form-control-danger')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('stad', 'Stad', array('class' => 'control-label')) !!}
        {!! Form::text('stad', Input::old('Stad'), array('class' => 'form-control form-control-danger')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('bedrijf', 'Bedrijf', array('class' => 'control-label')) !!}
        {!! Form::text('bedrijf', Input::old('bedrijf'), array('class' => 'form-control form-control-danger')) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Klant Toevoegen!',
          array('class'=>'btn btn-primary')) !!}
    </div>
    {!! Form::close() !!}
</div>
</body>
</html>