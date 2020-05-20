@extends('layouts.app')

@section('content')


    @include('dashboard.top_nav')

    @include('dashboard.side-nav')


    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <br>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Sent</li>
                </ol>

                <div class="card mb-4">
                    <div class="card-header"><i class="fas fa-table mr-1"></i>Sent Email</div>
                    <div class="card-body">
                        <p>From: {{ session('user')->email }}</p>
                        <p>To: {{ $sent->to }}</p>
                        <p>Subject: {{ $sent->subject }}</p>
                        <p>Date: {{ $sent->created_at }}</p>
                        <br>
                        <p>{{ $sent->body }}</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('sent') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $sent->id }}">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>






            </div>
        </main>

    </div>





    </div>

@endsection




