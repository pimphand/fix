@extends('layouts.back.main')

@section('title')
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>@lang('menu.home.index')</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item active">@lang('menu.home.index')</li>
      </ol>
    </div>
  </div>
@endsection

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 col-md-6 col-xl-6">
        <div class="small-box bg-teal">
          <div class="inner">
            <h3>{{ $doctor }}</h3>
            <p>Doctor Active</p>
          </div>
          <div class="icon">
            <i class="fas fa-user-md"></i>
          </div>
          <a href="{{ route('chat.index') }}" class="small-box-footer">
            Consult a doctor <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
    
@endsection
