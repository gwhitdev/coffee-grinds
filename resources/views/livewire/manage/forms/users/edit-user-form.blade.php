<div class="w-1/2 flex flex-col mx-auto justify-center mt-5">
    <div class="text-center">
        <span class="font-bold text-3xl">
            Edit user
        </span>
    </div>
    <div>
        @if(session()->has('message'))
            {{ session('message') }}
        @endif

    </div>
    <div class="mt-5">
        <form wire:submit.prevent="changeRole">
            <div>
                <x-native-select
                    label="Select Status"
                    placeholder="Select one status"
                    :options="$roles"
                    wire:model.defer="user.role_id"
                    option-label="name"
                    option-value="id"

                />
            </div>
            <button class="px-3 py-1 bg-purple-500 hover:bg-purple-300 text-white mt-3 rounded">Change role</button>
        </form>
    </div>

</div>
