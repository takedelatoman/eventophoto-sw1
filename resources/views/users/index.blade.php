<x-app-layout>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-app.navbar />
        <div class="container-fluid py-4 px-5">

            <div class="row">
                <div class="col-12">
                    <div class="card border shadow-xs mb-4">
                        <div class="card-header border-bottom pb-0">
                            <div class="d-sm-flex align-items-center">
                                <div>
                                    <h6 class="font-weight-semibold text-lg mb-0">Lista de Usuarios</h6>
                                    <p class="text-sm">Visualiza información detallada de los usaurios.</p>
                                </div>
                                <div class="ms-auto d-flex">

                                    {{-- <button type="button"
                                        class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2">
                                        <span class="btn-inner--icon">
                                            <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24" fill="currentColor" class="d-block me-2">
                                                <path
                                                    d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z" />
                                            </svg>
                                        </span>
                                        <span class="btn-inner--text">Añadir usuario</span>
                                    </button> --}}
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 py-0">
                            <div class="table-responsive p-0">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="align-middle text-center text-secondary text-xs font-weight-semibold opacity-7">Id</th>
                                            <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Foto</th>
                                            <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Nombre</th>
                                            <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Email</th>
                                            <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Carnet de Identidad</th>
                                            <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Rol</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                        <tr>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-sm font-weight-normal">{{$user->id}}</span>
                                            </td>
                                            
                                            <td class="align-middle text-center">
                                                <div >
                                                    <img src="../assets/img/team-2.jpg" class="avatar avatar-content rounded" alt="user1">
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <p class="text-sm text-secondary mb-0">{{$user->name}}</p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <p class="text-sm text-secondary mb-0">{{$user->email}}</p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <p class="text-sm text-secondary mb-0">{{$user->ci}}</p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <p class="text-sm text-secondary mb-0">{{$user->rol}}</p>
                                            </td>
                                            
                                            <td class="align-middle text-center">
                                                <a href="{{ route('users.show', $user->id) }}" class="text-secondary font-weight-bold text-xs" data-bs-toggle="tooltip" data-bs-title="Ver Usuario">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>

                                        
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

            <x-app.footer />
        </div>
    </main>

</x-app-layout>
