@extends('admin.layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
              @if(Session::has('message'))
              <div class="alert alert-success">
                  {{Session::get('message')}}
              </div>
              @endif
              <div class="card-header" >
       
                     アポイントメント ({{$bookings->count()}})
                 </div>

                <div class="card-body">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Photo</th>
                          <th scope="col">日時</th>
                          <th scope="col">名前</th>
                          <th scope="col">メールアドレス</th>
                          <th scope="col">電話番号</th>
                          <th scope="col">性別</th>

                          <th scope="col">時間</th>
                          <th scope="col">施工管理者</th>
                          <th scope="col">ステータス</th>
                          <th scope="col">処置</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($bookings as $key=>$booking)
                        <tr>
                          <th scope="row">{{$key+1}}</th>
                          <td><img src="/profile/{{$booking->user->image}}" width="80" style="border-radius: 50%;">
                          </td>
                          <td>
                             {{$booking->date}}                            
                          </td>
                          <td>{{$booking->user->name}}</td>
                          <td>{{$booking->user->email}}</td>
                          <td>{{$booking->user->phone_number}}</td>
                          <td>{{$booking->user->gender}}</td>
                          <td>{{$booking->time}}</td>
                          <td>{{$booking->doctor->name}}</td>
                          <td>
                            @if($booking->status==1)
                             チェックする
                             @endif
                          </td>
                          <td>
                              <!-- Button trigger modal -->
                       
                @if(!App\Prescription::where('date',date('Y-m-d'))->where('doctor_id',auth()->user()->id)->where('user_id',$booking->user->id)->exists())
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$booking->user_id}}">
                  処置を書きます
                    </button>
                    @include('prescription.form')

                    @else 
                   <a href="{{route('prescription.show',[$booking->user_id,$booking->date])}}" class="btn btn-secondary">処置を見る</a>
                    @endif

                               
                          </td>
                        </tr>
                        @empty
                        <td>予定はありません</td>
                        @endforelse
                       
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
        <script src="{{ asset('js/app.js') }}"defer></script>


@endsection
