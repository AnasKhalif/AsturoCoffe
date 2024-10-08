<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel + Tailwind</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;400;600;800&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body>
    <header class="flex justify-between px-5 lg:px-14 h-[10vh] align-middle items-center bg-white border-b-0 top-0">
        <img width="150" src="{{ asset('images/logo.png') }}" alt="">
        <nav class="items-center h-full align-middle gap-10 lg:flex hidden">
            <div>
                <a href="" aria-current="page" class="border-b-2 border-black">Home</a>
            </div>
            <div>
                <a href=""
                    class="border-b-2 hover:border-black border-transparent transition-all ease-out duration-300">About</a>
            </div>
            <div>
                <a href=""
                    class="border-b-2 hover:border-black border-transparent transition-all ease-out duration-300">Services</a>
            </div>
            <div>
                <a href=""
                    class="border-b-2 hover:border-black border-transparent transition-all ease-out duration-300">Contact</a>
            </div>
        </nav>
        <div class="lg:flex items-center hidden">
            <a href="" class="flex items-center justify-center w-8 h-8 " target="blank">
                <img src="/icon/instagram.svg" alt="instagram">
            </a>
        </div>
    </header>

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
                <a class=" font-plus-jakarta bg-[#cfc7be] text-white px-5 py-2 rounded-full mt-5 text-sm"
                    href="/services">
                    See Services
                </a>
            </div>
        </div>
    </section>

</body>

</html>
