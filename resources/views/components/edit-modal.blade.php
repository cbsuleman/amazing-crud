@props(['actionName', 'description', 'action', 'button' => 'Delete', 'id'])

<div class="relative">
    <ul class="flex space-x-2">
        <li x-data="{ open: false }">


            <button type="button" title="Delete Plan" style="background: none; border: none; padding: 0;">
                {{ $slot }}
            </button>
            <div>
                <div x-show="open" style="display: none"
                     x-transition:enter="ease-in-out duration-300"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="ease-in-out duration-500"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0" class="flex justify-center items-center h-screen
                     bg-black/40 backdrop-blur-[4px] fixed inset-0 z-40">
                    <div @keydown.window.escape="open = false"
                         @click.outside="open = false"
                         class="bg-white flex flex-col justify-between p-8 rounded-2xl shadow-2xl w-[90%] max-w-[700px] border border-gray-300 relative">
                        <div class="flex items-center space-x-4">


                            <div class="rounded max-w-sm mx-auto px-8">

                                {{--                                <h2 class="text-2xl text-cyan-950 font-bold font-serif text-center mb-6">Log In</h2>--}}
                                <livewire:edit-user id="{{ $id }}" />
                            </div>

                        </div>

                        <div class="absolute top-4 right-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                                 stroke="currentColor"
                                 class="w-6 h-6 text-gray-400 cursor-pointer hover:text-gray-600 transition duration-300"
                                 @click="open = false">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</div>

