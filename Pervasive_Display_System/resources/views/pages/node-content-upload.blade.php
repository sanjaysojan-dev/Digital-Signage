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

                    <form method="POST" action="{{route('uploadContent', ['id' => $node->id])}}" enctype="multipart/form-data">
                        <div class="flex items-center space-x-4 justify-start top-auto">
                            <div class="ml-10">
                                @csrf
                                <select name="node_content" class="w-full">
                                    @foreach($uploadedContents as $uploads)
                                        <option value={{$uploads->id}}> {{$uploads->content_title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="m-10 bg-yellow-500 text-gray-900 px-2 py-2 rounded-md mr-2"
                                    type="submit">Post to Node
                            </button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
