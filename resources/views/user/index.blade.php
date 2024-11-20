@extends('core.app')

@section('title')
    Asturo Coffe
@endsection

@section('content')
    <section
        style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url({{ asset('images/asturo_home.jpg') }})"
        class="flex flex-col lg:flex-row h-[90vh] w-full lg:h-screen bg-cover bg-center items-center lg:px-14 lg:gap-10 align-middle justify-center lg:justify-start">
        <div class="m-5 lg:m-0">
            <h1 class="text-white font-bold font-nakilla text-5xl lg:text-6xl lg:w-6/12">Discover the Universe of Coffee
                in Every Sip!
            </h1>
            <p class="font-plus-jakarta text-[14px] text-white text-sm mt-3 lg:w-7/12">Nikmati aroma dan cita rasa kaya
                yang mencerminkan keindahan galaksi. Dari kopi pahit yang kaya hingga campuran lembut, setiap seruput
                dirancang untuk membangkitkan indera Anda dan mengangkat semangat.
                Terletak di Kediri, Asturo Coffee menawarkan suasana yang estetik dan nyaman, menjadikannya tempat
                yang sempurna untuk bersantai sambil menikmati kopi berkualitas. Bergabunglah bersama kami
                dan jelajahi keajaiban rasa kopi yang siap mengantarkan Anda pada petualangan antar bintang yang tiada
                tara!.</p>
            <div class="flex">
                <a class=" font-plus-jakarta bg-[#cfc7be] text-white px-5 py-2 rounded-full mt-5 text-sm" href="/services">
                    See Menu
                </a>
            </div>
        </div>
    </section>


    <section class="h-[80px]" style="background-image: url({{ asset('images/our-story.png') }});">
        <div class="relative h-14">
            <h1
                class="lg:mt-[80px] lg:items-center absolute inset-0 flex items-center justify-center lg:justify-center font-nakilla font-bold text-5xl lg:text-6xl text-green-900 z-10">
                Our Story
            </h1>
        </div>
    </section>

    <section class="mx-6 my-10 lg:my-16 lg:mx-28 bg-white">
        <div class="flex flex-col lg:flex-row gap-5 align-middle items-center mt-6">
            <div class="relative w-full flex justify-center">
                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/60 to-white/100 rounded-lg">
                </div>
                <img width="450" class="h-[400px] rounded-lg object-cover" src="{{ asset('images/asturo_story.jpg') }}"
                    alt="">
            </div>

            <div class="w-full flex justify-center">
                <p class="text-justify font-plus-jakarta text-lg">
                    Established in 2018, Asturo Coffee is a passionate coffee startups aiming to brew the best specialty
                    coffee for our customer. As our name derived from the word forest, we aim to grow fast, strong, tall
                    and bring life to our surrounding. We want our existence to increase coffee quality for our
                    community.
                    <br><br><br>
                    Leveraging network and experience, we are using the latest tech for our tools and bean blend.
                    Directly from the selected farmer, high-quality beans are processed and roasted to perfection by
                    ourselves then passed on to our skilled barista, excitedly prepare the cup of happiness to be served
                    to you especially.
                </p>
            </div>
        </div>
        <div class="flex justify-center lg:justify-center mt-5 lg:mt-14">
            <a href="#" class="bg-green-800 px-10 py-4 rounded-full font-full-jakarta text-md text-white">Read
                More</a>
        </div>
    </section>

    <section class="flex flex-col bg-cover lg:px-14 lg:py-16 bg-center "
        style="background-image: url({{ asset('images/bg-top.png') }});">
        <div class="flex flex-col lg:flex-row lg:justify-evenly lg:my-14 align-middle items-center">
            <h1 class="mt-4 lg:mt-0 text-4xl lg:text-6xl font-plus-jakarta font-semibold text-green-800">Asturo Galery
            </h1>
            <h2 class="font-plus-jakarta text-1xl lg:text-2xl py-2 text-center text-black">Get the latest updates and
                <br> more
                coffee
                experience
                from us!
            </h2>
        </div>
        <div class="m-6 grid grid-cols-6 gap-6 lg:items-center lg:mx-40">
            <img class="w-full col-span-6 rounded-lg" src="{{ asset('images/foto_one.jpeg') }}" alt="">
            <img class="w-full col-span-6 lg:col-span-3 rounded-lg" src="{{ asset('images/foto_two.jpg') }}" alt="">
            <img class="w-full col-span-6 lg:col-span-3 rounded-lg" src="{{ asset('images/foto_three.jpg') }}"
                alt="">
        </div>
    </section>
@endsection
