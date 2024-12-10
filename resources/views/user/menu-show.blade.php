@extends('core.app')

@section('title')
    Checkout
@endsection

@section('content')
    <div class="mt-5 bg-cover bg-center bg-no-repeat">
        <div class="container mx-auto px-4">
            <div class="flex flex-col items-center space-y-8">

                <div class="text-2xl font-bold text-center">
                    CHECKOUT
                </div>

                <div>
                    <img src="{{ asset('images/ourmenu.png') }}" alt="Our Menu" class="w-full max-w-lg" />
                </div>

                <!-- Detail Menu -->
                <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-6">
                    <div class="flex items-center space-x-4">
                        <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}"
                            class="w-24 h-24 rounded-lg">
                        <div>
                            <h2 class="text-lg font-bold">{{ $menu->name }}</h2>
                            <p class="text-gray-600">{{ $menu->description }}</p>
                            <div class="text-green-500 font-bold mt-2">Rp {{ number_format($menu->price, 0, ',', '.') }}
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center mt-4">
                        <button id="decrease" class="bg-gray-300 text-black px-3 py-1 rounded-l">-</button>
                        <input type="text" id="quantity" value="1" class="w-12 text-center border" readonly>
                        <button id="increase" class="bg-gray-300 text-black px-3 py-1 rounded-r">+</button>
                    </div>

                    <div class="mt-4">
                        <span>Total:</span>
                        <strong id="total-price" class="text-green-500">
                            Rp {{ number_format($menu->price, 0, ',', '.') }}
                        </strong>
                    </div>

                    <button id="pay-button" class="mt-6 bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">
                        Checkout
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('services.midtrans.clientKey') }}"></script>

    <script>
        const price = {{ $menu->price }};
        let quantity = 1;

        const quantityInput = document.getElementById('quantity');
        const totalPrice = document.getElementById('total-price');
        const payButton = document.getElementById('pay-button');

        document.getElementById('increase').addEventListener('click', () => {
            quantity++;
            quantityInput.value = quantity;
            totalPrice.textContent = `Rp ${new Intl.NumberFormat('id-ID').format(price * quantity)}`;
        });

        document.getElementById('decrease').addEventListener('click', () => {
            if (quantity > 1) {
                quantity--;
                quantityInput.value = quantity;
                totalPrice.textContent = `Rp ${new Intl.NumberFormat('id-ID').format(price * quantity)}`;
            }
        });
        payButton.addEventListener('click', function(e) {
            e.preventDefault();

            fetch('/menu/payment', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        menu_id: {{ $menu->id }},
                        quantity: quantity
                    })
                })
                .then(response => {
                    // Log the response to see if it's HTML or JSON
                    return response.text().then(text => {
                        console.log('Response:', text);
                        try {
                            return JSON.parse(text); // Attempt to parse the response as JSON
                        } catch (e) {
                            throw new Error('Invalid JSON response');
                        }
                    });
                })
                .then(data => {
                    if (data.snap_token) {
                        snap.pay(data.snap_token, {
                            onSuccess: function(result) {
                                alert('Pembayaran berhasil!');
                                console.log(result);
                            },
                            onPending: function(result) {
                                alert('Menunggu pembayaran!');
                                console.log(result);
                            },
                            onError: function(result) {
                                alert('Pembayaran gagal!');
                                console.log(result);
                            }
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    </script>
@endsection
