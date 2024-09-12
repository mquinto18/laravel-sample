<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Appointment') }}
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="mb-0">Add Appointment</h1>
                    <hr />
                    @if (session()->has('error'))
                    <div>
                        {{session('error')}}
                    </div>
                    @endif
                    <p class='my-5'><a href="{{ route('admin/appointment') }}" class="text-white bg-blue-600 px-3 py-1 rounded-md">Go Back</a></p>
 
                    <form action="{{ route('admin/appointment/save') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Name Field -->
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" name="name" class="form-control" placeholder="Name">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Address Field -->
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" name="address" class="form-control" placeholder="Address">
                            @error('address')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Email Field -->
                    <div class="row mb-3">
                        <div class="col">
                            <input type="email" name="email" class="form-control" placeholder="Email">
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Description Field -->
                    <div class="row mb-3">
                        <div class="col">
                            <textarea name="description" class="form-control" placeholder="Description"></textarea>
                            @error('description')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Date Field -->
                    <div class="row mb-3">
                        <div class="col">
                            <input type="date" name="date" class="form-control">
                            @error('date')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="row">
                        <div class="d-grid">
                            <button class="text-white bg-blue-600 px-3 py-1 rounded-md">Submit</button>
                        </div>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>