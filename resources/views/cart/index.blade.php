<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="text-center">
        <h2
            class="text-3xl font-mono font-bold italic text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 pt-12">
            YOUR CART</h2>
            <p class="text-xl text-black ">Please check all products before
            checking out !</p>
    </div>

    <div class="flex flex-row px-20 py-13">
        <div class="basis-1/2">
            @if ($message = Session::get('Success'))
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                role="alert">
                <span class="font-medium">{{$message}}!</span>
            </div>
            @endif
            <main class="my-8">
                <div class="container px-6 mx-auto">
                    <div class="flex justify-center my-6">
                        <div class="flex flex-col">
                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                                    <!-- <div class="overflow-hidden shadow-md sm:rounded-lg"> -->
                                    <table class="mb-6 table-fixed overflow-hidden shadow-md sm:rounded-lg">
                                        <thead class="bg-gray-50 dark:bg-gray-700">
                                            <tr>
                                                <th scope="col"
                                                    class="py-3 px-6 text-xs font-mono font-bold tracking-wider text-left text-white uppercase dark:text-gray-400 w-48">
                                                    Image
                                                </th>
                                                <th scope="col"
                                                    class="py-3 px-6 text-xs font-mono font-bold  tracking-wider text-left text-white uppercase dark:text-gray-400 w-52">
                                                    Name
                                                </th>
                                                <th scope="col"
                                                    class="py-3 px-6 text-xs font-mono font-bold  tracking-wider text-left text-white uppercase dark:text-gray-400 w-32">
                                                    Price
                                                </th>
                                                <th scope="col"
                                                    class="py-3 px-6 text-xs font-mono font-bold  tracking-wider text-left text-white uppercase dark:text-gray-400 w-48">
                                                    Quantity
                                                </th>
                                                <th scope="col"
                                                    class="py-3 px-6 text-xs font-mono font-bold  tracking-wider text-left text-white uppercase dark:text-gray-400 w-48">
                                                    Total
                                                </th>
                                                <th scope="col"
                                                    class="py-3 px-6 text-xs font-mono font-bold  tracking-wider text-left text-white uppercase dark:text-white w-32">
                                                    <span>Action</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="list-cart">
                                            @if(session()->has('Cart'))
                                            @if(session()->get('Cart')->products != null)
                                            @foreach (session()->get('Cart')->products as $product)
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                                                <td
                                                    class="py-4 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white ">
                                                    <img src="{{Storage::url($product['productInfo']->image)}}"
                                                        class="w-50 h-32 rounded">
                                                </td>
                                                <td id="name"
                                                    class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{$product['productInfo']->name}}
                                                </td>
                                                <td id="price"
                                                    class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{$product['productInfo']->price}}
                                                </td>
                                                <td
                                                    class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    <div class="pr-8 flex ">
                                                        <div class="custom-number-input h-10 w-32">
                                                            <div
                                                                class="flex flex-row h-10 w-full rounded-lg relative bg-transparent mt-1">
                                                                <button data-action="decrement"
                                                                    class=" bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                                                                    <span class="m-auto text-3xl font-thin">−</span>
                                                                </button>
                                                                <input type="number" min="1" max="100"
                                                                    id="quantity-item-{{$product['productInfo']->id}}"
                                                                    class="outline-none focus:outline-none text-center w-full bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none"
                                                                    name="custom-input-number"
                                                                    value="{{$product['quantity']}}"></input>
                                                                <button data-action="increment"
                                                                    class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                                                                    <span class="m-auto text-3xl font-thin">+</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                </td>
                                                <td
                                                    class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    $ {{number_format($product['price'],2)}}
                                                </td>
                                                <td
                                                    class="py-4 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    <div class="flex space-x-2">
                                                        <a href="" class="px-4 py-2 rounded-lg"
                                                            onClick="saveCart({{$product['productInfo']->id}})">
                                                            <svg fill="none" stroke="currentColor" stroke-width="1.5"
                                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                                                aria-hidden="true">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z">
                                                                </path>
                                                            </svg>Save &nbsp
                                                        </a>
                                                        <a href="" class="px-4 py-2 rounded-lg"
                                                            onClick="removeCart({{$product['productInfo']->id}})">
                                                            <svg fill="none" stroke="currentColor" stroke-width="1.5"
                                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                                                aria-hidden="true">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M6 18L18 6M6 6l12 12"></path>
                                                            </svg>Delete
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                            @endif
                                        </tbody> <br>
                                </div>
                                </table>
                                <div class=" text-center mb-6">
                                    @if(session()->has('Cart'))
                                    @if(session()->get('Cart')->products == null)
                                    <h3 class="text-xl text-bold mb-3">Your shopping cart is empty, let's add
                                        some favorites.</h3>
                                    <button class="px-4 py-2 border bg-green-500 rounded-lg text-white">
                                        <a class="antialiased" href="{{ route('menus.index') }}">Start visit our
                                            menu</a></button>
                                    @endif
                                    @endif
                                    @if(session()->has('Cart'))
                                    @if(session()->get('Cart')->products != null)

                                    <a class="text-black hover:underline text-xl antialiased"
                                        href="{{ route('menus.index') }}">Continue
                                        shopping</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    <!-- <a class="text-black hover:underline text-xl antialiased"
                                            href="{{ route('cart.clear') }}">Delete All</a> -->
                                    @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div class="basis-1/4 pt-8 pl-13 ">
            <div class="mb-3 ">
                <span class="font-bold">Need help? </span><span>Please call: 028 6688 7888</span><br>
                <a href="/login" class="text-black hover:underline rounded-lg"><span
                        class="text-green-500 font-bold">Sign in </span></a><span>to your account to make
                    reservation now!</span>
            </div>
            <div class="text-2xl font-bold">
                SUMMARY LIST
            </div>
            @if(session()->get('Cart'))
            @if(session()->get('Cart')->products == null)
            <h2 class="text-bold py-2">Total quantity:
                0 dish</h2>
            <span class="text-bold py-2">SubTotal:
                &nbsp&nbsp $
                0.00
            </span>
            <span class="text-bold">
                (0 VND)
            </span><br>
            <h2 class="text-bold py-2">Shipping cost: &nbsp&nbsp- $ 0.00 (0 VND)</h2>
            <hr>
            <h2 class="text-bold py-2">Estimated total: &nbsp&nbsp $
                0 &nbsp&nbsp
                (0 VND) </h2>
            @else
            <h2 class="text-bold py-auto">Total quantity:
                {{session()->get('Cart')->totalQuantity}} items</h2>
            <!-- <form class="mb-3 " method="POST" action="/payment-MoMo"
                onsubmit="return confirm('Are you sure CHECK OUT?');">
                @csrf -->
                <span class="text-bold py-2">SubTotal:
                    &nbsp&nbsp $
                    {{number_format(session()->get('Cart')->totalPrice,2)}}
                </span>

                <!-- <input id="subTotalPriceUSD" name="subTotalPriceUSD" type="hidden"
                    value="{{number_format(session()->get('Cart')->totalPrice,2)}}">
                <input id="totalPriceUSD" name="totalPriceUSD" type="hidden"
                    value="{{number_format(number_format(session()->get('Cart')->totalPrice,2) + 1.00, 2)}}"> -->

                <span class=" text-bold">
                    ({{number_format(session()->get('Cart')->totalPrice,2) * 23500}} VND)
                </span><br>
                <h2 class="text-bold py-2">Shipping cost: &nbsp&nbsp + $1.00 (23500 VND)</h2>
                <hr>
                <h2 class="text-bold py-2">Estimated total: &nbsp&nbsp $
                    {{number_format(number_format(session()->get('Cart')->totalPrice,2) + 1.00,2)}}&nbsp&nbsp
                    ({{(number_format(session()->get('Cart')->totalPrice,2)+ 1.00) * 23500}} VND) </h2>
                <!-- <input name="totalPrice" type="hidden"
                    value="{{(number_format(session()->get('Cart')->totalPrice,2)-1) * 23500}}"> -->
                <br>
                <!-- <button name="payUrl" class="bg-fuchsia-500 w-52 px-4 py-2 borderbg-fuchsia-500 text-white"
                    type="submit"><span class="font-bold">MOMO</span> checkout</button> -->
            <!-- </form> -->
            <!-- <div id="paypal-button"></div> -->
            <button
                class="bg-fuchsia-500 w-52 px-4 py-2 borderbg-fuchsia-500 text-white">
                <a href="{{ route('checkOut') }}">CHECK OUT</a>
            </button>
            @endif
            @endif
        </div>
        

    </div>


</x-guest-layout>