<div class="">
    <form wire:submit.prevent="updatePassword">
        <div class="px-6 py-8">
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12">
                    <h1 class="text-lg font-semibold text-theme-gray">{{ __('Cambiar contraseña') }}</h1>
                </div>

                <div class="col-span-12 md:col-span-6">
                    <x-jet-label for="current_password" class="form-label" value="{{ __('Current Password') }}" />
                    <x-jet-input id="current_password" type="password" class="form-control" wire:model.defer="state.current_password" autocomplete="current-password" />
                    <x-jet-input-error for="current_password" class="mt-2" />
                </div> 

                <div class="col-span-6 md:col-span-6">
                    <x-jet-label for="password" class="form-label" value="{{ __('New Password') }}" />
                    <x-jet-input id="password" type="password" class="form-control" wire:model.defer="state.password" autocomplete="new-password" />
                    <x-jet-input-error for="password" class="mt-2" />
                </div>
        
                <div class="col-span-6 md:col-span-6">
                    <x-jet-label for="password_confirmation" class="form-label" value="{{ __('Confirm Password') }}" />
                    <x-jet-input id="password_confirmation" type="password" class="form-control" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
                    <x-jet-input-error for="password_confirmation" class="mt-2" />
                </div>

            </div>
        </div>
        <div class="flex items-center justify-end px-6 pb-4">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __('Saved.') }}
            </x-jet-action-message>

            <button type="submit" wire:loading.attr="disabled" wire:target="photo" class="flex justify-center items-center px-6 py-2 bg-theme-gray border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:opacity-75 focus:outline-none focus:border-transparent focus:ring focus:ring-transparent disabled:opacity-25 transition">{{ __('Save') }}</button>

        </div>
        
    </form>
</div>
