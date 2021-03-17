<!-- component -->
<div class="nodeEditForm">
    <form class="max-w-xl m-4 p-10 bg-white rounded shadow-xl" method="POST" action=""
          enctype="multipart/form-data">
        @csrf

        <div class="mt-2">
            <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" type="text" name="node_title"
                   placeholder="Node Title" required value="{{$title}}">
        </div>
        <span class="text-l text-blue-600 pb-4">~ Enter Node Title</span>

        <div class="mt-2">
            <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" type="text" name="node_location"
                   placeholder="Node Location" required value="{{$location}}">
        </div>

        <span class="text-l text-blue-600 pb-4">~ Enter Location </span>

        <div class="mt-2">
            <textarea
                class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
                name="node_description"
                placeholder='Description' required>{{$description}}</textarea>
        </div>

        <span class="text-l text-blue-600 pb-4">~ Enter Description </span>

        {{$slot}}

        <div class="mt-2">
            <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">POST
            </button>
        </div>
    </form>
</div>
