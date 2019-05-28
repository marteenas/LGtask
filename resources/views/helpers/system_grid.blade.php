<div class="col-md-12">
    <div class="table-responsive">
        
        @if( !count($systems) )
            <h6>Paslauga sistemų neturi.</h6>
        @else
        
            <table id="mytable" class="table table-bordred table-striped">

                <thead>
                <th>ID</th>
                <th>Pavadinimas</th>
                <th>
                    <div class="float-right">
                        Veiksmai
                    </div>
                </th>
                </thead>

                <tbody>
                    @foreach($systems as $system)
                        <tr>
                            <td class="align-middle">
                                {{$system->id}}
                            </td>
                            <td class="align-middle">
                                {{$system->name}}
                            </td>
                            <td>
                                @if($show_controls == 1)
                                    <div class="float-right">
                                        <a href="{{ route('systems.edit', $system->id)}}" class="btn btn-primary text-white" data-title="Redaguoti"><i class="fas fa-pencil-alt"></i></a>
                                        <button type="button" class="btn btn-danger text-white" data-toggle="modal" data-target="#deleteModal" data-sysaction="{{ route('systems.destroy', $system->id)}}"><i class="fas fa-trash"></i></button>
                                    </div>
                                @elseif($show_controls == 2)
                                    <div class="float-right">
                                        <a href="{{ route('service.unset.systems', ['service_id' => $service->id, 'system_id' => $system->id]) }}" class="btn btn-warning text-dark" data-title="Naikinti ryšį"><i class="fas fa-unlink"></i></a>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        @endif
        
        @if(isset($service))
            <a class="btn btn-success" href="{{ route('service.edit.systems', ['service_id' => $service->id]) }}"><i class="fas fa-plus-square pr-2"></i> pridėti</a>
        @endif

    </div>

</div>


                                    
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
                Ištrinsite sistemą
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Atšaukti</button>

                <form action="" method="post" class="d-inline modal-form">
                    @csrf
                    @method('DELETE')
                    <button id="" class="btn btn-danger text-white" type="submit" data-title="Šalinti"><i class="fas fa-trash"></i> Ištrinti</button>
                </form>
            </div>
        </div>
    </div>
</div>