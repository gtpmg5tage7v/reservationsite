@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-edit bg-blue"></i>
                <div class="d-inline">
                    <h5>施工管理者</h5>
                    <span>施工管理者　変更</span>
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
                <li class="breadcrumb-item active" aria-current="page">変更</li>
            </ol>
        </nav>
    </div>
    </div>
</div>

<div class="row justify-content-center">
	<div class="col-lg-10">
        @if(Session::has('message'))
            <div class="alert bg-success alert-success text-white" role="alert">
                {{Session::get('message')}}
            </div>
        @endif
       
	<div class="card">
	<div class="card-header"><h3>施工管理者　追加r</h3></div>
	<div class="card-body">
		<form class="forms-sample" action="{{route('doctor.update',[$user->id])}}" method="post" enctype="multipart/form-data" >@csrf
            @method('PUT')
			<div class="row">
				<div class="col-lg-6">
					<label for="">名前</label>
					<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="doctor name" value="                   {{$user->name}}">
                    @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
				</div>
				<div class="col-lg-6">
					<label for="">メールアドレス</label>
					<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="email"value="                   {{$user->email}}">
                     @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6">
					<label for="">・パスワード</label>
					<input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="doctor password">
                     @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
				</div>
				<div class="col-lg-6">
					<label for="">性別</label>
					<select class="form-control @error('gender') is-invalid @enderror" name="gender">
                        @foreach(['male','female'] as $gender)
                        <option value="{{$gender}}" @if($user->gender==$gender)selected @endif>{{$gender}}</option>
                        @endforeach
					</select>
                     @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
				</div>
			</div>

				<div class="row">
					<div class="col-lg-6">
						<label for="">Education</label>
						<input type="text" name="education" class="form-control @error('education') is-invalid @enderror" placeholder="doctor highest degree" value="                   {{$user->education}}">
                         @error('education')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					<div class="col-lg-6">
						<label for="">住所</label>
						<input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="doctor address"  value="{{$user->address}}">
                         @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
			</div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">担当</label>
                        <select name="department" class="form-control">
                          

                       



                            @foreach(App\Department::all() as $department)
                            <option value="{{$department->department}}" @if($user->department==$department->department)selected @endif>{{$department->department}}</option> 
                            @endforeach


                         

                        </select>



                         @error('department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">電話番号</label>
                        <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror"value="{{$user->phone_number}}">
                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        
                    </div>
                </div>

            </div>
            <div class="row">
            	<div class="col-md-6">
                        <div class="form-group">
                    <label>画像</label>
                        <input type="file" class="form-control file-upload-info @error('image') is-invalid @enderror"  placeholder="Upload Image" name="image">
                        <span class="input-group-append">
                       
                        </span>
                         @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                </div>
                    <div class="col-md-6">
                        <label>管理ロール</label>
                        <select name="role_id" class="form-control @error('role_id') is-invalid @enderror">
                            <option value="">Please select role</option>
                            @foreach(App\Role::where('name','!=','patient')->get() as $role)
          <option value="{{$role->id}}"@if($user->role_id==$role->id)selected @endif>{{$role->name}}</option>
                            @endforeach
                            
                        </select>
                         @error('role_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                </div>
                
            
            
           
            <div class="form-group">
                <label for="exampleTextarea1">コメント</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="exampleTextarea1" rows="4" name="description">
                {{$user->description}}

                </textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
              <button type="submit" class="btn btn-primary mr-2">決定する</button>
            <button class="btn btn-light">キャンセルする</button>


				</form>
			</div>
		</div>
	</div>
</div>


@endsection