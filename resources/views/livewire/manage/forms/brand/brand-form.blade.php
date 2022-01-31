<div class="mt-5 flex flex-col justify-center mx-auto w-1/2">
    <div class="text-center">
        <span class="text-2xl font-bold">
            Create a new brand name record:
        </span>
    </div>
    <form wire:submit.prevent="create" class="mt-5">
        @error('name') <div>{{ $message }}</div>@enderror
        <x-input type="text" label="Brand name:" id="brandName" wire:model.defer="name" />
        <button class="mt-3 px-3 py-1 bg-purple-500 text-white rounded hover:bg-purple-300">Create</button>
    </form>
</div>
