<x-guest-layout>
    <div class="container w-full px-5 py-6 mx-auto">
        <div class="flex items-center min-h-screen bg-slate-800">
            <div class="flex-1 h-full max-w-4xl mx-auto bg-white rounded-lg shadow-xl ">
                <div class="text-3xl font-bold text-center py-4">
                   Your reservation is registered successfully!
                </div> <hr>
                <div class="flex items-center justify-center h-screen py-4">
                    Your reservation's information </br>
                    1. Full name: {{$reservation->last_name}} {{$reservation->first_name}} </br>
                    2. Email: {{$reservation->email}} </br>
                    3. Telephone: {{$reservation->tel_number}} </br>
                    4. Date: {{$reservation->res_date}} </br>
                    5. Guest number: {{$reservation->guest_number}} </br>
                    6. Table: {{$tables->name}} </br>
                    7. Table's location: {{$tables->location}} </br>
                </div>
                <div class="flex items-center justify-center h-screen py-4">
                    <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                        <a class="text-black hover:underline text-xl font-bold antialiased"
                        href="{{ route('home') }}">Back</a>
                    </button>  
                </div>
                
            </div>
        </div>
    </div>
</x-guest-layout>
