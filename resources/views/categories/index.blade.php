<x-guest-layout>
    <div class="mb-12 text-center">
        <h2
            class="text-3xl font-bold italic text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 pt-12">
            CATEGORIES</h2>
        <p class="text-xl text-black">Let's see what type of food we have !</p>
    </div>
    <div class="container w-full px-5 mx-auto">
        <div class="grid lg:grid-cols-3 gap-y-6 ">
            @foreach ($categories as $category)
            <div class="mx-4 mb-2 rounded-lg shadow-lg relative overflow-hidden rounded-lg shadow-lg cursor-pointer">
                <img class="content-center w-full h-60" src="{{ Storage::url($category->image) }}" alt="Image" />

                <div class="absolute top-0 left-0 px-6 py-4 ">
                    <a href="{{ route('categories.show', $category->id) }}">
                        <h4
                            class="mb-3 text-3xl font-semibold tracking-tight text-green-600 font-bold hover:text-green-400 uppercase">
                            {{ $category->name }}</h4>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-guest-layout>