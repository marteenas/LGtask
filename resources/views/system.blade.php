@extends('layouts.app')

@section('systems')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="accordion" role="tablist" aria-multiselectable="true">
                @include('helpers.system_grid', ['show_controls' => 1])
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
                    
                    <div class="card-header">
                        Sistemos
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        @yield('systems')
                    </div>
                    
                    <div class="card-body">
                        <a class="btn btn-success" href="{{ route('systems.create') }}"><i class="fas fa-plus-square pr-2"></i> pridėti</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
