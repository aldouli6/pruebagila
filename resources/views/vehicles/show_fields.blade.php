<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $vehicle->name }}</p>
</div>

<!-- Type Id Field -->
<div class="col-sm-12">
    {!! Form::label('type_id', 'Type Id:') !!}
    <p>{{ $vehicle->type_id }}</p>
</div>

<!-- Tires Field -->
<div class="col-sm-12">
    {!! Form::label('tires', 'Tires:') !!}
    <p>{{ $vehicle->tires }}</p>
</div>

<!-- Power Field -->
<div class="col-sm-12">
    {!! Form::label('power', 'Power:') !!}
    <p>{{ $vehicle->power }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $vehicle->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $vehicle->updated_at }}</p>
</div>

