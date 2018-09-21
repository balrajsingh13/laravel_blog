@extends('layouts.app')

@section('content')
<div class="container">
    <div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%">
        <a href="{{ route('blogs') }}" type="button" class="btn btn-primary">View Your Blogs</a>
        <a href="{{ route('allblogs') }}" type="button" class="btn btn-primary">View all Blogs</a>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <form method="POST" action="{{ route('publish') }}">
                        @csrf

                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-left">{{ __('Title') }}</label>

                        <div class="col-md-12">
                            <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="content" class="col-md-4 col-form-label text-md-left">{{ __('Content') }}</label>

                        <div class="col-md-12">
                            <textarea id="content" type="text" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" name="content" required autofocus>
                            Write Blog here...</textarea>

                                @if ($errors->has('content'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-12 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                        </div>
                    </div>               
            </form>
        </div>
    </div>
</div>
@endsection
