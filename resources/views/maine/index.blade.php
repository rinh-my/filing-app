@extends('layouts.app')

@section('content')
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet"> --}}
<div class="container">
  <div class="row pagetop">
    <div class="col">
      {{-- メモ：php.HTMLうまく使う --}}
      <h1 class="text-center">{{$start->year}}.{{$start->month}}</h1>
        <table class="table table-bordered text-center">
          <tr>
            <th class="sun">日</th>
            <th>月</th>
            <th>火</th>
            <th>水</th>
            <th>木</th>
            <th>金</th>
            <th class="sat">土</th>
          </tr>
          <tr style="height: 80px">
            @for ($i = 1; $i <= $start->dayOfWeek; $i++)
            <td></td>
            @endfor
            @for ($i = 1; $i <= $start->daysInMonth; $i++)
            <td>{{$i}}</td>
            @if( ($i+$start->dayOfWeek)%7 == 0 )
          </tr>
          <tr style="height: 80px">
            @endif
            @endfor
            @for ($i = 1; $i <= 6-$end->dayOfWeek; $i++)
            <td></td>
            @endfor
        </table>
    </div>
  </div>
  <div class="row" id="message">
      <div class="col-5">
        @foreach ($users as $id => $name)
        <div class="card px-6">
          {{-- aタグで名前を押したらメール内容表示 --}}
          <a href="/maine?sender_id={{$id}}">
            <div class="card-body">
              {{$name}}
            </div>
          </a>
        </div>
        @endforeach
      </div>
      {{-- 名前クリックで出てくるように実装したい：まずはメール表示 --}}
      @foreach ($messages as $message)
      <div class="col tolk">
        <p>{{$message->created_at}}</p><br>
        <p>{{$message->title}}</p><br>
        <p>{{$message->content}}</p>
      </div>
      @endforeach
  </div>
  <div class="row">
    <a href="mailto:送信先メールアドレス" class="navbar fixed-bottom rounded-circle mail">メールの画像
    </a>
  </div>
</div>
@endsection