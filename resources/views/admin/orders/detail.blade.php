<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <p class="text-3xl text-black font-bold">Order detail</p>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                        <div class="flex flex-row px-auto py-12">
                            <div class="basis-1/2">
                                <div class="text-xl">
                                    <span class=" font-bold">Name: </span><span>{{$orderRecord->last_name}}
                                        {{$orderRecord->first_name}}</span>
                                </div>
                                <div class="text-xl">
                                    <span class=" font-bold">Address:
                                    </span><span>{{$orderRecord->address}}</span>
                                </div>
                                <div class="text-xl">
                                    <span class=" font-bold">Country: </span><span>
                                        {{$orderRecord->country}}</span>
                                </div>
                                <div class="text-xl">
                                    <span class=" font-bold">Email: </span><span>{{$orderRecord->email}}</span>
                                </div>
                                <div class="text-xl">
                                    <span class=" font-bold">Phone number:
                                    </span><span>{{$orderRecord->phone_number}}</span>
                                </div>
                                <div class="text-xl">
                                    <span class=" font-bold">Description: </span><span>
                                        {{$orderRecord->description}}</span>
                                </div>

                            </div>
                            <div class="basis-1/4 pl-13 ">
                                <div class="text-xl">
                                    <span class=" font-bold">Order type:
                                    </span>
                                    @if($orderRecord->is_online == 1)
                                    <span>Online</span>
                                    @endif
                                </div>
                                <div class="text-xl">
                                    <span class=" font-bold">Delivery:
                                    </span><span>{{$orderRecord->delivery}}</span>
                                </div>
                                <div class="text-xl">
                                    <span class=" font-bold">Date: </span><span>{{$orderRecord->date}}</span>
                                </div>
                                <div class="text-xl">
                                    <span class=" font-bold">Total quantity: </span><span>
                                        {{$orderRecord->total_quantity}}</span>
                                </div>
                                <div class="text-xl">
                                    <span class=" font-bold">Total price: </span><span>$
                                        {{$orderRecord->total_price_usd}} ({{$orderRecord->total_price}}) VND</span>
                                </div>
                            </div>
                        </div>
                        <div class="overflow-hidden shadow-md sm:rounded-lg">
                            <table class="min-w-full">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-bold tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            Image
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-bold tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            Name
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-bold tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            Price/unit
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-bold tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            Quantity
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-bold tracking-wider text-left text-white uppercase dark:text-gray-400 w-48">
                                            Total price
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td
                                            class="py-4 px-4 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <img src="{{ Storage::url($product[0]['image']) }}"
                                                class="w-50 h-32 rounded ">
                                        </td>
                                        <td
                                            class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $product[0]['name'] }}
                                        </td>
                                        <td
                                            class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $product[0]['price'] }}
                                        </td>
                                        <td
                                            class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $product['order_quantity'] }}
                                        </td>
                                        <td
                                            class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $product['order_price'] }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>