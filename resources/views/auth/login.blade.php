@extends('layouts.app')
@section('title','Login')
@section('content')

                    {!! Form::open(['route'=>'login','method'=>'POST']) !!}
                        {{ csrf_field() }}
                        <div class='form-group{{ $errors->has('email') ? ' has-error' : '' }}'>
                                {!! Form::label('name','Email') !!}
                                {!! Form::text('email',null,['class'=>'form-control','placeholder'=>'Nombre Completo','required']) !!}
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                        </div>
                        <div class='form-group{{ $errors->has('password') ? ' has-error' : '' }}'>
                                {!! Form::label('name','Contraseña') !!}
                                {!! Form::password('password',['class'=>'form-control','placeholder'=>'********','required']) !!}

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class='form-group'>
                                {!! Form::submit('Ingresar',['class'=>'btn btn-primary']) !!}
                        </div>


                        <div class="form-group">
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                   ¿Te olvidaste la contraseña?
                                </a>
                            </div>
                        </div>
                        {!! Form::close() !!}

@endsection
