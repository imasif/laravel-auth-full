@extends('layout.main')

@section('content')
    <form action="{{ URL::route('account-sign-in-post') }}" method="post">

        <div class="field">
            Email: <input type="text" name="email" {{ (Input::old('email')) ? 'value="'. e(Input::old('email')) .'"' : '' }}/>

            @if($errors->has('email'))
                {{ $errors->first('email') }}
            @endif
        </div>
        <div class="field">
            Password: <input type="password" name="password"/>


            @if($errors->has('password'))
                {{ $errors->first('password') }}
            @endif
        </div>
        <div class="field">
            <input type="checkbox" name="remember" id="remember"/>
            <label for="remember">Remember Me</label>
        </div>

        {{ Form::token() }}

        <input type="submit" value="Sign In"/>
    </form>
@stop