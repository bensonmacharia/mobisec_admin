<x-jet-form-section submit="createItem">
    <x-slot name="title">
        {{ __('Create New Permission Item') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Add a new permission item in list.') }}
    </x-slot>


    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="permission" value="{{ __('Permission*') }}" />
            <x-jet-input id="permission" type="text" class="mt-1 block w-full" wire:model.defer="permission" autocomplete="permission" />
            <x-jet-input-error for="permission" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="description" value="{{ __('Permission Description') }}" />
            <x-jet-input id="description" type="text" class="mt-1 block w-full" wire:model.defer="description" autocomplete="description" />
            <x-jet-input-error for="description" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>