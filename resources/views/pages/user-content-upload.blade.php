<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Content Uploads') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-200 bg-gray-900">
                    @component('components.display-content-form')
                    @endcomponent
                    <div class="max-w-6xl mx-auto px-20 py-5">
                        <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-5 -mt-4 ">
                            @if(count($userContent) == 0)
                                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-100">No content
                                    uploaded yet!</h1>
                            @else
                                @foreach($userContent as $content)
                                    @can('view', $content)
                                        @component('components.node-content-card')
                                            @slot('link')
                                            @endslot
                                            @slot('image')
                                                {{"/storage/images/".$content->image->filename}}
                                            @endslot
                                            @slot('title')
                                                {{$content->content_title}}
                                            @endslot
                                            @slot('contentOwner')
                                                {{"Creator: ".$content->user->email}}
                                            @endslot
                                            @slot('description')
                                                {{$content->content_description}}
                                            @endslot
                                        @endcomponent

                                        <div class="flex items-center space-x-4 justify-center mt-4">
                                            <a class="btn bg-blue-600 text-gray-200 px-2 py-2 rounded-md"
                                               href="{{route('editNodeContent', ['id'=> $content->id])}}">Edit</a>

                                            <form action="{{route('deleteNodeContent', ['id' => $content->id])}}"
                                                  method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class=" bg-red-500 text-gray-900 px-2 py-2 rounded-md mr-2"
                                                        type="submit">Delete
                                                </button>
                                            </form>
                                        </div>
                                    @endcan
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
