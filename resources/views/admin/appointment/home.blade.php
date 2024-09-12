<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Appointment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class='flex items-center justify-between'>
                        <h1 class='mb-0'>Appointment List</h1>
                        <a href="{{ route('admin/appointment/create') }}" class='text-white bg-blue-600 px-3 py-1 rounded-md'>Add appointment</a>
                    </div>
                    @if(Session::has('success'))
                    <div class='bg-green-800 text-white px-2 my-2 py-2 rounded-md' role='alert'>
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    <table class='table table-hover'>
                        <thead class='table-primary'>
                            <tr class='text-center'>
                                <th>#</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Description</th>
                                <th>date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($appointments as $appointment)
                            <tr class='text-center'>
                                <td class='align-middle'>{{ $loop->iteration }}</td>
                                <td class='align-middle'>{{ $appointment->name }}</td>
                                <td class='align-middle'>{{ $appointment->address }}</td>
                                <td class='align-middle'>{{ $appointment->email }}</td>
                                <td class='align-middle'>{{ $appointment->description }}</td>
                                <td class='align-middle'>{{ $appointment->date }}</td>
                                <td class='align-middle'>
                                    <div class='btn-group' role='group' arial-label='Basic example'>
                                        <a href="" type="button" class="btn btn-secondary">Edit</a>
                                        <a href="" type="button" class="btn btn-danger">Delete</a>
                                        <a href="{{ route('admin/appointment/view', ['id'=>$appointment->id]) }}" type="button" class="btn btn-success">View</a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="7">Product not found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
