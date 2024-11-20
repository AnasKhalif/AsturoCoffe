@extends('core.app')

@section('title')
    Contact Asturo Coffe
@endsection

@section('content')
    <section>
        <div><iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126438.33876397018!2d112.54938048525975!3d-7.978467194606787!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd62822063dc2fb%3A0x78879446481a4da2!2sMalang%2C%20Kota%20Malang%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1714880747991!5m2!1sid!2sid"
                width="600" height="45" class="w-full h-96 filter brightness-75" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe></div>
    </section>

    <section class="mx-5 lg:mx-14 flex flex-col-reverse gap-10 lg:gap-20 lg:flex-row justify-between mt-5 lg:mt-10">
        <div class="lg:w-1/2 w-full">
            <h1 class="font-bold text-xl">Contact Us</h1>
            <p class="text-sm">Apapun kebutuhan bisnis Anda, silakan hubungi kami. Kami selalu siap menjawab pertanyaan dan
                memberikan solusi untuk Anda.</p>
            <div>
                <h1 class="font-bold text-xl mt-5 lg:mt-10">Alamat</h1>
                <p class="text-sm">Kota Malang, Jawa Timur, Indonesia</p>
            </div>
            <div>
                <h1 class="font-bold text-xl mt-5 lg:mt-10">No Telpon</h1>
                <p class="text-sm">0829-1292-0876</p>
            </div>
        </div>
        <form name="form-contact" class="lg:w-1/2 w-full flex flex-col lg:justify-end lg:align-bottom" target="blank"
            autocomplete="off">
            <div class="flex flex-col lg:flex-row lg:gap-10 w-full justify-between"><input type="hidden" name="timestamp"
                    value="1732061974224">
                <div class="font-bold lg:w-full"><input type="text" name="name" id="name"
                        class="font-medium outline-none text-sm border-b w-full py-4 focus:border-black transition duration-300 ease-in mb-3 valid:border-green-500"
                        placeholder="Nama Anda" required="" autocomplete="off" value=""></div>
                <div class="font-bold lg:w-full"><input type="email" name="email" id="email"
                        class="font-medium outline-none text-sm border-b w-full py-4 focus:border-black transition duration-300 ease-in mb-3 valid:border-green-500"
                        placeholder="Email Anda" required="" value=""></div>
            </div>
            <div><input type="tel" name="phone" id="tel"
                    class="font-medium outline-none text-sm border-b w-full py-4 focus:border-black transition duration-300 ease-in mb-3 valid:border-green-500"
                    placeholder="No Telepon" required="" value=""></div>
            <textarea name="message" id="message" cols="5" rows="1"
                class="font-medium outline-none text-sm border-b w-full py-4 focus:border-black transition duration-300 ease-in mb-3 valid:border-green-500"
                placeholder="Pesan" required=""></textarea>
            </div>
            <div><button type="submit" name="send" id="send"
                    class="w-full bg-black text-white py-3 font-bold rounded-full text-sm mt-3">Kirim</button></div>
        </form>
    </section>
@endsection
