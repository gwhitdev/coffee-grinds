<form wire:submit.prevent="create">
    <div>
        <x-input label="Type of drink:" wire:model.defer="name" />
    </div>
    <button class="px-3 py-1 bg-purple-500 text-white">Create</button>
</form>
