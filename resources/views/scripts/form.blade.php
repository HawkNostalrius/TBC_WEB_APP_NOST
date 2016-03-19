@extends('app')
@section('content')
    <div class="col-lg-12">
        @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
        @endif
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">
                <h2>Create new script</h2>
            </div>
            <div class="panel-body">
                {!! Form::open(array('action' => array('Script\ScriptController@' . $action, isset($script) ? $script->id : ''), 'method' => $method)) !!}

                <div class="form-group">
                    {!! Form::label('title', 'Title', array('class' => '')) !!}
                    {!! Form::text('title', isset($script) ? $script->title : '', array('class' => 'form-control')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('content', 'Content of script', array('class' => '')) !!}
                    {!! Form::textarea('content', isset($script) ? $script->content : '', array('class' => 'form-control')) !!}
                </div>

                {!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection