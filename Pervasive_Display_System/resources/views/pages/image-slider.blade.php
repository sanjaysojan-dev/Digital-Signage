<style type="text/css">
    #slider {
        overflow: hidden;
    }

    #slider figure {
        position: relative;
        width: 200%;
        margin: 0;
        left: 0;
        animation: 5s slider infinite;
    }

    #slider figure img {
        width: 50%;
        height: 100%;
        float: left;
    }

</style>


<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<script>
    var cont = 0;

    function loopSlider() {
        var xx = setInterval(function () {
            switch (cont) {
                case 0: {
                    $("#slider-1").fadeOut(400);
                    $("#slider-2").delay(400).fadeIn(400);
                    $("#sButton1").removeClass("bg-purple-800");
                    $("#sButton2").addClass("bg-purple-800");
                    cont = 1;

                    break;
                }
                case 1: {

                    $("#slider-2").fadeOut(400);
                    $("#slider-1").delay(400).fadeIn(400);
                    $("#sButton2").removeClass("bg-purple-800");
                    $("#sButton1").addClass("bg-purple-800");
                    cont = 0;
                    break;
                }
            }
        }, 5000);

    }

    function reinitLoop(time) {
        clearInterval(xx);
        setTimeout(loopSlider(), time);
    }

    $(window).ready(function () {
        $("#slider-2").hide();
        $("#sButton1").addClass("bg-purple-800");

        loopSlider();
    });

</script>


<div id="slider" class="sliderAx">

    <figure>
        <div id="slider-1" class="container">
            <div class="flex justify-center h-screen w-screen">
                <img class="object-fill shadow-xl rounded pb-5/6"
                     src="https://images.unsplash.com/photo-1578671815798-7b9b0ab22d73?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80"
                     alt="bag">
            </div>
        </div>

        <div id="slider-2" class="container mx-auto">
            <div class=" flex justify-center h-screen w-screen">
                <img class="object-fill shadow-xl rounded pb-5/6"
                     src="https://images.unsplash.com/photo-1544427920-c49ccfb85579?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1422&q=80"
                     alt="bag">
            </div>
        </div>

    </figure>
</div>






