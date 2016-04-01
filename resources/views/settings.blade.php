@extends('layouts.app')

@section('content')
    <main class="container-fluid panel">
        <div class="page-header text-center">
            <h3>Welcome {{ Auth::user()->name }}</h3>
        </div>
        <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))
                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
            @endforeach
        </div>
        <div class="panel-body">
            <div class="panel">

                <div class="page-header text-center">
                    <h4>Change Your Name</h4>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/settings/name') }}">
                        {!! csrf_field() !!}

                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="control-label col-sm-2" for="newName">New Name:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="newName" name="name"
                                       placeholder="Enter name" value="{{ old('name') }}" >
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="control-label col-sm-2" for="pwd">Password:</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="pwd" name="password"
                                       placeholder="Enter password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="panel">
                <div class="page-header text-center">
                    <h4>Change Your Password</h4>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/settings/password') }}">
                        {!! csrf_field() !!}

                        <div class="form-group {{ $errors->has('oldPassword') ? ' has-error' : '' }}">
                            <label class="control-label col-sm-2" for="oldPwd">Old Password:</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="oldPwd"
                                       name="oldPassword" placeholder="Enter password">
                                @if ($errors->has('oldPassword'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('oldPassword') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group {{ $errors->has('newPassword') ? ' has-error' : '' }}">
                            <label class="control-label col-sm-2" for="newPwd">New Password:</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="newPwd"
                                       name="newPassword" placeholder="Enter password">
                                @if ($errors->has('newPassword'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('newPassword') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group {{ $errors->has('newPassword_confirmation') ? ' has-error' : '' }}">
                            <label class="control-label col-sm-2" for="pwdRep">Repeat Password:</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="pwdRep"
                                       name="newPassword_confirmation" placeholder="Repeat password">
                                @if ($errors->has('newPassword_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('newPassword_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection