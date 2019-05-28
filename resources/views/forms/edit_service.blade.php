@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Paslaugos keitimo forma') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('services.update', $service->id) }}">
                        {{method_field('PUT')}}
                        @csrf

                        <div class="form-group row">
                            <label for="service_name" class="col-md-4 col-form-label text-md-right">{{ __('Paslaugos aprašas') }}</label>

                            <div class="col-md-6">
                                <input id="service_name" type="text" class="form-control @error('service_name') is-invalid @enderror" name="service_name" value="{{ $service->name }}" required autocomplete="service_name" autofocus>

                                @error('service_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="service_name" class="col-md-4 col-form-label text-md-right">{{ __('Paslaugos lygmuo') }}</label>

                            <div class="col-md-6">
                                
                                <select id="service_parent_id" class="form-control @error('service_parent_id') is-invalid @enderror" name="service_parent_id" required autofocus>
                                    <option value="0">pagrindinė paslauga</option>
                                    @foreach(\App\Service::all() as $service_new)
                                        @if ($service->id == $service_new->id)
                                            @continue
                                        @endif
                                        <option value="{{ $service_new->id }}" {{ $service->parent_id == $service_new->id ? 'selected="selected"' : '' }}>{{ $service_new->name }}</option>    
                                    @endforeach
                                </select>
                                
<!--                                <input type="text" value="{{ $service->parent_id }}" required autocomplete="service_name" autofocus>-->

                                @error('service_parent_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Išsaugoti') }}
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
