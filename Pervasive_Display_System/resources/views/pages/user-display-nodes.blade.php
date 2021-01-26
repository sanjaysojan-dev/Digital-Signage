<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Display Nodes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   User Displays
                    <div class="flex items-center space-x-4 justify-end mt-4 top-auto">
                        <a class="btn bg-blue-600 text-gray-200 px-2 py-2 rounded-md"
                           href="{{ route('imageSlider')}}">Image Slider</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
