<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900" style="color: #d1d5db;">
            {{ __('Información del Perfil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600" style="color: #d1d5db;">
            {{ __("Actualice la información del perfil.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="lastname" :value="__('Apellido')" />
            <x-text-input id="lastname" name="lastname" type="text" class="mt-1 block w-full" :value="old('lastname', $user->lastname)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('lastname')" />
        </div>

        <div>
            <x-input-label for="area" :value="__('Área')" />
            <x-text-input id="area" name="area" type="text" class="mt-1 block w-full" :value="old('area', $user->area)" required autofocus autocomplete="area" />
            <x-input-error class="mt-2" :messages="$errors->get('area')" />
        </div>

        <div>
            <x-input-label for="phone" :value="__('Teléfono')" />
            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $user->phone)" required autofocus autocomplete="phone" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>

        <div>
            <x-input-label for="photo" :value="__('Foto de Perfil')" />
            <p class="mt-1 text-sm text-gray-600" style="margin-top: 0.6rem; margin-left: 1rem; color: #d1d5db;">
            {{ __('Foto de Perfil Actual:') }}
            </p>
            @if ($user->photo)
            <img src="{{ asset($user->photo) }}" alt="Foto de perfil" class="mt-2 w-40 h-auto" style="width: 50%; height: 50%; border-radius: 40px; margin:0.5rem">
            @else
                <p class="mt-2 text-gray-500" style="margin-left: 1rem;">No hay foto almacenada</p>
            @endif
            <input id="photo" name="photo" type="file" class="mt-1 block w-full" accept="image/*" :value="old('photo', $user->photo)" autofocus onchange="mostrarFotoSeleccionada(event)" />
            <div id="photo-preview" class="mt-2" style="width: 40%; height: 40%; margin:0.5rem;"></div>
            <x-input-error class="mt-2" :messages="$errors->get('photo')" />
        </div>

        <script>
            function mostrarFotoSeleccionada(event)
            {
            const archivo = event.target.files[0];

                if (archivo) {
                    const reader = new FileReader();
                    reader.onload = function(e)
                    {
                            const preview = document.getElementById('photo-preview');
                            preview.innerHTML = `<img src="${e.target.result}" alt="Foto seleccionada" class="w-40 h-auto">`;
                    };
                    reader.readAsDataURL(archivo);
                    }
                    else
                    {
                        const preview = document.getElementById('photo-preview');
                        preview.innerHTML = '';
                    }
                }
        </script>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Guardar') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Guardado.') }}</p>
            @endif
        </div>
    </form>
</section>
