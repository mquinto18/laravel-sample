<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Appointment Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="mb-0">Appointment Details</h1>
                    <hr />

                    <p><strong>Name:</strong> {{ $appointment->name }}</p>
                    <p><strong>Address:</strong> {{ $appointment->address }}</p>
                    <p><strong>Email:</strong> {{ $appointment->email }}</p>
                    <p><strong>Description:</strong> {{ $appointment->description }}</p>
                    <p><strong>Date:</strong> {{ $appointment->date }}</p>

                    <h3>QR Code:</h3>
                    <div>
                        {!! $qrcode !!}
                    </div>

                    <p><a href="{{ route('admin/appointment') }}" class="text-white bg-blue-600 px-3 py-1 rounded-md">Go Back</a></p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
