@extends('layouts.app')

@section('services')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h5>Paslauga:</h5>
                <a href="{{ route('services.edit', $service->id)}}" class="btn btn-primary float-right text-white ml-1 py-2" data-title="Redaguoti"><i class="fas fa-pencil-alt"></i></a>
                <button type="button" class="btn btn-danger text-white float-right py-2" data-toggle="modal" data-target="#deleteModal" data-sysaction="{{ route('services.destroy', $service->id)}}"><i class="fas fa-trash"></i></button>
                @include('helpers.service_card', ['services' => [$service], 'children' => 1, 'show_children' => 1])
            </div>
            @if($service->parent_id)
                <div class="col-md-12">
                    <h5>Motininė paslauga:</h5>
                    <a href="{{ route('services.edit', $service->parent()->first()->id)}}" class="btn btn-primary float-right text-white ml-1 py-2" data-title="Redaguoti"><i class="fas fa-pencil-alt"></i></a>
                    @include('helpers.service_card', ['services' => [$service->parent()->first()], 'children' =>1, 'show_children' => 0])
                </div>
            @endif
        </div>
    </div>
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Paslaugos informacija</div>

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


                    <div class="card-header">Paslaugos sistemos</div>
                    <div class="card-body">
                        @include('helpers.system_grid', ['systems' => $systems, 'show_controls' => 2])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

                                    
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Dėmesio!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Ištrinsite paslaugą
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Atšaukti</button>

                <form action="" method="post" class="d-inline modal-form" style="margin-block-end: 0;">
                    @csrf
                    @method('DELETE')
                    <button id="" class="btn btn-danger text-white" type="submit" data-title="Šalinti"><i class="fas fa-trash"></i> Ištrinti</button>
                </form>
            </div>
        </div>
    </div>
</div>