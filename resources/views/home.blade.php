@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    ようこそ
                    {{Auth()->user()->name}}様<br>
                    <a href="{{ url('/') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">トップページ</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
