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
                    <section class="text-indigo-200 body-font p-5 bg-gray-900">
                        <div class="mx-auto flex px-5  md:flex-row flex-col">
                            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 sm:block hidden">
                                <img class="object-cover object-center rounded" alt="hero"
                                     src="/storage/images/node_creation_input.png"/>
                            </div>
                            <div
                                class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center">
                                <div class="px-2 sm:px-4">
                                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-100">1. Node
                                        Creation</h1>
                                    <p class="text-indigo-200 text-base pb-6">
                                        Found on 'My Display Nodes' Page.
                                    </p>
                                    <p class="text-indigo-200 text-base pb-6">
                                        1: Enter all relevant fields in the input box, including title, location of node
                                        and description. It is important to include metadata of the display that you are
                                        using to ensure users can upload appropriate content for your node.
                                    </p>
                                    <p class="text-indigo-200 text-base pb-6">
                                        2: Click the ‘CREATE’ button to create your display node.
                                    </p>
                                    <p class="text-indigo-200 text-base pb-6">
                                        3: The display node will now appear on the page.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="text-indigo-200 body-font pt-10 bg-gray-900">
                        <div class="mx-auto flex px-5  md:flex-row flex-col">
                            <div
                                class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center">
                                <div class="px-2 sm:px-4">

                                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-100">2. Edit
                                        Node</h1>
                                    <p class="text-indigo-200 text-base pb-6">
                                        Found on 'My Display Nodes' Page.
                                    </p>
                                    <p class="text-indigo-200 text-base pb-6">
                                        1: Click the ‘Edit’ button to navigate to the update page.
                                    </p>
                                    <p class="text-indigo-200 text-base pb-6">
                                        2: This page will have the input fields with the node information.
                                    </p>
                                    <p class="text-indigo-200 text-base pb-6">
                                        3: Correct information in the fields.
                                    </p>
                                    <p class="text-indigo-200 text-base pb-6">
                                        4: Click the ‘UPDATE’ button to return to the user
                                        display page with the node information updated. A session header message will
                                        appear confirming the changes.
                                    </p>
                                </div>
                            </div>
                            <div class="lg:max-w-lg lg:w-1/2 md:w-1/2 w-5/6 sm:block hidden">
                                <img class="object-cover object-center rounded" alt="hero"
                                     src="/storage/images/node_edit.png"/>
                            </div>
                            <div class="lg:max-w-lg lg:w-1/2 md:w-1/2 w-5/6 sm:block hidden">
                                <img class="object-cover object-center rounded" alt="hero"
                                     src="/storage/images/node_update.png"/>
                            </div>
                        </div>
                    </section>

                    <section class="text-indigo-200 body-font p-5 bg-gray-900">
                        <div class="mx-auto flex px-5  md:flex-row flex-col">
                            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 sm:block hidden">
                                <img class="object-cover object-center rounded" alt="hero"
                                     src="/storage/images/node_edit.png"/>
                            </div>
                            <div
                                class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center">
                                <div class="px-2 sm:px-4">
                                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-100">3. Node
                                        Deletion</h1>
                                    <p class="text-indigo-200 text-base pb-6">
                                        Found on 'My Display Nodes' Page.
                                    </p>
                                    <p class="text-indigo-200 text-base pb-6">
                                        1: Click the ‘Delete’ button to remove the display node completely. A session
                                        header will appear confirming the deletion.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
