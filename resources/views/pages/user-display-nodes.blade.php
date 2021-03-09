<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Display Nodes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-200 bg-gray-900">
                    @component('components.node-creation-form')
                    @endcomponent
                    <div class="max-w-6xl mx-auto px-5 py-5">
                        <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-5 -mt-4 ">

                            @foreach($nodes as $display)
                                @component('components.node-display-card')
                                    @slot('link')
                                        {{route('showNode',['id' => $display->id])}}}
                                    @endslot
                                    @slot('nodeTitle')
                                        {{$display->node_title}}
                                    @endslot
                                    @slot('nodeLocation')
                                        {{$display->node_location}}
                                    @endslot
                                    @slot('nodeDescription')
                                        {{$display->node_description}}
                                    @endslot
                                @endcomponent

                                    <div class="flex items-center space-x-4 justify-center mt-4">
                                        <a class="btn bg-blue-600 text-gray-200 px-2 py-2 rounded-md"
                                           href="">Edit</a>

                                        <form action="" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class=" bg-red-500 text-gray-900 px-2 py-2 rounded-md mr-2"
                                                    type="submit">Delete
                                            </button>
                                        </form>
                                    </div>
                            @endforeach
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
