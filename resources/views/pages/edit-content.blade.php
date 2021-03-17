<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Content Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 bg-gray-900">
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
            </div>
        </div>
    </div>
</x-app-layout>
