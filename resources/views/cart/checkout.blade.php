<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="text-center">
        <h2
            class="text-3xl font-mono font-bold italic text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 pt-12">
            CHECK OUT</h2>
        <p class="text-xl text-black ">We pay by MoMo ATM or PayPal. Please check all information before
            paying the bill !</p>
    </div>

    <div class="flex flex-row px-25 py-13">
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
                                    <table class="table-fixed overflow-hidden shadow-md sm:rounded-lg">
                                        <!-- <form class="w-full max-w-lg"> -->
                                        <form method="POST" action="/payment-MoMo"
                                            onsubmit="return confirm('Are you sure CHECK OUT?');">
                                            @csrf
                                            <div class="flex flex-wrap -mx-3 mb-3">
                                                <div class="w-full md:w-1/2 px-3 md:mb-0">
                                                    <label
                                                        class="block uppercase tracking-widetext-gray-700 text-xs font-bold mb-2"
                                                        for="grid-first-name">
                                                        First Name
                                                    </label>
                                                    <input name="First Name"
                                                        class="appearance-none block w-full text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                                        id="firsttName" type="text" placeholder="Minh Hung">
                                                    </p>
                                                </div>
                                                <div class="w-full md:w-1/2 px-3">
                                                    <label 
                                                        class="block uppercase tracking-widetext-gray-700 text-xs font-bold mb-2"
                                                        for="grid-last-name">
                                                        Last Name
                                                    </label>
                                                    <input name="Last Name"
                                                        class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                        id="lastName" type="text" placeholder="Ha">
                                                </div>
                                            </div>
                                            <div class="flex flex-wrap -mx-3 mb-3">
                                                <div class="w-full px-3">
                                                    <label
                                                        class="block uppercase tracking-widetext-gray-700 text-xs font-bold mb-2"
                                                        for="grid-password">
                                                        Phone number
                                                    </label>
                                                    <input name="Phone number" 
                                                        class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                        id="phoneNumber" type="text" placeholder="+84 905 123 456">
                                                        <!-- <input name="Phone number" type="hidden"
                                                        id="phoneNumber"> -->
                                                </div>
                                            </div>
                                            <div class="flex flex-wrap -mx-3 mb-3">
                                                <div class="w-full px-3">
                                                    <label
                                                        class="block uppercase tracking-widetext-gray-700 text-xs font-bold mb-2"
                                                        for="grid-password">
                                                        Email
                                                    </label>
                                                    <input name="Email"
                                                        class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                        id="email" type="text"
                                                        placeholder="hungminhha751998@gmail.com">
                                                </div>
                                            </div>
                                            <div class="flex flex-wrap -mx-3 mb-3">
                                                <div class="w-full md:w-1/3 px-3 mb-3 md:mb-0">
                                                    <label
                                                        class="block uppercase tracking-widetext-gray-700 text-xs font-bold mb-2"
                                                        for="grid-city">
                                                        Address
                                                    </label>
                                                    <input  name="Address"
                                                        class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                        id="address" type="text"
                                                        placeholder="01 Dien Bien Phu street, Thanh Khe district">
                                                </div>
                                                <div class="w-full md:w-1/3 px-3 mb-3 md:mb-0">
                                                    <label
                                                        class="block uppercase tracking-widetext-gray-700 text-xs font-bold mb-2"
                                                        for="grid-city">
                                                        Country
                                                    </label>
                                                    <input name="Country"
                                                        class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                        id="country" type="text" placeholder="Viet Nam">
                                                </div>
                                                <div class="w-full md:w-1/3 px-3 mb-3 md:mb-0">
                                                    <label
                                                        class="block uppercase tracking-widetext-gray-700 text-xs font-bold mb-2"
                                                        for="grid-state">
                                                        Delivery
                                                    </label>
                                                    <div class="relative">
                                                        <select name="Delivery"
                                                            class="block appearance-none w-full  border border-gray-200text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                            id="grid-state">
                                                            <option>Fast (2-4 days)</option>
                                                            <option>Normal (4-7 days)</option>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="w-full md:w-1/3 px-3 md:mb-0">
                                                    <label 
                                                        class="block uppercase tracking-widetext-gray-700 text-xs font-bold mb-2"
                                                        for="grid-zip">
                                                        Description
                                                    </label>
                                                    <textarea name="Description" id="description"
                                                        class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"></textarea>
                                                </div>
                                            </div>
                                            <!-- </form> -->
                                    </table>
                                </div>
                                <div class=" text-center mb-6">
                                    @if(session()->get('Cart')->products == null)
                                    <h3 class="text-xl text-bold mb-3">Your shopping cart is empty, let's add
                                        some favorites.</h3>
                                    <button class="px-4 py-2 border bg-green-500 rounded-lg text-white">
                                        <a class="antialiased" href="{{ route('menus.index') }}">Start visit our
                                            menu</a></button>
                                    @endif
                                    @if(session()->get('Cart')->products != null)

                                    <a class="text-black hover:underline text-xl antialiased"
                                        href="{{ route('menus.index') }}">Continue
                                        shopping</a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    <!-- <a class="text-black hover:underline text-xl antialiased"
                                            href="{{ route('cart.clear') }}">Delete All</a> -->
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
            <input id="totalQuantity" name="totalQuantity" type="hidden"
                value="{{session()->get('Cart')->totalQuantity}}">
            <span class="text-bold py-2">SubTotal:
                &nbsp&nbsp $
                {{number_format(session()->get('Cart')->totalPrice,2)}}
            </span>

            <input id="subTotalPriceUSD" name="subTotalPriceUSD" type="hidden"
                value="{{number_format(session()->get('Cart')->totalPrice,2)}}">
            <input id="totalPriceUSD" name="totalPriceUSD" type="hidden"
                value="{{number_format(number_format(session()->get('Cart')->totalPrice,2) + 1.00, 2)}}">

            <span class=" text-bold">
                ({{number_format(session()->get('Cart')->totalPrice,2) * 23500}} VND)
            </span><br>
            <h2 class="text-bold py-2">Shipping cost: &nbsp&nbsp + $1.00 (23500 VND)</h2>
            <hr>
            <h2 class="text-bold py-2">Estimated total: &nbsp&nbsp $
                {{number_format(number_format(session()->get('Cart')->totalPrice,2) + 1.00,2)}}&nbsp&nbsp
                ({{(number_format(session()->get('Cart')->totalPrice,2)+ 1.00) * 23500}} VND) </h2>
            <input name="totalPrice" type="hidden"
                value="{{(number_format(session()->get('Cart')->totalPrice,2)-1) * 23500}}">
            <br>
            <button name="payUrl" class="mb-3 bg-fuchsia-500 w-52 px-4 py-2 borderbg-fuchsia-500 text-white"
                type="submit"><span class="font-bold">MOMO</span> checkout</button>
            </form>
            <div id="paypal-button"></div>
            @endif
            @endif
        </div>
    </div>
</x-guest-layout>