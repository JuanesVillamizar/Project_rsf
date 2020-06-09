@extends('layout.index')

@push('styles')
{{--    Fuente de letra--}}
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP&display=swap" rel="stylesheet">
{{--    Estilos de la pagina--}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
{{--    SelectPicker Bootstrap 4--}}
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">--}}
@endpush

@section('content')
    <div id="page-top">
        @include('includes.main-menu')
        <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end">
                        <h1 class="text-uppercase text-white font-weight-bold">La red mas favorable para mostrar tus habilidades</h1>
                        <hr class="divider my-4" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white font-weight-light mb-5">Esta es una iniciativa para que los diseñadores puedan mostrar sus habilidades entre ellos y competir por mostrar quien es el mejor.</p>
                        <a class="btn btn-success btn-xl js-scroll-trigger" href="#about">Saber más!!!</a>
                    </div>
                </div>
            </div>
        </header>
        <section class="page-section bg-info masthead" id="about">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-black mt-0">¡Tenemos lo que buscas!</h2>
                        <hr class="divider light my-4" />
                        <p class="text-black mb-4">Somos un grupo de estudiantes del ITM. Gracias a nuestro equipo de trabajo hemos planeado la manera correcta de que los diseñadores muestren sus asombrosos diseños!.</p>
                        <a class="btn btn-success btn-xl js-scroll-trigger" href="{{ route('register') }}">Comenzar!</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="page-section" id="services">
            <div class="container">
                <h2 class="text-center mt-0">¡Servicios!</h2>
                <hr class="divider my-4" />
                <div class="row">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-gem text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Posibles trabajos</h3>
                            <p class="text-muted mb-0">Nuestra plataforma esta abierta a que todas las empresas puedan buscar diseñadores aqui.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-laptop text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Aprender de los demas</h3>
                            <p class="text-muted mb-0">El contacto directo con el dueños de elegantes piezas de trabajo te ayudara a mejorar cada dia más.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-globe text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Listo para publicar</h3>
                            <p class="text-muted mb-0">Tus diseños se publicaran al mundo en el momento en que los subas.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-heart text-primary mb-4"></i>
                            <h3 class="h4 mb-2">Trabajos con pasion</h3>
                            <p class="text-muted mb-0">Hay diseños que estan hechos con amor y son de libre uso tambien.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="page-section" id="contact">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="mt-0">¡Si tienes dudas no dudes en contactarnos!</h2>
                        <hr class="divider my-4" />
                        @include('includes.contact-us')
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                        <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                        <div>+57 300 111 22 33</div>
                    </div>
                    <div class="col-lg-4 mr-auto text-center">
                        <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                        <a class="d-block" href="mailto:soporte@ClubSocialDeTrabajo.com">soporte@ClubSocialDeTrabajo.com</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
{{--    SelectPicker Bootstrap 4--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>--}}
@endpush
