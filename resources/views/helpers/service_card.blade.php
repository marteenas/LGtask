@foreach($services as $service)
    @if (!$service->parent_id OR $children)
        <div class="@if($children) pl-5 @else list-group-item @endif mt-1">
            <h5 role="tab" id="heading{{$service->id}}">
                @if($show_children AND $service->children()->get()->count())
                    <span data-toggle="collapse" data-parent="#accordion" href="#collapse{{$service->id}}" aria-expanded="true" aria-controls="collapse{{$service->id}}" class="pr-2">
                        <i class="fa fa-chevron-up pull-right"></i>
                    </span>
                @endif
                <a href="{{ route('services.show', $service->id) }}">{{ $service->name }}</a>
            </h5>

            <!--if has children-->
            @if($show_children AND $service->children()->get()->count())
                <!--draw collapsible menu-->
                <div id="collapse{{$service->id}}" class="collapse show" role="tabpanel" aria-labelledby="heading{{$service->id}}">
                    <!--call same file for children services view-->
                    @include('helpers.service_card', ['services' => $service->children()->get(), 'children' => 1, 'show_children' => 1])
                </div>
            @endif
        </div>

    @endif
@endforeach 