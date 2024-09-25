@props(['actionName', 'description', 'deleteAction', 'button' => 'Delete'])

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
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="ease-in-out duration-500"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0" class="flex justify-center items-center h-screen
                     bg-black/40 backdrop-blur-[4px] fixed inset-0 z-40">
                    <div @keydown.window.escape="open = false"
                         @click.outside="open = false"
                         class="bg-white flex flex-col justify-between p-8 rounded-2xl shadow-2xl w-[90%] max-w-[450px] border border-gray-300 relative">
                        <div class="flex items-center space-x-4">
                            <div class="bg-gradient-to-r from-red-400 to-red-600 rounded-full p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="2.0" stroke="currentColor" class="w-8 h-8 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"></path>
                                </svg>
                            </div>
                            <div class="text-gray-800 text-wrap space-y-1">
                                <h1 class="text-2xl font-semibold">{{ $actionName }}</h1>
                                <p class="text-sm text-gray-600">{{ $description }}</p>
                            </div>
                        </div>
                        <div class="flex justify-end space-x-4 mt-6">
                            <button type="button"
                                    @click="open = false"
                                    class="py-2 px-6 rounded-full text-gray-700 bg-gray-200 hover:bg-gray-300 transition duration-300">
                                Cancel
                            </button>
                            <button type="button"
                                    @click="open = false"
                                    wire:click="{{ $deleteAction }}"
                                    class="py-2 px-6 rounded-full text-white bg-gradient-to-r from-red-500 to-red-700 hover:from-red-600 hover:to-red-800 transition duration-300">
                                {{ $button }}
                            </button>
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

