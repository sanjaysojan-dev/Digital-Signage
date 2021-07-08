<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('To manage your display node, please follow these steps') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 bg-gray-900">
                    <!-- component -->
                    <section class="text-indigo-200 body-font p-5 pb-10 bg-gray-900">
                        <div class="mx-auto flex px-5  md:flex-row flex-col">
                            <div class="lg:max-w-lg lg:w-11/12 md:w-1/2 w-5/6 sm:block hidden">
                                <img class="object-cover object-center rounded" alt="hero"
                                     src="/storage/images/node_content_view.png"/>
                            </div>
                            <div
                                class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center">
                                <div class="px-2 sm:px-4">
                                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-100">1. View
                                        all Nodes</h1>
                                    <p class="text-indigo-200 text-base pb-6">
                                        All deployed nodes can be found on 'All Display Nodes' page.
                                    </p>
                                    <p class="text-indigo-200 text-base pb-6">
                                        1: Click the node card to view the node details.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="text-indigo-200 body-font pt-20 pb-20 bg-gray-900">
                        <div class="mx-auto flex px-5  md:flex-row flex-col">
                            <div
                                class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center">
                                <div class="px-2 sm:px-4">
                                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-100">2. View
                                        Node Details</h1>
                                    <p class="text-indigo-200 text-base pb-6">
                                        1: Click the arrow element to show the hidden information, which include node
                                        ID, title, description, and the link to the image slider.
                                    </p>
                                    <p class="text-indigo-200 text-base pb-6">
                                        2: Click the ‘display_test.test/image/imageslider/’ to view the image slider of
                                        the node. If content has not been uploaded then the user will be redirected back
                                        the selected node page.
                                    </p>
                                </div>
                            </div>
                            <div class="pr-4 lg:max-w-lg lg:w-4/12 md:w-1/2 w-5/6 sm:block hidden">
                                <img class="object-cover object-center rounded" alt="hero"
                                     src="/storage/images/node_content_arrow.png"/>
                            </div>
                            <div class="lg:max-w-lg lg:w-4/12 md:w-1/2 w-5/6 sm:block hidden">
                                <img class="object-cover object-center rounded" alt="hero"
                                     src="/storage/images/node_content_info.png"/>
                            </div>
                        </div>
                    </section>

                    <section class="text-indigo-200 body-font p-5 bg-gray-900">
                        <div class="mx-auto flex px-5  md:flex-row flex-col">
                            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 sm:block hidden">
                                <img class="object-cover object-center rounded" alt="hero"
                                     src="/storage/images/node_content_content.png"/>
                            </div>
                            <div
                                class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center">
                                <div class="px-2 sm:px-4">
                                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-100">3. View
                                        Uploaded Content </h1>
                                    <p class="text-indigo-200 text-base pb-6">
                                        1: If the logged in user is the node owner of the selected node, then the user
                                        will be able to view all content that has been uploaded to the node. However, if
                                        the user is not the owner of the node, then the user will only be able view
                                        content that they have uploaded to the node.
                                    </p>
                                    <p class="text-indigo-200 text-base pb-6">
                                        2: To upload content, select a content from the drop-down box and click the
                                        ‘Post
                                        to Node’ button. An automatic email to the display owner will be sent informing
                                        them of the action. You can click on the card to view the image fully. Remember
                                        the display owner will be able to view the content you upload. If it is deemed
                                        inappropriate, the content might be removed by the display owner.
                                    </p>
                                    <p class="text-indigo-200 text-base pb-6">
                                        3: Click the ‘Remove’ button to remove the uploaded content from the node. An
                                        email automatic email will be sent to the display owner informing them of the
                                        action.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </section>


                    <section class="text-indigo-200 body-font pt-10 pb-10 bg-gray-900">
                        <div class="mx-auto flex px-5  md:flex-row flex-col">
                            <div
                                class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center">
                                <div class="px-2 sm:px-4">
                                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-100">4. Flag
                                        Display</h1>
                                    <p class="text-indigo-200 text-base pb-6">
                                        1: The user can click the ‘Flag Display’ button to inform the display owner that
                                        there is inappropriate content uploaded to the display node.
                                    </p>
                                </div>
                            </div>
                            <div class="pr-4 lg:max-w-lg lg:w-1/2 md:w-1/2 w-5/6 sm:block hidden">
                                <img class="object-cover object-center rounded" alt="hero"
                                     src="/storage/images/node_content_flag.png"/>
                            </div>
                        </div>
                    </section>


                    <p class="text-indigo-200 text-base pb-6">
                        When creating a node, node owners will be able to view all content that is uploaded to the node.
                        The node owner can remove any nodes that they deem inappropriate or out of date. An email
                        notification will be sent to the content owner when doing so. Additionally, content owners that
                        are not node owners, can remove their content. Content owners will only be able to remove their
                        uploaded content and will not be able to remove any others that are not theirs.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
