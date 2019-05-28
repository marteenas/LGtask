@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Sistemos keitimo forma') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('systems.update', $system->id) }}">
                        {{method_field('PUT')}}
                        @csrf

                        <div class="form-group row">
                            <label for="system_name" class="col-md-4 col-form-label text-md-right">{{ __('Sistemos aprašas') }}</label>

                            <div class="col-md-6">
                                <input id="system_name" type="text" class="form-control @error('system_name') is-invalid @enderror" name="system_name" value="{{ $system->name }}" required autocomplete="system_name" autofocus>

                                @error('system_name')
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
