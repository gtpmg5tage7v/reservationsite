@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">お知らせ</div>

                <div class="card-body">
                 
                  @forelse($prescriptions as $prescription)
                  <table class="table table-striped">
                      <thead>
                        <tr>
                          
                          <th scope="col">日時</th>
                          <th scope="col">施工管理者</th>
                          <th scope="col">弊害</th>
                          <th scope="col">症状</th>
                          <th scope="col">処置</th>
                          <th scope="col">使い方</th>
                          <th scope="col">フィードバック</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        <tr>
                         
                          <td>{{$prescription->date}}</td>
                          <td>{{$prescription->doctor->name}}</td>
                          <td>{{$prescription->name_of_disease}}</td>
                          <td>{{$prescription->symptoms}}</td>
                          <td>{{$prescription->medicine}}</td>
                          <td>{{$prescription->procedure_to_use_medicine}}</td>
                          <td>{{$prescription->feedback}}</td>
                        </tr>
                        @empty
                        <td>お知らせはまだございません。</td>
                        @endforelse
                       
                      </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
