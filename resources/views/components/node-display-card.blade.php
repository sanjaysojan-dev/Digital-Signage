<link href="https://unpkg.com/pattern.css" rel="stylesheet">

<div class="p-10 md:w-1/3 md:mb-0 mb-6 flex flex-col ">
    <a href="{{$link}}">
        <div class="pattern-dots-md gray-light">
            <div class="rounded bg-gray-800 p-4 transform translate-x-6 -translate-y-6  ">
                <div class="flex-grow ">
                    <h2 class=" text-xl title-font font-medium mb-3">{{$nodeTitle}}</h2>
                    <h2 class=" text-xl title-font font-medium mb-3">Location: {{$nodeLocation}}</h2>
                    <p class="leading-relaxed text-sm text-justify">{{$nodeDescription}}</p>
                </div>
            </div>
        </div>
    </a>
</div>

