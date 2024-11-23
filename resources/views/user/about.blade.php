@extends('core.app')

@section('title')
    About Asturo Coffe
@endsection

@section('content')
    <div class="flex flex-wrap w-full lg:mt-12">

        <div class="w-full sm:w-1/2 flex justify-center items-center">
            <img src="{{ asset('images/ourstory.png') }}" alt="Our Story" class="max-w-full h-auto" />
        </div>

        <div class="w-full sm:w-1/2 px-6 flex flex-col justify-center space-y-4">

            <div class="flex items-center space-x-4">
                <div class="w-9 h-0.5 bg-gray-400"></div>
                <div class="text-2xl font-semibold">About <strong>Asturo</strong></div>
            </div>

            <div class="text-5xl font-bold text-left">Our Story</div>

            <div class="text-gray-700 text-base text-2xl">
                Get to know about us, stores, environment, and people behind it!
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 lg:mt-12">
        <div class="flex flex-wrap items-center">

            <div class="w-full sm:w-1/2 px-4 mb-6 sm:mb-0">

                <div class="flex items-center space-x-4">
                    <img src="https://fore.coffee/wp-content/uploads/2023/07/Rectangle-36.png" alt="Decorative line"
                        class="w-9 h-0.5" />
                    <div class="text-2xl font-semibold">Our <strong>Story</strong></div>
                </div>

                <div class="text-5xl font-bold mt-4 text-left">Grind The Essentials</div>
            </div>


            <div class="w-full sm:w-1/2 px-4 space-y-4">

                <p class="text-gray-700 text-base text-2xl">
                    In a fast-paced world it is easy to lose sight of what truly matters. Asturo provides a place of solace
                    where
                    people can simply slow down and enjoy a high-quality cup of coffee. This philosophy is reflected within
                    our tagline.
                </p>

                <p class="text-gray-700 text-base text-2xl">
                    By utilizing the word ‘Grind’ which has a double meaning: ‘Grind’ as in the day-to-day hustle that
                    people go through,
                    and ‘Grind’ as a key step in the coffee making process, As turoinspires people to embrace life’s
                    essentials in the
                    midst of their busy lifestyles through each cup of coffee we serve.
                </p>
            </div>
        </div>
    </div>
@endsection
