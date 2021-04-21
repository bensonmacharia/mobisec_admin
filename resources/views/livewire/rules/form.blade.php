<x-jet-form-section submit="createItem">
    <x-slot name="title">
        {{ __('Create New Rule Item') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Add a new analysis rule item in list.') }}
    </x-slot>


    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="rule" value="{{ __('Rule*') }}" />
            <x-jet-input id="rule" type="text" class="mt-1 block w-full" wire:model.defer="rule" autocomplete="rule" />
            <x-jet-input-error for="rule" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="description" value="{{ __('Rule Description') }}" />
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