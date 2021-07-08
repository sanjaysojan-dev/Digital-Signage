<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('To set up your display unit, please follow these steps') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 bg-gray-900">

                    <section class="text-indigo-200 body-font p-5 bg-gray-900">
                        <div
                            class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center">
                            <div class="px-2 sm:px-4">
                                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-100">Setup
                                    Raspberry Pi OS</h1>
                                1. Follow the steps in this link to setup the Raspberry Pi OS.
                                <a href="https://www.raspberrypi.org/documentation/installation/installing-images/">https://www.raspberrypi.org/documentation/installation/installing-images/</a>

                            </div>
                        </div>
                    </section>

                    <section class="text-indigo-200 body-font pt-10 bg-gray-900">
                        <div class="mx-auto flex px-5  md:flex-row flex-col">
                            <div
                                class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center">
                                <div class="px-2 sm:px-4">

                                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-100">2. Clone
                                        Repository </h1>

                                    <p class="text-indigo-200 text-base pb-6">
                                        1. Open terminal and change directory to ‘Desktop’
                                        <br>
                                        Command to enter in terminal: cd /home/pi/Desktop
                                    </p>
                                    <p class="text-indigo-200 text-base pb-6">
                                        2. Once in the directory (folder),clone the git repository.
                                        <br>
                                        Command to enter in terminal: git clone
                                        https://github.com/sanjaysojan-dev/Raspberry-Pi-Display-Setup-Scripts.git
                                    </p>
                                    <p class="text-indigo-200 text-base pb-6">
                                        3. Once cloned the user should be able to view all the scripts in a folder
                                        called ‘Raspberry-Pi-Display-Setup-Scripts’. You now have all the scripts to set
                                        the Pi into Kiosk mode.
                                    </p>
                                </div>
                            </div>
                            <div class="lg:max-w-lg lg:w-1/2 md:w-1/2 w-5/6 sm:block hidden">
                                <img class="object-cover object-center rounded" alt="hero"
                                     src="/storage/images/pi_folder_struc.png"/>
                            </div>

                        </div>
                    </section>
                    <section class="text-indigo-200 body-font p-5 bg-gray-900">
                        <div class="mx-auto flex px-5  md:flex-row flex-col">
                            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 sm:block hidden">
                                <img class="object-cover object-center rounded" alt="hero"
                                     src="/storage/images/pi_script.png"/>
                            </div>
                            <div
                                class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center">
                                <div class="px-2 sm:px-4">
                                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-100">3: Run
                                        setup script </h1>
                                    <p class="text-indigo-200 text-base pb-6">
                                        1. If you have followed the steps above, then enter the following command: cd
                                        /home/pi/Desktop/Raspberry-Pi-Display-Setup-Scripts
                                    </p>
                                    <p class="text-indigo-200 text-base pb-6">
                                        2. Now enter the following command to install Firefox and all the required
                                        software:
                                        python launch_kiosk_config.py
                                    </p>
                                    <p class="text-indigo-200 text-base pb-6">

                                        3. The script will prompt you to enter the number of the node you want to
                                        display. Enter the numerical number and the script will copy the necessary files
                                        to the appropriate directories. The Pi will then reboot and enter into Kiosk
                                        Mode.

                                    </p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <p class="text-indigo-200 text-base pb-6">
                        A message will be shown if the Pi reboots with no internet connection. If the Pi is offline,
                        then the image slider will not be shown. Please reconnect the Pi to the internet and reboot. The
                        Pi will enter back into Kiosk mode once connected.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
