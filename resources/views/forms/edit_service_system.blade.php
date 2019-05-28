@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Pridėti sistemą prie paslaugos') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('service.add.systems', ['service_id' => $service->id])}}">
                        @csrf

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Paslauga') }}</label>

                            <div class="col-md-6">
                                <h6>{{$service->name}}</h6>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="system_id" class="col-md-4 col-form-label text-md-right">{{ __('Sistemos') }}</label>

                            <div class="col-md-6">
                                
                                <select id="system_id" class="form-control @error('system_id') is-invalid @enderror" name="system_id" required autofocus>
                                    @foreach(\App\System::all() as $system_new)
                                        
                                        @if($service->systems()->find($system_new->id))
                                            @continue
                                        @endif
                                    
                                        <option value="{{ $system_new->id }}">{{ $system_new->name }}</option>    
                                    @endforeach
                                </select>
                                
                                @error('system_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Pridėti') }}
                                </button>
                                <a href="{{url()->previous()}}" class="btn btn-info">
                                    {{ __('Atšaukti') }}
                                </a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
