@extends('admin.layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
             
              <div class="card-header" >
       
                    
                </div>

                <div class="card-body">
                    <p>日時:{{$prescription->date}}</p>
                    <p>お客様:{{$prescription->user->name}}</p>
                    <p>施工管理者:{{$prescription->doctor->name}}</p>
                    <p>弊害:{{$prescription->name_of_disease}}</p>
                    <p>症状:{{$prescription->symptoms}}</p>
                    <p>処置:{{$prescription->medicine}}</p>
                    <p>使い方:{{$prescription->procedure_to_use_medicine}}</p>
                    <p>フィードバック:{{$prescription->feedback}}</p>
                    <p>施工管理者　署名:{{$prescription->signature}}</p>

                  
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
