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
