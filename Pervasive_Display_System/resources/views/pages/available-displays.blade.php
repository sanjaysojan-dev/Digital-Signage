<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Available Displays') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-200 bg-gray-900">
                    <div class="max-w-6xl mx-auto px-5 py-10">
                        <div class="text-center mb-10">
                            <h1 class=" title-font  mb-4 text-4l font-extrabold leading-10 tracking-tight sm:text-5xl sm:leading-none md:text-6xl">
                                Deployed Nodes</h1>
                            <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto"> All deployed displays. Users
                                can click on the displays to upload content</p>
                        </div>
                        <div>
                            <div class="max-w-6xl mx-auto px-5 py-5">
                                <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-5 -mt-4 ">

                                    @foreach($displayNodes as $display)
                                        @component('components.node-display-card')
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
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center bg-gray-500 ">{{$displayNodes ->links()}}</div>
            </div>
        </div>
    </div>
    </div>
    </div>
</x-app-layout>
