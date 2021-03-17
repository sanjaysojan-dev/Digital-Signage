<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Node Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 bg-gray-900">
                    @csrf
                    @component('components.node-edit-form')
                        @slot('link')
                            {{route('updateNodeDisplay', ['id' => $selectedNode->id])}}
                        @endslot
                        @slot('title')
                            {{$selectedNode->node_title}}
                        @endslot
                        @slot('location')
                            {{$selectedNode->node_location}}
                        @endslot
                        @slot('description')
                            {{$selectedNode->node_description}}
                        @endslot
                        <div class="mt-2">
                            <select name="node_mode" class="w-full">
                                @if($selectedNode->node_mode == "Landscape")
                                    <option value="Portrait"> Portrait</option>
                                    <option value="Landscape" selected> Landscape</option>
                                @else
                                    <option value="Portrait" selected> Portrait</option>
                                    <option value="Landscape"> Landscape</option>
                                @endif
                            </select>
                        </div>
                    @endcomponent






                </div>
            </div>
        </div>
    </div>
</x-app-layout>
