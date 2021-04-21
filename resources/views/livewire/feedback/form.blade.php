<x-jet-form-section submit="createItem">
    <x-slot name="title">
        {{ __('Create New Feedback Item') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Add a new feedback item in list.') }}
    </x-slot>


    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="user_name" value="{{ __('User*') }}" />
            <x-jet-input id="user_name" type="text" class="mt-1 block w-full" wire:model.defer="user_name" autocomplete="user_name" />
            <x-jet-input-error for="user_name" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="information" value="{{ __('Feedback*') }}" />
            <x-jet-input id="information" type="text" class="mt-1 block w-full" wire:model.defer="information" autocomplete="information" />
            <x-jet-input-error for="information" class="mt-2" />
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