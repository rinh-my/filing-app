@extends('layouts.app')

@section('content')
<div class="container">
  <form action="/message/store" method="post">
    @csrf
    <div class="form-group">
      <label for="receiver_id">送信先</label>
      <select id="receiver_id" name="receiver_id" class="form-control">
      @foreach($users as $user)
        <option value="{{$user->id}}">{{$user->name}}</option>
      @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="title">タイトル</label>
      <input class="form-control" id="title" name="title">
    </div>
    <div class="form-group">
    <label for="content">メッセージ</label>
    <textarea class="form-control" id="content" name="content" rows="10"></textarea>
  </div>
    <button type="submit" class="btn btn-primary">送信</button>
  </form>
</div>
@endsection