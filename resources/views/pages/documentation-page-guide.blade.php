<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Documentation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 bg-gray-900">
                    <!-- component -->

                    <section class="text-indigo-200 body-font p-5 bg-gray-900">
                        <div class="mx-auto flex px-5  md:flex-row flex-col items-center jobcard">
                            <!--YouTube Video Section-->
                            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 sm:block hidden">
                                <iframe width="500" height="400"
                                        src="https://www.youtube.com/embed/uHX0TWrUP_g">
                                </iframe>
                            </div>
                            <div
                                class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center">
                                <div class="pt-10 px-2 sm:px-6">
                                    <a href="{{route('nodeGuide')}}"><h1
                                            class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-100">Node
                                            Management</h1></a>
                                    <p class="text-indigo-200 text-base pb-6">Click on the link to find the step by step
                                        guid in managing your display node or play the YoutTube video to watch the setup
                                        by setup guide of managing a display node.</p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="text-indigo-200 body-font p-5 bg-gray-900">
                        <div class="mx-auto flex px-5  md:flex-row flex-col items-center jobcard">

                            <!--YouTube Video Section-->
                            <div
                                class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center">
                                <div class="pt-10 px-2 sm:px-6">
                                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-100">2:
                                        Content Management</h1>
                                    <p class="text-indigo-200 text-base pb-6">From local banks to local government, we
                                        partner with organizations on their journey to digital transformation. Our
                                        customers include 15 million professionals in 175 countries and 800 of the
                                        fortune 1000.</p>
                                </div>
                            </div>

                            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 sm:block hidden">
                                <iframe width="500" height="400"
                                        src="https://www.youtube.com/embed/uHX0TWrUP_g">
                                </iframe>
                            </div>
                        </div>
                    </section>


                    <section class="text-indigo-200 body-font p-5 bg-gray-900">
                        <div class="mx-auto flex px-5  md:flex-row flex-col items-center jobcard">

                            <!--YouTube Video Section-->
                            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 sm:block hidden">
                                <iframe width="500" height="400"
                                        src="https://www.youtube.com/embed/uHX0TWrUP_g">
                                </iframe>

                            </div>

                            <div
                                class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center">
                                <div class="pt-10 px-2 sm:px-6">
                                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-100">3:
                                        Raspberry Pi Setup</h1>
                                    <p class="text-indigo-200 text-base pb-6">From local banks to local government, we
                                        partner with organizations on their journey to digital transformation. Our
                                        customers include 15 million professionals in 175 countries and 800 of the
                                        fortune 1000.</p>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
