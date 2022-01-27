<form wire:submit.prevent="create">
    <div>
        <x-input label="Reference" placeholder="Reference" wire:model.defer="reference"/>
    </div>
    <div>
        <x-input label="First line of address" wire:model.defer="address_first_line" />
    </div>
    <div>
        <x-input label="Postcode" wire:model.defer="postcode" />
    </div>
    <div>
        <x-input label="Web address" wire:model.defer="url" />
    </div>
    <button class="px-3 py-1 bg-purple-500 text-white">Create</button>
</form>
