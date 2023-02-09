<x-guest-layout>
    <div class=" text-center">
        <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 pt-12">
            DETAIL DISH</h2>
        <p class="text-xl text-black">Let's explore the main ingredients and the processing process to fully enjoy the
            dishes</p>
    </div>
    <div class="flex flex-row px-25 py-13 ">
        <div class="basis-1/2">
            <div class="w-150  py-6 mx-auto">
                @if(session()->get('Detail') != null)
                <div class=" mx-4 mb-2 rounded-lg shadow-lg overflow-hidden cursor-pointer"">
                    <img class="h-132" src="{{ Storage::url($product->image) }}" alt="Image" />
                </div>
                @endif
            </div>
        </div>
        <div class="basis-1/2 pl-13">
            <div class=" pt-6 bg-white">
                <h4 class="text-3xl mb-6 font-bold text-xl font-semibold tracking-tight text-green-600 uppercase">
                    {{ $product->name }}</h4>

                <div class="text-xl font-bold">INTRODUCTION</div>
                <p class="leading-normal mb-6">{{$product->description}}</p>
                <div class="text-xl font-bold">MAIN INGREDIENT</div>
                <p class="leading-normal mb-6">{{$product->ingredients}}</p>
            </div>
            <div class="">
                <span class="text-xl text-green-600">PRICE: ${{ $product->price }}</span>
            </div>

            <div class="py-4">
                <button onClick="addCart({{$product->id}})"
                        class="text-white mr-2 bg-green-600 font-bold px-4 py-2 border border-green-500 rounded-lg hover:bg-white hover:text-green-400">
                       Add to cart
                    </button>
                <button
                    class="text-green-600 font-bold  px-4 py-2 border border-green-500 rounded-lg hover:bg-green-500 hover:text-white">
                    <a class=" antialiased" href="{{ route('menus.index') }}">Menu</a>
                </button>
            </div>
           
        </div>
    </div>




</x-guest-layout>