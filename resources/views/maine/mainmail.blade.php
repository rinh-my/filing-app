@extends('layouts.app')

@section('content')
<div class="containar">
  <div class="row">
    <div class="col">
      <h2>メールフォーム</h2>
      <table class="table table-bordered text-center">
          <tr>
            {{-- 日付は入れない・サーバー側で固定 --}}
          <td>日付</td>
          <td>
            <label for="day" class="mt-3">日付</label>
            <input type="date" id="day" name="day">
          </tr>
          <tr>
            {{-- 編集、送信者だけ選べるように --}}
          <td>件名</td>
          <td><input type="text" id="money" name="money"></td>
          </tr>
          <tr>
          <td>内容</td>
          <td></td>
          </tr>
      </table>
    </div>
  </div>
</div>
@endsection