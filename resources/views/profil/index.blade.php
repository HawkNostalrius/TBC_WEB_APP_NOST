@extends('app')

@section('content')

    <div class="col-lg-12">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">
                <h2>My profil</h2>
            </div>
            <div class="panel-body">
                <div class="voffset3">
                    {!! Form::label('', 'Login', array('class' => 'control-label')) !!}
                    {!! Form::text('', Auth::user()->login, array('class' => 'form-control', 'disabled')) !!}
                </div>
                <div class="voffset3">
                    {!! Form::label('', 'Email', array('class' => 'control-label')) !!}
                    {!! Form::text('', Auth::user()->email, array('class' => 'form-control', 'disabled')) !!}
                </div>
            </div>
        </div>
    </div>
    @endsection