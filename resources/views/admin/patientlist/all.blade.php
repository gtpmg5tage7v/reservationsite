@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">アポイントメント({{$bookings->count()}})</div>
                

                <div class="card-body">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Photo</th>
                          <th scope="col">日付</th>
                          <th scope="col">ユーザー名</th>
                          <th scope="col">メールアドレス</th>
                          <th scope="col">電話番号</th>
                          <th scope="col">性別</th>
                          <th scope="col">時間</th>
                          <th scope="col">施工管理者</th>
                          <th scope="col">ステータス</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($bookings as $key=>$booking)
                        <tr>
                          <th scope="row">{{$key+1}}</th>
                          <td><img src="/profile/{{$booking->user->image}}" width="80" style="border-radius: 50%;" alt=""></td>
                          <td>{{$booking->date}}</td>
                          <td>{{$booking->user->name}}</td>
                          <td>{{$booking->user->email}}</td>
                          <td>{{$booking->user->phone_number}}</td>
                          <td>{{$booking->user->gender}}</td>
                          <td>{{$booking->time}}</td>
                          <td>{{$booking->doctor->name}}</td>
                          <td>
                              @if($booking->status==0)
                              <a href="{{route('update.status',[$booking->id])}}"><button class="btn btn-primary">未決定</button></a>
                              @else 
                              <a href="{{route('update.status',[$booking->id])}}"><button class="btn btn-success">完了</button></a>
                              @endif
                          </td>
                        </tr>
                        @empty
                        <td>There is no any appointments Today</td>
                        @endforelse
                       
                      </tbody>
                    </table>
                </div>
                {{$bookings->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
