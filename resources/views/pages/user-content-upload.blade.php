<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Content Uploads') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                @component('components.display-content-form')
                    @endcomponent


                    <div class="max-w-6xl mx-auto px-5 py-5">
                        <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-5 -mt-4 ">

                            @foreach($userContent  as $content)

                            @component('components.node-content-card')
                            @endcomponent

                            @endforeach
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    </div>
</x-app-layout>
