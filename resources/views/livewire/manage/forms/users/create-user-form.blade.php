<form wire:submit.prevent="create">
    <label for="brandName">

    </label>
    <input type="text" id="brandName" wire:model.defer="name">
    <button class="px-3 py-1 bg-purple-500 text-white">Create</button>
</form>
