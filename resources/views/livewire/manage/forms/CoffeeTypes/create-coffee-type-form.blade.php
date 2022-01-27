<form wire:submit.prevent="create">
    <label for="coffeeType">
        Coffee Type
    </label>
    <input type="text" id="coffeeType" wire:model.defer="description">
    <button class="px-3 py-1 bg-purple-500 text-white">Create</button>
</form>
