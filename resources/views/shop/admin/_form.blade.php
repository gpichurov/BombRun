<div class="panel">
    @if(empty($model))
        {!! Form::open([
            'url' => route('shop.admin.store'),
            'files' => true
        ]) !!}
    @else
        {!! Form::model($model,[
            'url' => route('shop.admin.update', ['id' => $model->id]),
            'method' => 'PUT',
            'files' => true
        ]) !!}
    @endif
    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        @if ($errors->has('name'))
            <span class="help-block">{{ $errors->first('name') }}</span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}" >
        {!! Form::label('description', 'Description') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        @if ($errors->has('description'))
            <span class="help-block">{{ $errors->first('description') }}</span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}" >
        {!! Form::label('price', 'Price') !!}
        {!! Form::number('price', null, ['class' => 'form-control']) !!}
        @if ($errors->has('price'))
            <span class="help-block">{{ $errors->first('price') }}</span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('number') ? 'has-error' : '' }}" >
        {!! Form::label('number', 'Number') !!}
        {!! Form::number('number', null, ['class' => 'form-control']) !!}
        @if ($errors->has('number'))
            <span class="help-block">{{ $errors->first('number') }}</span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('available') ? 'has-error' : '' }}" >
        {!! Form::label('available', 'Available') !!}
        {!! Form::number('available', null, ['class' => 'form-control']) !!}
        @if ($errors->has('available'))
            <span class="help-block">{{ $errors->first('available') }}</span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}" >
        {!! Form::label('category', 'Category') !!}
        {!! Form::select('category', ['bombs' => 'Bombs', 'energy' => 'Energy'], ['class' => 'form-control']) !!}
        @if ($errors->has('category'))
            <span class="help-block">{{ $errors->first('category') }}</span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}" >
        {!! Form::label('image', 'Image') !!}
        {!! Form::file('image', ['class' => 'form-control']) !!}
        @if ($errors->has('image'))
            <span class="help-block">{{ $errors->first('image') }}</span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
</div>
