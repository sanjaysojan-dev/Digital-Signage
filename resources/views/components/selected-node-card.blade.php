<div class="shadow-md bg-gray-800 text-gray-200 m-8 p-6 rounded" x-data="{open: false}">
    <div class="flex items-center">
        <img class="rounded-full h-24 w-24 flex items-center justify-center"
             src="https://images.unsplash.com/photo-1611174340587-7cf535c00951?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80">

        <div class="description">
            <div class="px-8 flex flex-row items-center ">
                <h1 class="text-2xl font-semibold mr-4">{{$nodeTitle}}</h1>
                <div class="rounded-full bg-purple-600 text-gray-100 mr-3">
                    <span class="font-semibold p-3">{{$nodeMode}}</span>
                </div>

            </div>
            <p class="px-8"></p>
        </div>
        <!-- Button for opening card -->
        <div class="ml-4">
            <div @click="open = !open;"
                 class="flex items-center cursor-pointer px-3 py-2 text-gray-200 hover:text-gray-600"
                 :class="{'transform rotate-180': open}">
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </div>
        </div>
    </div>
    <!-- Collapsed content -->
    <div class="w-full flex flex-col mt-8" :class="{'hidden': !open}">
        <hr class="mb-4 border-gray-700">

        <ul class="list-disc ml-4 mt-2">
            <li> Display Owner: {{$nodeOwner}} </li>
            <li>Description: {{$nodeDescription}}</li>
            <li>Location: {{$nodeLocation}}</li>
            <a id="Link" href="{{$link}}"><li>{{$url}}</li></a>
        </ul>
    </div>


    <div class="flex justify-end">
        <button id="Report"
                class="btn bg-red-600 text-gray-200 px-2 py-2 rounded-md"
                onclick="window.location.href='{{$flag}}'"> Flag Display
        </button>
    </div>
</div>
