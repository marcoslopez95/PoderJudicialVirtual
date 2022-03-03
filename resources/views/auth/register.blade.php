@extends('layouts.app', ['activePage' => 'register', 'title' => 'Registro / Panadería'])

@section('content')
    <div class="full-page register-page section-image" data-color="orange" data-image="{{ asset('light-bootstrap/img/bg5.jpg') }}">
        <div class="content">
            <div class="container">
                <div class="card card-register card-plain text-center">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-5 ml-auto">
                                <div class="media">
                                    <div class="media-left">
                                        <div class="icon">
                                            <i class="nc-icon nc-circle-09"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h4>{{ __('Registro Gratis') }}</h4>
                                        
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-left">
                                        <div class="icon">
                                            <i class="nc-icon nc-preferences-circle-rotate"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h4>{{ __('Hecho a tu medida') }}</h4>
                                        
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-left">
                                        <div class="icon">
                                            <i class="nc-icon nc-bank"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h4>{{ __('Tu mejor opción jurídica') }}</h4>
        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mr-auto">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="card card-plain">
                                        <div class="content">
                                            <div class="form-group">
                                                <input type="text" name="name" id="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>
                                            </div>

                                            <div class="form-group">   {{-- is-invalid make border red --}}
                                                <input type="email" name="email" value="{{ old('email') }}" placeholder="Correo Electrónico" class="form-control" required>
                                            </div>

                                            <div class="form-group">
                                                <input type="password" name="password" class="form-control" required placeholder="Contraseña">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" class="form-control" required autofocus>
                                            </div>
                                            <div class="form-group d-flex justify-content-center">
                                                <div class="form-check rounded col-md-10 text-left">
                                                    <label class="form-check-label text-white d-flex align-items-center">
                                                        <input class="form-check-input" name="agree" type="checkbox" required >
                                                        <span class="form-check-sign"></span>
                                                        <b>{{ __('Acepto condiciones y términos') }}</b>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="footer text-center">
                                                <button type="submit" class="btn btn-fill btn-neutral btn-wd">{{ __('Registrarse') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col">
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-warning alert-dismissible fade show" >
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close"> &times;</a>
                                        {{ $error }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            demo.checkFullPageBackgroundImage();

            setTimeout(function() {
                // after 1000 ms we add the class animated to the login/register card
                $('.card').removeClass('card-hidden');
            }, 700)
        });
    </script>
@endpush