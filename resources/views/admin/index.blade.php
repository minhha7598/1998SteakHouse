<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="text-center">
            <h2
                class="text-3xl font-bold italic text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500">
                SUMMARY INFORMATION</h2>
        </div>
        <div class="flex flex-row px-16 py-13 text-3xl font-bold">
            <div class="basis-1/2 ">
                <div class="p-32 shadow-md sm:rounded-2xl bg-green-100">
                    @if($orderCount == null)
                    <span>0 order</span>
                    @else
                    <span>{{$orderCount}} order</span>
                    @endif
                </div>
            </div>
            <div class="basis-1/4 pl-12 ">
                <div class="p-32 text-black shadow-md sm:rounded-2xl bg-yellow-100 ">
                    @if($reservationCount == null)
                    <span>0 reservation</span>
                    @else
                    <span>{{$reservationCount}} reservations</span>
                    @endif
                </div>
            </div>
            <div class="basis-1/4 pl-12 ">
                <div class="p-8 px-16 mb-2 shadow-md sm:rounded-2xl bg-red-100 ">
                    @if($tableCount == null)
                    <span>0 dish</span>
                    @else
                    <span>{{$tableCount}} tables</span>
                    @endif
                </div>
                <div class="p-8 px-16 mb-2 shadow-md sm:rounded-2xl bg-indigo-50 ">
                    @if($menuCount == null)
                    <span>0 dish</span>
                    @else
                    <span>{{$menuCount}} dishes</span>
                    @endif
                </div>
                <div class="p-8 px-16 shadow-lg sm:rounded-2xl bg-cyan-100 ">
                    @if($categoryCount == null)
                    <span>0 dish</span>
                    @else
                    <span>{{$categoryCount}} categories</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="w-120 pl-15" >
        <h2 class="text-2xl font-bold italic text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500">
            Import data</h2>
        <form action="{{ route('admin.import') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input class="form-control
    block
    w-full
    px-3
    py-1.5
    text-base
    font-normal
    text-gray-700
    bg-white bg-clip-padding
    border border-solid border-gray-300
    rounded
    transition
    ease-in-out
    m-0
    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file" name="file" id="file"><br>
            <button
                class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow"
                type="submit">Submit</button>
        </form>
    </div>

</x-admin-layout>