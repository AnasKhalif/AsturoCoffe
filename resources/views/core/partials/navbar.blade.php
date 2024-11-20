<header class="flex justify-between px-5 lg:px-14 h-[10vh] align-middle items-center bg-white border-b-0 top-0 sticky">
    <img width="150" src="{{ asset('images/logo.png') }}" alt="">
    <nav class="items-center h-full align-middle gap-10 lg:flex hidden">
        <div>
            <a href="{{ route('home') }}" aria-current="page"
                class="border-b-2 {{ request()->is('/') ? 'border-black' : 'border-transparent' }}">Home</a>
        </div>
        <div>
            <a href=""
                class="border-b-2 hover:border-black {{ request()->is('about') ? 'border-black' : 'border-transparent' }} transition-all ease-out duration-300">About</a>
        </div>
        <div>
            <a href=""
                class="border-b-2 hover:border-black {{ request()->is('menu') ? 'border-black' : 'border-transparent' }} transition-all ease-out duration-300">Menu</a>
        </div>
        <div>
            <a href="{{ route('contact') }}"
                class="border-b-2 hover:border-black {{ request()->is('contact') ? 'border-black' : 'border-transparent' }} transition-all ease-out duration-300">Contact</a>
        </div>
    </nav>
    <div class="lg:flex items-center hidden">
        <a href="" class="flex items-center justify-center w-8 h-8 " target="blank">
            <img src="/icon/instagram.svg" alt="instagram">
        </a>
    </div>
</header>
