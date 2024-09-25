<div class="my-10">
    <section>

        <div class="mx-auto max-w-screen-xl px-4 lg:px-12 my-6">

            <div class="bg-white relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex items-center justify-between d p-4">
                    <div class="flex">
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                     fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <input type="text"
                                   wire:model.live="search"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 "
                                   placeholder="Search" required="">
                        </div>
                    </div>

                    <div class="flex space-x-3">
                        <div class="flex space-x-3 items-center">
                            <label class="w-40 text-sm font-medium text-gray-900">User Role :</label>
                            <select
                                wire:model.live="role"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option value="">All</option>
                                <option value="Admin">Admin</option>
                                <option value="User">User</option>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-4 py-3" wire:click="setSortBy('name')">
                                <div class="flex items-center">name
                                    @include('components.sortable-table', ['name' => 'name'])
                                </div>
                            </th>
                            <th scope="col" class="px-4 py-3">
                                <div class="flex items-center" wire:click="setSortBy('email')">
                                    email
                                    @include('components.sortable-table', ['name' => 'email'])
                                </div>
                            </th>
                            <th scope="col" class="px-4 py-3" wire:click="setSortBy('role')">
                                <div class="flex items-center">
                                    role
                                    @include('components.sortable-table', ['name' => 'role'])

                                </div>
                            </th>
                            <th scope="col" class="px-4 py-3" wire:click="setSortBy('gender')">
                                <div class="flex items-center">gender
                                    @include('components.sortable-table', ['name' => 'gender'])
                                </div>
                            </th>
                            <th scope="col" class="px-4 py-3">
                                <div class="flex items-center">date of birth</div>
                            </th>
                            <th scope="col" class="px-4 py-3">
                                <div class="flex items-center">address</div>
                            </th>
                            <th scope="col" class="px-4 py-3">
                                <div class="flex items-center">image</div>
                            </th>
                            <th scope="col" class="px-4 py-3">
                                <div class="flex items-center">actions</div>
                            </th>

                        </tr>
                        </thead>

                        <tbody>
                        @foreach($users as $user)
                            <tr wire:key="{{ $user->id }}"
                                class="border-b dark:border-gray-700">
                                <th scope="row"
                                    class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $user->name }}
                                </th>
                                <td class="px-4 py-3">{{ $user->email }}</td>
                                <td class="px-4 py-3 text-white">
                                    <div
                                        class="rounded w-fit px-3 {{ $user->role == 'Admin' ? 'bg-green-500' : 'bg-red-500' }}">
                                        {{ $user->role == 'Admin' ? 'Admin' : 'User' }}
                                    </div>
                                </td>
                                <td class="px-4 py-3">{{ $user->gender }}</td>
                                <td class="px-4 py-3">{{ $user->date_of_birth }}</td>
                                <td class="px-4 py-3">{{ str($user->address)->words(3) }}</td>
                                <td class="px-4 py-3">
                                    @if($user->image)
                                        <div class="w-10">
                                            <img class="border border-gray-500 rounded" src="{{ asset($user->image) }}"
                                                 alt="">
                                        </div>
                                    @endif
                                </td>
                                <td class="px-4 py-3 flex justify-center items-center space-x-1">

                                    <div>

                                        <button>
                                            <a wire:navigate href="/users/{{ $user->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                     stroke-width="1.5" stroke="currentColor"
                                                     class="size-6 text-blue-600 hover:text-blue-700">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"/>
                                                </svg>
                                            </a>
                                        </button>
                                    </div>

                                    <x-modal-2 button="Yes" deleteAction="delete({{ $user->id }})"
                                               actionName="Delete user?"
                                               description="Are you sure you want to delete this user?">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             @click="open = true"
                                             fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                             stroke="currentColor"
                                             class="size-6 text-red-600 hover:text-red-700">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                                        </svg>
                                    </x-modal-2>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>

                    </table>
                </div>

                <div class="py-4 px-3">
                    <div class="flex">
                        <div class="flex space-x-4 items-center mb-3">
                            <label class="w-32 text-sm font-medium text-gray-900">Per Page</label>
                            <select
                                wire:model.live="perPage"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                    </div>


                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </section>
</div>
