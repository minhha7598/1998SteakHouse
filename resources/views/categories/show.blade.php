<x-guest-layout>
    <div class="container w-full px-5 py-6 mx-auto">
        <div class="mb-12 text-center">
            <h2
                class="text-3xl font-bold italic text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 pt-12">
                DISHED</h2>
            <p class="text-xl text-black mb-6">Let's see what dishes we have !</p>

            <div class="grid lg:grid-cols-4 gap-y-6 text-black">
                @foreach ($category->menus as $menu)
                <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg overflow-hidden cursor-pointer">
                    <img class="w-full h-48" src="{{ Storage::url($menu->image) }}" alt="Image" />
                    <div class="px-6 pt-6">
                        <h4 class="mb-3 font-bold text-xl font-semibold tracking-tight text-green-600 uppercase">
                            {{ $menu->name }}</h4>
                        <p class="leading-normal">
                            {{substr($menu->description, 0,  80)}}
                        </p>
                    </div>
                    <div class="flex items-center justify-center p-1">
                        <span class="text-xl text-green-600">${{ $menu->price }}</span>
                    </div>
                    <div class="flex items-center justify-center h-screen py-4">
                    <button onClick="addCart({{$menu->id}})"
                        class="text-white mr-2 bg-green-600 font-bold px-4 py-2 border border-green-500 rounded-lg hover:bg-white hover:text-green-400">
                       Add to cart
                    </button>
                        <button
                            class="text-green-600 font-bold  px-4 py-2 border border-green-500 rounded-lg hover:bg-green-500 hover:text-white">
                            <a class=" antialiased" href="{{ url('/detail/'.$menu->id) }}">Detail</a>
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</x-guest-layout>