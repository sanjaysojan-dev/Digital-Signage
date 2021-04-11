<!-- component -->
<div class="contentCreationForm">
    <form class="max-w-xl m-4 p-10 bg-white rounded shadow-xl" method="POST" action="{{route('storeContent')}}"
          enctype="multipart/form-data">
        @csrf

        <div class="mt-2">
            <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" type="text" name="content_title"
                   placeholder="Title" required>
        </div>

        <span class="text-l text-blue-600 pb-4">~ Enter Image Title</span>

        <div class="mt-2">
            <textarea
                class="bg-gray-100 text-gray-700 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-500 focus:outline-none focus:bg-white"
                name="content_description"
                placeholder='Type Image Description' required></textarea>
        </div>

        <div class="mt-2">
            {{$slot}}
        </div>

        <span class="text-l text-blue-600 pb-4">~ Enter Image Description</span>

        <p class="mt-4 text-gray-800 font-medium">Upload Post Image ~ Max Image Size: 2MB </p>

        <div class="mt-2 text-gray-500">
            <input type="file" name="image_upload" placeholder="Upload Image" required>
        </div>

        <div class="mt-2">
            <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">UPLOAD
            </button>
        </div>
    </form>
</div>
