<x-app-layout>
    <style>
        #container {

            display: table;
            width: 100%;
            height: auto;
            background: #111827;


        }

        #container > div {

            display: table-cell;
            padding: 1em;
            word-wrap: break-word;
            height: 450px;
            width: 50%;
            float: left;

        }

        #container > div:nth-child(2) {
            width: 50%;
            padding-right: 50px;
            padding-bottom: 35px;

        }
    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Content Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 bg-gray-900">
                    <div id="container">
                        <div>
                            @csrf
                            @component('components.content-edit-form')
                                @slot('link')
                                    {{route('updateNodeContent', ['id' => $content->id])}}
                                @endslot
                                @slot('title')
                                    {{$content->content_title}}
                                @endslot
                                @slot('description')
                                    {{$content->content_description}}
                                @endslot
                            @endcomponent
                        </div>
                        <div>
                            <img class="h-full w-full m-4  object-cover shadow rounded "
                                 src="{{"/storage/images/".$content->image->filename}}" alt="content_image">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
