@extends('core.app')

@section('title')
    About Asturo Coffe
@endsection

@section('content')
    <div class="mt-5 bg-cover bg-center bg-no-repeat">
        <div class="container mx-auto px-4">
            <div class="flex flex-col items-center space-y-8">

                <div>
                    <img src="{{ asset('images/frame.png') }}" alt="Menu Banner" class="w-full max-w-screen-2xl" />
                </div>

                <div class="text-2xl font-bold text-center">
                    MENU
                </div>

                <div>
                    <img src="{{ asset('images/ourmenu.png') }}" alt="Our Menu" class="w-full max-w-lg" />
                </div>
            </div>
        </div>
    </div>
    <main id="app" class="text-[16px] menu-page-api" data-v-app="">
        <div class="w-full max-w-[1353px] mx-auto px-[14px] md:px-8">

            <div class="flex mt-10 md:mt-[60px] flex-col md:flex-row">
                <div class="md:w-[230px] sticky-element">
                    <div id="stickySet">
                        <ul class="overflow-auto flex whitespace-nowrap md:whitespace-normal flex-row md:flex-col md:space-y-8 items-end border-b b-[#EAEAEA] md:border-b-0 pb-4 md:pb-0 mb-4 md:mb-0"
                            id="sideBar">
                            @foreach ($series as $seri)
                                <li class="mr-4 md:mr-0 text-right">
                                    <a href="#{{ $seri->name }}"
                                        class="text-[14px] md:text-[24px] font-semibold hover:text-[#00885C] cursor-pointer text-[#1E4A3C]">
                                        <span>{{ $seri->name }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="md:flex-1 md:pl-[80px] space-y-[50px]">

                    <div>
                        <h2 class="uppercase text-[#222126] text-[14px] md:text-[32px] font-extrabold mb-7 md:mb-[18px]"
                            id="AMERICANOSERIES">Americano Series</h2>
                        <div class="grid gap-5 md:gap-6 grid-cols-1 md:grid-cols-2">
                            @foreach ($menus as $menu)
                                <div class="flex md:border md:rounded-lg md:py-4 md:px-6">
                                    <div class="w-[92px] md:w-[172px] cursor-pointer" data-toggle=" modal"
                                        data-target="#exampleModal">
                                        <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}"
                                            class="w-full rounded-lg">
                                    </div>
                                    <div class="flex-1 pl-[15px] md:pl-[30px] space-y-1 md:space-y-2">
                                        <strong
                                            class="text-[#222126] text-[14px] md:text-[20px] font-semibold cursor-pointer"
                                            data-toggle="modal" data-target="#exampleModal">
                                            {{ $menu->name }}
                                        </strong>
                                        <div class="flex text-[#A24B31] font-bold space-x-1">
                                            <span class="text-[9px] md:text-[13px]">Rp</span>
                                            <span class="text-[13px] md:text-[18px]">{{ $menu->price }}</span>
                                        </div>
                                        <p class="mb-0 text-[#828282] font-medium text-[11px] md:text-[12px]">
                                            {{ $menu->description }}.
                                        </p>
                                        <a href="{{ route('menu.show', $menu->id) }}"
                                            class="bg-[#00885C] text-white font-semibold px-4 py-2 rounded-lg hover:bg-[#006f4c] mt-4 inline-block">
                                            Detail
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endsection
