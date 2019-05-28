@extends('layouts.app')

@section('services')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="accordion" role="tablist" aria-multiselectable="true">
                @include('helpers.service_card', ['services' => $services, 'children' => 0, 'show_children' => 1])
            </div>
        </div>
    </div>
</div>
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Paslaugos</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="list-group">
                        @yield('services')
                    </div>
                </div>
                    <div class="card-body">
                        <a class="btn btn-success" href="{{ route('services.create') }}"><i class="fas fa-plus-square pr-2"></i> pridėti</a>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
