@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-edit bg-blue"></i>
                <div class="d-inline">
                    <h5>施工管理者</h5>
                    <span>施工管理者　追加</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="../index.html"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">施工管理者</a></li>
                    <li class="breadcrumb-item active" aria-current="page">作成</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="row justify-content-centet">
    <div class="col-lg-10">
        @if (Session::has('message'))
        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>
            
        @endif
        <div class="card">
            <div class="card-header">
                <h3>削除する</h3>
            </div>
                <div class="card-body">
                    <img src="{{asset('images')}}/{{$user->image}}" width="120"alt="">
                    <h2>{{$user->name}}</h2>
                    <form class="forms-sample" action="{{ route('doctor.destroy',[$user->id])}}" method="post">
                        @csrf
                        @method('DELETE')
                    <div class="card-footer">
                    <button type="submit" class="btn btn-danger mr-2">削除する</button>
                    <a href="{{route('doctor.index')}}"class="btn btn-light">キャンセル</a>
                    </div>
                </div>
            
        </div>
    </div>
</div>

@endsection