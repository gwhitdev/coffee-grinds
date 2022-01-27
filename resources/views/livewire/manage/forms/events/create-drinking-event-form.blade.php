<div class="border-[0.5px] border-gray-400 w-1/2 mx-auto mt-3 p-3"  >
    <div class="text-center font-bold text-3xl mt-3">Create a new coffee drinking event</div>
    <div >
        <form wire:submit.prevent="create" class="w-1/2 justify-center mx-auto mt-3">
        <div class="flex flex-col gap-2" >
            <x-datetime-picker
                label="Event date"
                placeholder="Date"
                wire:model.defer="drinkingEvent.event_date_time"
            />
            <x-input label="Rating:" wire:model.defer="drinkingEvent.rating"/>
            <x-input label="Comments:" wire:model.defer="drinkingEvent.comments" />


            <x-native-select label="Select brand" wire:model="drinkingEvent.brand_id" :options="[['id' => 0, 'name' => 'Choose'], ...$brands]" option-label="name" option-value="id" />
            <div x-data="{atHome: false, toggle() { this.atHome = !this.atHome } }" >
                <x-toggle x-on:click="toggle()" label="Drank at home?" wire:model="drinkingEvent.drank_at_home" />
                <x-native-select label="Select drinking location" x-bind:disabled="atHome" :disabled="$drinkingEvent->drank_at_home ? 'disabled' : '' "  wire:model="drinkingEvent.drinking_location_id" :options="[['id' => 0, 'address_first_line' => 'Choose'], ...$locations]" option-label="address_first_line" option-value="id" />
            </div>

            <x-native-select label="Select coffee type" wire:model="drinkingEvent.coffee_type_id" :options="[['id' => 0, 'description' => 'Choose'], ...$coffeeTypes]" option-label="description" option-value="id" />
            <x-native-select label="Select drink type" wire:model="drinkingEvent.drink_type_id" :options="[['id' => 0, 'name' => 'Choose'], ...$drinkTypes]" option-label="name" option-value="id" />
            <x-native-select label="Select supplier" wire:model="drinkingEvent.supplier_id" :options="[['id' => 0, 'reference' => 'Choose'], ...$suppliers]" option-label="reference" option-value="id" />

        </div>
            <button class="mt-3 rounded px-5 py-2 bg-purple-500 text-white hover:bg-purple-300">
                Create
            </button>
        </form>
    </div>
</div>
