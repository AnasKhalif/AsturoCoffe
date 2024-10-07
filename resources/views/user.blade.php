<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel + Tailwind</title>
    @vite('resources/css/app.css')
</head>

<body>
    <header class="flex justify-between px-5 lg:px-14 h-[10vh] align-middle items-center bg-white border-b-0 top-0">
        <img width="150" src="{{ asset('images/logo.png') }}" alt="">
        <nav class="items-center h-full align-middle gap-10 lg:flex">
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
</body>

</html>
