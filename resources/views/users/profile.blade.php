<x-app-layout>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-app.navbar />




        <div class="p-4">

            <div class="d-flex justify-content-between mb-2" style="margin-right: 6px; ">
                <div class="col-xl-3 col-sm-4" style="width: 15rem;">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row" ">
                                <div class="col-4 align-content-center">
                                    <a href="{{ route('users.index') }}" class="text-decoration-none">
                                        <div
                                            class="d-flex justify-content-center align-items-center icon-sm bg-gradient-dark shadow border-radius-md">
                                            <i class="fas fa-arrow-left text-xs opacity-10" aria-hidden="true"
                                                style="color: #ffff;"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-8">
                                    <div class="numbers mt-1 d-flex align-items-center">

                                        <h5 class="font-weight-bolder mb-0" style="margin-right: 1rem">
                                            Perfil
                                        </h5>
                                        <i class="fa-solid fa-id-card"
                                            style="color: #1f3051; font-size: 1.5rem;"></i>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <br>
            <br>

            <div class="card card-body blur shadow-blur mt-n6">
                <div class="row gx-4">
                    <div class="col-auto">
                        <div class="col-auto">
                            <div class="avatar avatar-xl position-relative" onclick="toggleCentered(event)">
                                <img src="{{ Auth::user()->photo1 ?? asset('img/fav.jpg') }}" alt="..."
                                    class="w-100 h-100 border-radius-lg shadow-sm"
                                    style="cursor: pointer; object-fit: cover">
                            </div>
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                {{ auth()->user()->name }}
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                                {{ auth()->user()->rol }}
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="container-fluid py-4">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">Información de Perfil</h6>
                </div>
                <div class="card-body pt-4 p-3">
                    <form action="{{ route('users.update', $user->id) }}" method="POST" role="form text-left"
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
                            <div class="m-3  alert alert-info alert-dismissible fade show" id="myAlert1"
                                role="alert">
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
                                    <label for="user-name" class="form-control-label">Nombre Completo</label>
                                    <div class="@error('user.name')border border-danger rounded-3 @enderror">
                                        <input class="form-control" value="{{ auth()->user()->name }}" type="text"
                                            placeholder="Nombre" id="user-name" name="name">
                                        @error('name')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user-email" class="form-control-label">{{ __('Email') }}</label>
                                    <div class="@error('email')border border-danger rounded-3 @enderror">
                                        <input class="form-control" value="{{ auth()->user()->email }}" type="email"
                                            placeholder="@example.com" id="user-email" name="email">
                                        @error('email')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user-ci" class="form-control-label">Carnet de Identidad</label>
                                    <div class="@error('ci')border border-danger rounded-3 @enderror">
                                        <input class="form-control" value="{{ auth()->user()->ci }}" type="text"
                                            placeholder="6287905 SC" id="user-ci" name="ci">
                                        @error('ci')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user-password" class="form-control-label">Nueva Contraseña</label>
                                    <div class="@error('user.password')border border-danger rounded-3 @enderror">
                                        <input class="form-control" value="" type="password"
                                            placeholder="Contraseña" id="user-password" name="password">
                                        @error('password')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user.phone" class="form-control-label">Celular</label>
                                    <div class="@error('user.phone')border border-danger rounded-3 @enderror">
                                        <input class="form-control" type="tel" placeholder="40770888444"
                                            id="number" name="phone" value="{{ auth()->user()->phone }}">
                                        @error('phone')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user.location" class="form-control-label">Dirección</label>
                                    <div class="@error('user.location') border border-danger rounded-3 @enderror">
                                        <input class="form-control" type="text" placeholder="Tu Ubicación"
                                            id="name" name="location" value="{{ auth()->user()->location }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="about">Sobre Mi</label>
                            <div class="@error('user.about')border border-danger rounded-3 @enderror">
                                <textarea class="form-control" id="about" rows="3" placeholder="Di algo sobre ti" name="about">{{ auth()->user()->about }}</textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="photo1">Foto de Perfil</label>
                                    <input type="file" class="form-control" id="photo1" name="photo1">
                                    @error('photo1')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>


                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-2">GUARDAR</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        </div>

        <script>
            var alertElement = document.getElementById("myAlert1");
            setTimeout(function() {
                alertElement.style.display = "none";
            }, 2000);
        </script>

        <x-app.footer />
        </div>
    </main>

</x-app-layout>
