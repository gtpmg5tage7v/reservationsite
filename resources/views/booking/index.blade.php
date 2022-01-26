@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">ご予約({{$appointments->count()}})</div>

                @forelse($appointments as $key=>$appointment)
                <div class="card-body">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">施工管理者</th>
                          <th scope="col">予定日</th>
                          <th scope="col">予定時間</th>                          
                          {{-- <th scope="col">Created date</th> --}}
                          <th scope="col">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        <tr>
                          <th scope="row">{{$key+1}}</th>
                          <td>{{$appointment->doctor->name}}</td>
                          <td>{{$appointment->date}}</td>
                          <td>{{$appointment->time}}</td>                          
                          {{-- <td>{{$appointment->created_at}}</td> --}}
                          <td>
                              @if($appointment->status==0)
                              <button class="btn btn-primary">お伺い予定</button>
                              @else 
                              <button class="btn btn-success">完了</button>
                              @endif
                          </td>
                        </tr>
                        @empty
                        <td>ご予約はございません</td>
                        @endforelse
                       
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
