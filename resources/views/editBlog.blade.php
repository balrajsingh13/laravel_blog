@extends('layouts.app')

@section('content')  
    <div class="card" style="width:800px; margin:0 auto;">
    @if(($data))
        <h5 class="card-title">EDIT</h5><hr/>
        <form method="POST" action="{{ route('postEdited', $id) }}">
                        @csrf

            <input type="hidden" value="{{$id}}">
            <div class="form-group row">
                <label for="title" class="col-md-4 col-form-label text-md-left">{{ __('Title') }}</label>

            <div class="col-md-12">
                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{$data['title']}}" required autofocus>

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
                    {{$data['content']}}</textarea>

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
    @endif
    </div>
    <hr>
@endsection

