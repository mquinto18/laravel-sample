<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class='flex items-center justify-between'>
                        <h1 class='mb-0'>List Products</h1>
                        <a href="{{ route('admin/products/create') }}" class='text-white bg-blue-600 px-3 py-1 rounded-md'>Add products</a>
                    </div>
                    <hr />
                    @if(Session::has('success'))
                    <div class='bg-green-800 text-white px-2 my-2 py-2 rounded-md' role='alert'>
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    <table class='table table-hover'>
                        <thead class='table-primary'>
                            <tr class='text-center'>
                                <th>#</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $product)
                            <tr class='text-center'>
                                <td class='align-middle'>{{ $loop->iteration }}</td>
                                <td class='align-middle'>{{ $product->title }}</td>
                                <td class='align-middle'>{{ $product->category }}</td>
                                <td class='align-middle'>{{ $product->price }}</td>
                                <td class='align-middle'>
                                    <div class='btn-group' role='group' arial-label='Basic example'>
                                        <a href="{{ route('admin/products/edit', ['id'=>$product->id]) }}" type="button" class="btn btn-secondary">Edit</a>
                                        <a href="{{ route('admin/products/delete', ['id'=>$product->id]) }}" type="button" class="btn btn-danger">Delete</a>
                                        <a href="{{ route('admin/products/view', ['id'=>$product->id]) }}" type="button" class="btn btn-success">View</a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="5">Product not found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
