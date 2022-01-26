@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session::has('message'))
        <div class="alert alert-success">{{Session::get('message')}}</div>
        @endif
    <div class="row ">
        
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">プロフィール</div>

                <div class="card-body">
                    <p>名前: {{auth()->user()->name}}</p>
                    <p>メール: {{auth()->user()->email}}</p>
                    <p>住所: {{auth()->user()->address}}</p>
                    <p>電話番号: {{auth()->user()->phone_number}}</p>
                    <p>性別: {{auth()->user()->gender}}</p>
                    <p>コメント: {{auth()->user()->description}}</p>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">プロフィールを更新する</div>

                <div class="card-body">
                    <form action="{{route('profile.store')}}" method="post">@csrf
                        <div class="form-group">
                            <label>名前</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{auth()->user()->name}}">
                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>
                        <div class="form-group">
                            <label>住所</label>
                            <input type="text" name="address" class="form-control" value="{{auth()->user()->address}}">
                            
                        </div>
                        <div class="form-group">
                            <label>電話番号</label>
                            <input type="text" name="phone_number" class="form-control" value="{{auth()->user()->phone_number}}">
                            
                        </div>
                        <div class="form-group">
                            <label>性別</label>
                            <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                                <option value="">選択してください</option>
                                <option value="male" @if(auth()->user()->gender==='male')selected @endif >男性</option>
                                <option value="female" @if(auth()->user()->gender==='female')selected @endif>女性</option>
                            </select>
                            @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                       
                            <div class="form-group">
                            <label>コメント</label>
                            <textarea name="description" class="form-control">{{auth()->user()->description}}</textarea>
                            
                        </div>
                        <div class="form-group">
                            
                            <button class="btn btn-primary" type="submit">更新する</button>
                            
                        </div>
                            
                        </div>
                        
                    </form>
                    
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">画像を変更する</div>
                <form action="{{route('profile.pic')}}" method="post" enctype="multipart/form-data">@csrf
                <div class="card-body">
                    @if(!auth()->user()->image)
                    <img src="/images/3Dz1og01c2vXjbjmfTskpLqdVGEB2Qmpg1DLROiR.png" width="120">
                    @else 
                     <img src="/profile/{{auth()->user()->image}}" width="120">
                    @endif
                    <br>
                    <input type="file" name="file" class="form-control" required="">
                    <br>
                     @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    <button type="submit" class="btn btn-primary">変更する</button>
                    
                </div>
            </form>
            </div>
            <div class="card text-center">
                <a href="{{ route('deactive.form')}}">退会はこちら</a>
            </div>
        </div>

    </div>
</div>
@endsection
