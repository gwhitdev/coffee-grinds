<form wire:submit.prevent="create">
    <div>
        <label for="addressFirstLine">
            First line of address:
        </label>
        <input type="text" id="addressFirstLine" wire:model.defer="address_first_line">
    </div>
    <div>
        <label for="postcode">
            Postcode:
        </label>
        <input type="text" id="postcode" wire:model.defer="address_postcode">
    </div>
    <button class="px-3 py-1 bg-purple-500 text-white">Create</button>
</form>
