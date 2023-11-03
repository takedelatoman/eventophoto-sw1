<x-app-layout>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-app.navbar />
        <div class="container-fluid py-4 px-5">

            <div class="d-flex justify-content-between mb-2" style="margin-right: 6px; ">
                <div class="col-xl-3 col-sm-4" style="width: 15rem;">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row" ">
                                <div class="col-4 align-content-center">
                                    <a href="{{ route('eventos.index') }}" class="text-decoration-none">
                                        <div
                                            class="d-flex justify-content-center align-items-center icon-sm bg-gradient-dark shadow border-radius-md">
                                            <i class="fas fa-arrow-left text-xs opacity-10" aria-hidden="true"
                                            {{-- <i class="fa-solid fa-calendar-check"></i> --}}
                                                style="color: #ffff;"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-8">
                                    <div class="numbers mt-1 d-flex align-items-center">

                                        <h5 class="font-weight-bolder mb-0" style="margin-right: 1rem">
                                            Eventos
                                        </h5>
                                        <i class="fa-solid fa-calendar-check"
                                            style="color: #1f3051; font-size: 1.5rem;"></i>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container-fluid py-4 px-0">
                <div class="card">
                    <div class="card-header pb-0 ">
                        <h6 class="mb-0">Información de Evento</h6>
                    </div>
                    <div class="card-body pt-4 p-3">
                        <form action="{{ route('eventos.update', $evento->id) }}" method="POST" role="form text-left"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @if ($errors->any())
                                <div class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
                                    <span class="alert-text text-white">
                                        {{ $errors->first() }}</span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                        <i class="fa fa-close" aria-hidden="true"></i>
                                    </button>
                                </div>
                            @endif
                            @if (session('success'))
                                <div class="m-3  alert alert-info alert-dismissible fade show" id="myAlert1" role="alert">
                                    <span class="alert-text text-white">
                                        {{ session('success') }}</span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                        <i class="fa fa-close" aria-hidden="true"></i>
                                    </button>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="evento-nombre" class="form-control-label">Nombre del Evento</label>
                                        <div class="@error('nombre')border border-danger rounded-3 @enderror">
                                            <input class="form-control" type="text" placeholder="Nombre del evento"
                                                id="evento-nombre" name="nombre" value="{{ $evento->nombre }}">
                                            @error('nombre')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tipo">Tipo de Evento</label>
                                        <select class="form-select" id="tipo" name="tipo">
    
                                            <option value="{{ $evento->tipo }}">{{ $evento->tipo }}</option>
                                            <option value="">Seleccionar</option>
                                            <option value="Cumpleaños">Cumpleaños</option>
                                            <option value="Conferencia">Conferencia</option>
                                            <option value="Conferencia de Negocios">Conferencia de Negocios</option>
                                            <option value="Eventos Sociales">Eventos Sociales</option>
                                            <option value="Fiesta de Graduación">Fiesta de Graduación</option>
                                            <option value="Gala benéfica">Gala benéfica</option>
                                            <option value="Matrimonio">Matrimonio</option>
                                            <option value="Seminario">Seminario</option>
                                            <option value="Otro">Otro</option>
                                        </select>
                                        @error('tipo')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
    
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="evento-fecha" class="form-control-label">Fecha del Evento</label>
                                        <div class="@error('fecha')border border-danger rounded-3 @enderror">
                                            <input class="form-control" type="date" id="evento-fecha" name="fecha"
                                                value="{{ $evento->fecha }}">
                                            @error('fecha')
                                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="hora">Hora</label>
                                        <input type="time" class="form-control" id="hora" name="hora"
                                            value="{{ $evento->hora }}">
                                        @error('hora')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
    
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fecha">Lugar</label>
                                        <input type="text" class="form-control" placeholder="Lugar del evento"
                                            id="lugar" name="lugar" value="{{ $evento->lugar }}">
                                        @error('lugar')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="direccion">Dirección</label>
                                        <input type="text" class="form-control" id="direccion" name="direccion"
                                            value="{{ $evento->direccion }}" placeholder="Dirección del evento">
                                        @error('direccion')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @php
                                $id = $evento->id; // Aquí reemplaza con la variable que quieres pasar como {id}
                                $url = url('/register_event/' . $id); // Genera la URL completa
                                $download_url = url('/download_qr/' . $id); // Genera la URL completa de descarga
                            @endphp
    
                            <div class="row">
                                <div class="col-9 " style="margin-bottom: 2px;margin-left: 0.8em; padding: 0; he">
                                    <div class="form-group ">
                                        <label for="imagen">Imagen del Evento</label>
                                        <input type="file" class="form-control" id="imagen" name="imagen">
                                        @error('imagen')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    {{-- <div class="d-flex justify-content-end align-items-end mb-0 mx-5">
                                        <div class="position-relative" style="width: 45px">
                                            <a class="btn-sm bg-gradient-dark" href="{{ $download_url }}">
                                                <i class="fas fa-download text-xs opacity-10" aria-hidden="true"
                                                    style="color: #ffff;">&nbsp;QR</i>
                                            </a>
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="col-md-2">
    
                                    {{-- <div class="position-relative">
                                        <img src="https://qrickit.com/api/qr.php?d={{ $url }}&qrsize=175&t=p&e=m">
    
                                    </div> --}}
                                </div>
    
    
                            </div>
                            <div class="col-md-12" style="padding-bottom: 0; margin-bottom: 0">
                                <div class="d-flex justify-content-center align-items-center m-1" style="overflow: hidden;">
                                    <img src="{{ $evento->imagen }}" alt="Imagen de la carta" class="card-img"
                                        style="width: 350px; height: 250px; object-fit: cover; cursor: pointer;"
                                        onclick="toggleCentered(event)">
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn bg-gradient-dark btn-md mt-0 mb-3">MODIFICAR</button>
                            </div>
    
    
    
    
                        </form>
    
                    </div>
                </div>
            </div>
   
    

        </div>

        <x-app.footer />
        </div>
    </main>

</x-app-layout>
