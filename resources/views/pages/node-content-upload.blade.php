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
                        @slot('nodeID')
                            {{$node->id}}
                        @endslot
                        @slot('nodeOwner')
                            {{$node->user->email}}
                        @endslot
                        @slot('nodeLocation')
                            {{$node->node_location}}
                        @endslot
                        @slot('nodeDescription')
                            {{$node->node_description}}
                        @endslot
                        @slot('link')
                            {{route('imageSlider', ['id' => $node->id])}}
                        @endslot
                        @slot('url')
                            display_system.test/imageSlider/{{$node->id}}
                        @endslot
                        @slot('flag')
                            {{route('FlagDisplayNode', ['id' => $node->id])}}
                        @endslot
                    @endcomponent

                    <div class="max-w-6xl mx-auto px-20 py-5">
                        <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-5 -mt-4 ">
                            @foreach($contentToDisplay as $uploads)
                                @component('components.node-content-card')
                                    @slot('link')
                                        {{route('showContentImage',['node_id'=>$node->id,'content_id'=>$uploads->id])}}
                                    @endslot
                                    @slot('image')
                                        {{"/storage/images/".$uploads->image->filename}}
                                    @endslot
                                    @slot('title')
                                        {{"ID: ".$uploads->id." - ".$uploads->content_title}}
                                    @endslot
                                    @slot('contentOwner')
                                        {{"Creator: ".$uploads->user->email}}
                                    @endslot
                                    @slot('description')
                                        {{"Description: ".$uploads->content_description}}
                                    @endslot
                                @endcomponent
                                <div class="flex items-center space-x-4 justify-center mt-4">
                                    <form
                                        action="{{route('removeFromNode', ['content_id'=> $uploads->id, 'node_id'=> $node->id])}}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button name="Remove{{$uploads->id}}"
                                                class=" bg-red-500 text-gray-900 px-2 py-2 rounded-md mr-2"
                                                type="submit">Remove
                                        </button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    @if(count($userContents) == 0)
                        <h1 class="title-font sm:text-2xl text-2xl mb-4 ml-10 font-medium text-gray-100">No content
                            uploaded yet! Please upload content to be able target a node</h1>
                    @else
                        <form method="POST" action="{{route('uploadContent', ['id' => $node->id])}}"
                              enctype="multipart/form-data">
                            <div class="flex items-center space-x-4 justify-start top-auto">
                                <div class="ml-10">
                                    @csrf
                                    <select name="node_content" class="w-full">
                                        @foreach($userContents as $content)
                                            <option value={{$content->id}}> {{$content->content_title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button class="m-10 bg-yellow-500 text-gray-900 px-2 py-2 rounded-md mr-2"
                                        type="submit">Post to Node
                                </button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
