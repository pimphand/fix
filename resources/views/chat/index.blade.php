@extends('layouts.back.main')

@section('title')
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>@lang('menu.chatRoom.index')</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item">
          <a href="{{ route('home') }}">
            @lang('menu.home.index')
          </a>
        </li>
        <li class="breadcrumb-item active">
          @lang('menu.chatRoom.index')
        </li>
      </ol>
    </div>
  </div>
@endsection

@section('content')
  <div class="container-fluid">
    <div class="row d-flex align-items-stretch">
      @foreach($user as $key => $item)
        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
          <div class="card bg-light">
            <div class="card-header text-muted border-bottom-0">
              {{ $item->role == 1 ? "Doctor" : "User" }}
            </div>
            <div class="card-body pt-0">
              <div class="row">
                <div class="col-7">
                  <h2 class="lead">
                    <b>{{ $item->name }}</b>
                  </h2>
                  <p class="text-muted text-sm">
                    <b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover
                  </p>
                  <ul class="ml-4 mb-0 fa-ul text-muted">
                    <li class="small">
                      <div class="fa-li">
                        <i class="fas fa-lg fa-building"></i>
                      </div>
                      Address: Demo Street 123, Demo City 04312, NJ
                    </li>
                    <li class="small">
                      <div class="fa-li">
                        <i class="fas fa-lg fa-phone"></i>
                      </div>
                      Phone #: + 800 - 12 12 23 52
                    </li>
                  </ul>
                </div>
                <div class="col-5 text-center">
                  <img src="{{ asset('logo.png') }}" alt="" class="img-circle img-fluid">
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="text-right">
                <a href="#" class="btn btn-sm bg-teal">
                  <i class="fas fa-comments"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection
