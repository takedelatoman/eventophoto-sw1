<x-app-layout>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-app.navbar />
        <div class="container-fluid py-4 px-5">

            {{-- <div class="row">
                <div class="col-12">
                    <div class="card border shadow-xs mb-4">
                        <div class="card-header border-bottom pb-0">
                            <div class="d-sm-flex align-items-center">
                                <div>
                                    <h6 class="font-weight-semibold text-lg mb-0">Lista de Eventos</h6>
                                    <p class="text-sm">Visualiza información detallada de los eventos.</p>
                                </div>
                                <div class="ms-auto d-flex">
                                    <!-- Aquí puedes agregar botones u opciones adicionales si es necesario -->
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 py-0">
                            <div class="table-responsive p-0">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="align-middle text-center text-secondary text-xs font-weight-semibold opacity-7">Id</th>
                                            <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Nombre</th>
                                            <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Tipo</th>
                                            <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Lugar</th>
                                            <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Imagen</th>
                                            <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Fecha</th>
                                            <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Hora</th>
                                            <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Dirección</th>
                                            <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Org ID</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($eventos as $evento)
                                        <tr>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-sm font-weight-normal">{{$evento->id}}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <p class="text-sm text-secondary mb-0">{{$evento->nombre}}</p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <p class="text-sm text-secondary mb-0">{{$evento->tipo}}</p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <p class="text-sm text-secondary mb-0">{{$evento->lugar}}</p>
                                            </td>
                                            <td class="align-middle text-center">
                                                @if ($evento->imagen)
                                                <img src="{{ asset('ruta/de/tu/imagen/' . $evento->imagen) }}" class="avatar avatar-content rounded" alt="Imagen del evento">
                                                @else
                                                <p class="text-sm text-secondary mb-0">Sin imagen</p>
                                                @endif
                                            </td>
                                            <td class="align-middle text-center">
                                                <p class="text-sm text-secondary mb-0">{{$evento->fecha}}</p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <p class="text-sm text-secondary mb-0">{{$evento->hora}}</p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <p class="text-sm text-secondary mb-0">{{$evento->direccion}}</p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <p class="text-sm text-secondary mb-0">{{$evento->org_id}}</p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <!-- Puedes agregar enlaces o acciones adicionales si es necesario -->
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}


            @foreach ($eventos as $evento)
            
                <div class="col-lg-6 col-md-6 col-sm-12 mb-lg-0 mb-4 pb-4">
                    <div class="card w-100 h-100 " id="eventoCard-{{ $evento->id }}">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="d-flex flex-column h-100 position-relative">
                                        <p class="mb-1 pt-2 text-bold" style="font-size: 14px;">
                                            {{ \Carbon\Carbon::parse($evento->fecha)->format('d/m/Y') }} -
                                            {{ \Carbon\Carbon::parse($evento->hora)->format('H:i') }} horas</p>
                                        <h5 class="font-weight-bolder mb-0" style="font-size: 16px;">
                                            {{ $evento->nombre }}
                                        </h5>
                                        <b class="p-0 m-0">{{ $evento->tipo }}</b>
                                        <p class="mb-3" style="font-size: 12px;"> <b>Dirección: </b> <br>
                                            {{ $evento->lugar }}, <br> {{ $evento->direccion }}</p>
                                        <a class="text-body text-sm font-weight-bolder mb-0 icon-move-right mt-auto"
                                            href="{{ route('eventos.edit', $evento->id) }}"
                                            style="font-size: 12px;">
                                            Revisar
                                            <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <form action="{{ route('eventos.destroy', $evento) }}" method="post">
                                @method('delete')
                                @csrf
                                <div class="position-absolute end-0 mt-2 ms-2" style="top: -16px;  ">
                                    <button class="btn  btn-icon btn-sm text-light btnEliminar" type="submit"
                                        title="Eliminar"
                                        style="background-color: #343a40;width: 25px;height: 25px;; border-radius: 35%; padding: 5px;"
                                        onclick="return confirm('¿Está seguro de que desea borrar este evento?');">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </form> 
                                </div>
                                <div class="col-lg-6 ms-auto text-center mt-3 mt-lg-0">
                                    <div class="bg-gradient-dark h-100 position-relative">
                                        <img src="{{ $evento->imagen ? $evento->imagen : asset('img/evento_gen.jpg') }}"
                                            style="cursor: pointer;object-fit: cover; "
                                            class="position-absolute h-100 w-100 top-0 d-lg-block d-none border-radius-lg img-fluid"
                                            onclick="toggleCentered(event)">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
        @endforeach
            
   
    

        </div>

        <x-app.footer />
        </div>
    </main>

</x-app-layout>
