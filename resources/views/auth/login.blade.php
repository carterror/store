<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />


        <div class="row" style="margin-top: 20px;">
            <form class="col s12" method="POST" action="{{ route('login') }}">
                @csrf
              <div class="row">
                <div class="input-field col s11 blue-grey-text text-lighten-5">
                    <i class="mdi-content-drafts prefix"></i>
                    <input id="name" class="blue-grey-text text-lighten-5" type="text" name="name" :value="old('name')" required>
                    <label for="name">Usuario</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s11 blue-grey-text text-lighten-5">
                    <i class="mdi-action-lock prefix"></i>
                    <input class="blue-grey-text text-lighten-5" id="password" type="password" name="password" required autocomplete="current-password">
                    <label for="password">Contraseña</label>
                </div>
              </div>
              <div class="row">
                    <p class="col s11 offset-s2">
                        <input type="checkbox" id="test6"/>
                        <label for="test6">{{ __('Remember me') }}</label>
                      </p>
              </div>
              <div class="row">
                <div class="input-field col s11 right-align">
                <x-button style="margin-left: 10px;">
                    {{ __('Log in') }}
                </x-button>
                </div>
               </div>
              
            </form>
          </div>

    </x-auth-card>
</x-guest-layout>
