<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Selected Node') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-900 border-b border-gray-200">
                    @component('components.selected-node-card')
                        @slot('nodeTitle')
                            {{$node->node_title}}
                        @endslot
                        @slot('nodeMode')
                            {{$node->node_mode}}
                        @endslot
                        @slot('nodeLocation')
                            {{$node->node_location}}
                        @endslot
                        @slot('nodeDescription')
                            {{$node->node_description}}
                        @endslot
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
