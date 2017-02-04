<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    {!! Form::label('description', 'Description', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('description', null, ['class' => 'form-control', 'id'=>'texteditor']) !!}
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('cover') ? 'has-error' : ''}}">
    {!! Form::label('cover', 'Cover', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::file('cover',['class' => 'form-control','id'=>'fileinput']) !!}
        {!! $errors->first('cover', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('author') ? 'has-error' : ''}}">
    {!! Form::label('author', 'Author', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('author',[0=>'']+$authors ,null, ['class' => 'form-control', 'id'=>'select']) !!}
        {!! $errors->first('author', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('tags') ? 'has-error' : ''}}">
    {!! Form::label('tags', 'Tags', ['class' => 'col-md-4 control-label', '']) !!}
    <div class="col-md-6">
        {!! Form::select('tags[]',[0=>'']+$tags ,null, ['class' => 'form-control', 'id'=>'select', 'multiple' => true]) !!}
        {!! $errors->first('tags', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="box-footer">
    <div class="form-group">
        <div class="col-md-2 col-xs-offset-8">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Adauga', ['class' => 'btn btn-block btn-success btn-sm']) !!}
        </div>
        <div class="col-md-2"><a href = "{{URL::previous()}}" class = 'btn btn-block btn-default btn-sm'>Inapoi la lista</a></div>
    </div>
</div>