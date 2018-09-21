@extends('layouts.app')

@section('content')  
    <div class="card" style="width:800px; margin:0 auto;">
    @if(($data))
        @foreach( $data as $row )
        <div class="card-body">
            <h5 class="card-title">{{ $row['title'] }}</h5>
            <p class="card-text">{{ $row['content'] }}</p>
            <footer class="blockquote-footer">Author: 
                <cite title="Source Title">{{ $row->user->name }}</cite>
            </footer>
            <footer class="blockquote-footer">
                <small class="text-muted">Last updated on: {{ $row['updatedDate'] }}</small>
            </footer>
            <footer class="blockquote-footer">
                <small class="text-muted">Last created on: {{ $row['createdDate'] }}</small>
            </footer>
            <form  method="POST" action="{{ route('addComment',  [ 'id' => $row->user->id ]) }}">
              @csrf  
                <label>Comment:<input class="form-control form-control-sm" name="comment" size="255" type="text"></label>
                <button type="submit" class="btn btn-link" style="height:5px;">Send</button>
            </form>
        </div>
        <hr>
        @endforeach
    @endif
    </div>
    <hr>
@endsection

