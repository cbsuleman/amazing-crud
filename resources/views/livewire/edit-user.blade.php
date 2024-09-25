<div class="my-10 px-10 ">
    <h2 class="text-4xl text-center my-10 font-semibold">Edit User</h2>
    <form wire:submit="update" class="space-y-6">

        <x-forms.panel>
            <x-input-label for="name">Name</x-input-label>
            <x-forms.input wire:model.live="name" name="name"/>
            <x-forms.error error="name"/>
        </x-forms.panel>

        <x-forms.panel>
            <x-input-label for="email">Email</x-input-label>
            <x-forms.input wire:model.live="email" type="email" name="email"/>
            <x-forms.error error="email"/>
        </x-forms.panel>

        <x-forms.panel>
            <x-forms.label for="password">Password</x-forms.label>
            <x-forms.input wire:model.live="password" type="password" name="password"/>
            <x-forms.error error="password"/>
        </x-forms.panel>

        <x-forms.panel>
            <x-forms.label for="password_confirmation">Password Confirmation</x-forms.label>
            <x-forms.input wire:model.live="password_confirmation" type="password" name="password_confirmation"/>
            <x-forms.error error="password_confirmation"/>
        </x-forms.panel>

        <x-forms.panel>
            <x-forms.label for="date_of_birth">Date Of Birth</x-forms.label>
            <x-forms.input
                class=""
                wire:model.live="date_of_birth" type="date" name="date_of_birth"/>
            <x-forms.error error="date_of_birth"/>
        </x-forms.panel>

        <x-forms.panel>
            <x-forms.label for="address">Address</x-forms.label>
            <x-forms.input wire:model.live="address" name="address"/>
            <x-forms.error error="address"/>
        </x-forms.panel>

        <x-forms.panel>
            <x-forms.label for="role">Role</x-forms.label>
            <select wire:model.change="role" name="role"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option selected value="">Select</option>
                <option value="Admin">Admin</option>
                <option value="User">User</option>
            </select>
            <x-forms.error error="role"/>
        </x-forms.panel>

        <x-forms.panel>
            <x-forms.label for="gender">Gender</x-forms.label>
            <select wire:model.change="gender" name="gender"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option selected value="">Select</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <x-forms.error error="gender"/>
        </x-forms.panel>

        <x-forms.panel>
            <x-forms.label>Image</x-forms.label>
            <input wire:model.live="image" accept="image/png, image/jpeg" type="file"
                   class="py-1.5 px-2 text-sm text-gray-900 focus:ring ring-blue-600 border border-gray-300  rounded cursor-pointer bg-gray-50">
            <x-forms.error error="image"></x-forms.error>

            <div>
                @if($image)
                    <img class="rounded w-20 h-20 mt-5 block" src="{{ $image->temporaryUrl() }}" alt="">
                @endif
            </div>

            <div wire:loading wire:target="image">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="size-6 animate-spin text-green-500">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99"/>
                </svg>
            </div>

        </x-forms.panel>

        <x-forms.panel>
            <div class="flex justify-between my-4">
                <a wire:navigate
                   href="/users"
                   class="py-2 px-6 rounded-md text-gray-700 bg-gray-200 hover:bg-gray-300 transition duration-300">
                    Cancel
                </a>

                <button type="button"
                        wire:click="update()"
                        class="py-2 px-6 rounded-md text-white bg-gradient-to-r from-green-500 to-green-700 hover:from-red-600 hover:to-red-800 transition duration-300">
                    Update
                </button>
            </div>
        </x-forms.panel>
    </form>
</div>
