<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <p class="text-3xl text-black font-bold">Order list</p>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden shadow-md sm:rounded-lg">
                            <table class="min-w-full">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-bold tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            Name
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-bold tracking-wider text-left text-white uppercase dark:text-gray-400 w-48">
                                            Address
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-bold tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            Date
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-bold tracking-wider text-left text-white uppercase dark:text-gray-400">
                                            Total quantity (unit)
                                        </th>
                                        <th scope="col"
                                            class="py-3 px-6 text-xs font-bold tracking-wider text-left text-white uppercase dark:text-gray-400 w-48">
                                            Total price (VND)
                                        </th>
                                        <th scope="col" class="py-3 px-6 text-xs font-bold tracking-wider text-left text-white uppercase dark:text-white">
                                            <span>Action</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td
                                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $order->first_name }} {{ $order->last_name }}
                                            </td>
                                            <td
                                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $order->address }}
                                            </td>
                                            <td
                                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $order->date }}
                                            </td>
                                            <td
                                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $order->total_quantity }} 
                                            </td>
                                            <td
                                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $order->total_price }}
                                            </td>
                                            <td
                                                class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <div class="flex space-x-2">
                                                    <a href="{{ route('admin.orderDetail',$order->id) }}"
                                                        class="px-4 py-2 bg-cyan-400 rounded-lg text-white">Detail order</a>
                                                </div>
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
