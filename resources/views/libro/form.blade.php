<div class="form-group {{ $errors->has('ISBN') ? 'has-error' : ''}}">
    <label for="ISBN" class="control-label">{{ 'Isbn' }}</label>
    <input class="form-control" name="ISBN" type="text" id="ISBN" value="{{ isset($libro->ISBN) ? $libro->ISBN : ''}}" required>
    {!! $errors->first('ISBN', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Titulo') ? 'has-error' : ''}}">
    <label for="Titulo" class="control-label">{{ 'Titulo' }}</label>
    <input class="form-control" name="Titulo" type="text" id="Titulo" value="{{ isset($libro->Titulo) ? $libro->Titulo : ''}}" required>
    {!! $errors->first('Titulo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Fecha') ? 'has-error' : ''}}">
    <label for="Fecha" class="control-label">{{ 'Fecha' }}</label>
    <input class="form-control" name="Fecha" type="date" id="Fecha" value="{{ isset($libro->Fecha) ? $libro->Fecha : ''}}" required>
    {!! $errors->first('Fecha', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('PVP') ? 'has-error' : ''}}">
    <label for="PVP" class="control-label">{{ 'Pvp' }}</label>
    <input class="form-control" name="PVP" type="number" id="PVP" value="{{ isset($libro->PVP) ? $libro->PVP : ''}}" required>
    {!! $errors->first('PVP', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('editorial_id') ? 'has-error' : ''}}">
    <label for="editorial_id" class="control-label">{{ 'Editorial Id' }}</label>
    <input class="form-control" name="editorial_id" type="number" id="editorial_id" value="{{ isset($libro->editorial_id) ? $libro->editorial_id : ''}}" >
    {!! $errors->first('editorial_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
