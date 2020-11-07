<div class="form-group {{ $errors->has('Nombre') ? 'has-error' : ''}}">
    <label for="Nombre" class="control-label">{{ 'Nombre' }}</label>
    <input class="form-control" name="Nombre" type="text" id="Nombre" value="{{ isset($autor->Nombre) ? $autor->Nombre : ''}}" required>
    {!! $errors->first('Nombre', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Apellido') ? 'has-error' : ''}}">
    <label for="Apellido" class="control-label">{{ 'Apellido' }}</label>
    <input class="form-control" name="Apellido" type="text" id="Apellido" value="{{ isset($autor->Apellido) ? $autor->Apellido : ''}}" required>
    {!! $errors->first('Apellido', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('libro_id') ? 'has-error' : ''}}">
    <label for="libro_id" class="control-label">{{ 'Libro Id' }}</label>
    <input class="form-control" name="libro_id" type="number" id="libro_id" value="{{ isset($autor->libro_id) ? $autor->libro_id : ''}}" >
    {!! $errors->first('libro_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
