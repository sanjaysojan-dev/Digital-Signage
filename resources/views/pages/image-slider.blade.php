<style type="text/css">
    * {
        margin: 0;
        padding: 0;
        overflow: hidden;
    }

    body {
        height: 100vh;
    }

    #slider {
        overflow: hidden;
        height: 100%;
    }

    #slider figure {
        position: relative;
        height: 100vh;
        width: 100%;
        margin: 0;
        left: 0;
    }

    #slider figure img {
        width: 100%;
        height: 100vh;
        float: left;
    }

</style>


<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.15/jquery.bxslider.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.15/jquery.bxslider.min.css" rel="stylesheet"/>


<div id="slider" class="bxslider flex justify-center h-screen w-screen">
    @foreach($allNodeContent as $content)
        <figure>
            <div class="flex justify-center h-screen w-screen">
                <li>
                    <img class="object-fill shadow-xl rounded pb-5/6"
                         src="/storage/images/{{$content->image->filename}}"
                         alt="bag">
                </li>
            </div>
        </figure>
    @endforeach
</div>

<script>
    setInterval("refresh_page();",10000);

    function refresh_page(){
        window.location = location.href;
    }
     $('.bxslider').bxSlider({
        auto: true,
        autoStart: true,
         randomStart: true,
        pager: false,
        pause: 2000,
        controls: false,
        captions: false,
        userCSS: true,
        wrapperClass: false
    });
</script>








