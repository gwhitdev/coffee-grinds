<div class="mt-5 flex flex-col justify-center mx-auto w-1/2">
    <div class="text-center">
        <span class="text-2xl font-bold">
            Coffee Type
        </span>
    </div>
    <form wire:submit.prevent="create" class="mt-3">
        <x-input type="text" label="Enter a new type of coffee:" id="coffeeType" wire:model.defer="description" />
        <button class="mt-3 rounded hover:bg-purple-300 px-3 py-1 bg-purple-500 text-white">Create</button>
    </form>
</div>

