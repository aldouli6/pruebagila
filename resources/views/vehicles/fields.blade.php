<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type_id', 'Type Id:') !!}
    {!! Form::select('type_id', $typeItems, null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Tires Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tires', 'Tires:') !!}
    {!! Form::number('tires', null, ['class' => 'form-control']) !!}
</div>

<!-- Power Field -->
<div class="form-group col-sm-6">
    {!! Form::label('power', 'Power:') !!}
    {!! Form::number('power', null, ['class' => 'form-control']) !!}
</div>