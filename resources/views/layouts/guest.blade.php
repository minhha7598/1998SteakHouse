<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>

<body>
    <div class="bg-back" x-data="{ isOpen: false }">
        <nav class="container px-6 py-8 mx-auto md:flex md:justify-between md:items-center text-white">
            <div class="flex items-center justify-between">
                <a class="text-2xl font-bold font-mono" href="/">
                    1998 SteakHouse
                </a>
                <!-- Mobile menu button -->
                <div @click="isOpen = !isOpen" class="flex md:hidden">
                    <button type="button"
                        class="text-gray-800 hover:text-gray-400 focus:outline-none focus:text-gray-400"
                        aria-label="toggle menu">
                        <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                            <path fill-rule="evenodd"
                                d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>

            <div :class="isOpen ? 'flex' : 'hidden'"
                class="flex-col mt-8 space-y-4 md:flex md:space-y-0 md:flex-row md:items-center md:space-x-10 md:mt-0 text-xl antialiased">
                <a class=" hover:underline" href="{{ route('categories.index') }}">Categories</a>
                <a class="hover:underline" href="{{ route('menus.index') }}">Menu</a>

                <a class="hover:underline " href="{{ route('reservations.step.one') }}">Make Reservation</a>

                <a href="{{ route('cart.list') }}" class="flex items-center hover:underline ">
                    <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                    <span>Cart</span>&nbsp&nbsp
                    <span>
                        @if(session()->has('Cart'))
                        0
                        @endif
                    </span>
                </a>
    
                    @auth
                    @if(auth()->user()->is_admin === 1)
                    <a class="hover:underline" href="/admin">
                        Admin
                    </a>
                    @else
                    <a class="hover:underline" href="/user">
                        User
                    </a>
                    @endif
                    @else
                    <a class="hover:underline" href="/login">
                        Login
                    </a>
                    @endauth

            </div>
        </nav>
    </div>
    <div class="font-sans text-gray-900 antialiased min-h-screen  bg-white">
        {{ $slot }}
    </div>
    <footer class="bg-back border-t py-6">
        <div class="text-white text-center">
            <div class="lg:text-5xl">Opening Hours</div>
            <div>Daily: 17:00 - 23:00</div>
            <div>Visit Us</div>
            <div>171 Dien Bien Phu, Thanh Khe</div>
            <div>Da Nang, Vietnam</div>
            <div>Phone: 028 6688 7888</div><br>
            <div>Part of The Only Group ©2022</div>
        </div>
    </footer>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
       
    function addCart(id) {
        $.ajax({
            type: 'GET',
            url: '/addCart/' + id,
        }).done(function(respone) {
            swal("Please check your cart!", "You added sucessfully one dish!", "success");
        });
    }

    function saveCart(id) {
        $.ajax({
            type: 'GET',
            url: '/saveCart/' + id + '/' + $('#quantity-item-' + id).val(),
        }).done(function(respone) {
            RenderListCart(respone);
            swal("Please check your cart!", "You added sucessfully one dish!", "success");
        });
    }

    function removeCart(id) {
        $.ajax({
            type: 'GET',
            url: '/removeCart/' + id + '/' + $('#quantity-item-' + id).val(),
        }).done(function(respone) {
            RenderListCart(respone);
            //swal("Please check your cart!", "You added sucessfully one dish!", "success");
            
        });
    }

    function RenderListCart() {
        $("#list-cart").empty();
        $("#list-cart").html(respone);
    }
    </script>

    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script>
    var subTotalPriceUSD = document.getElementById("subTotalPriceUSD").value;
    var totalPriceUSD = document.getElementById("totalPriceUSD").value;
   
    paypal.Button.render({
        // Configure environment
        env: 'sandbox',
        client: {
            sandbox: 'Ab-znb87Zj3jONeVHdYgqVvkhyAfQUPol_1SeGtCI24155GLtedd92KYhk41Bry8z2Z7btdm-pflYflA',
            production: 'demo_production_client_id'
        },
        // Customize button (optional)
        locale: 'en_US',
        style: {
            size: 'responsive',
            color: 'blue',
            shape: 'rect',
        },

        // Enable Pay Now checkout flow (optional)
        commit: true,

        // Set up a payment
        payment: function(data, actions) {
            return actions.payment.create({
                transactions: [{
                    amount: {
                        total: totalPriceUSD.toString(),
                        currency: 'USD',
                        details: {
                            subtotal: subTotalPriceUSD.toString(),
                            //tax: '0.01',
                            shipping: '1.00',
                            // handling_fee: '1.00',
                            // shipping_discount: '-1.00',
                            // insurance: '0.01'
                        }
                    },
                    description: 'The payment transaction description.',
                    custom: '90048630024435',
                    //invoice_number: '12345', Insert a unique invoice number
                    payment_options: {
                        allowed_payment_method: 'INSTANT_FUNDING_SOURCE'
                    },
                    soft_descriptor: 'ECHI5786786',
                    item_list: {
                        items: [
                            @if(session()->has('Cart') != null)
                            @foreach(session()->get('Cart')->products as $product) {
                                name: '{{$product['productInfo']->name}}',
                                description: 'Good',
                                quantity: '{{$product['quantity']}}',
                                price: '{{$product['productInfo']->price}}',
                                sku: '1',
                                currency: 'USD'
                            },
                            @endforeach
                            @endif
                        ],
                        shipping_address: {
                            "line1": "Eco Space, bellandur",
                            "line2": "OuterRingRoad",
                            "city": "Danang",
                            "country_code": "VN",
                            "postal_code": "21000"
                        }
                    }
                }],
                note_to_payer: 'Contact us for any questions on your order.'
            });
        },
        // Execute the payment
        onAuthorize: function(data, actions) {
            return actions.payment.execute().then(function() {
                // Show a confirmation message to the buyer
                window.alert(
                    'Hope you will be happy with dishes of 1998 SteakHouse. Thank you very much!'
                );
            });
        }
    }, '#paypal-button');
    </script>
    <script>
        function decrement(e) {
            const btn = e.target.parentNode.parentElement.querySelector(
            'button[data-action="decrement"]'
            );
            const target = btn.nextElementSibling;
            let value = Number(target.value);
            if(value > 1){
                value--;
            }
            target.value = value;
        }

        function increment(e) {
            const btn = e.target.parentNode.parentElement.querySelector(
            'button[data-action="decrement"]'
            );
            const target = btn.nextElementSibling;
            let value = Number(target.value);
            value++;
            target.value = value;
        }

        const decrementButtons = document.querySelectorAll(
            `button[data-action="decrement"]`
        );

        const incrementButtons = document.querySelectorAll(
            `button[data-action="increment"]`
        );

        decrementButtons.forEach(btn => {
            btn.addEventListener("click", decrement);
        });

        incrementButtons.forEach(btn => {
            btn.addEventListener("click", increment);
        });
</script>
</body>

</html>