<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight mx-4">
                {{ __("Fornecedor") }}
            </h2>
            <a href="{{ route('fornecedor.create') }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 px-4 ml-4">+</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-alerts/>
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-6">Código</th>
                                <th scope="col" class="px-6 py-6">Telefone</th>
                                <th scope="col" class="px-6 py-6">Email</th>
                                <th scope="col" class="px-6 py-6">CEP</th>
                                <th scope="col" class="px-6 py-6">Rua</th>
                                <th scope="col" class="px-6 py-6">Número</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($suppliers as $supplier) 
                                <tr class="bg-white border-b ">
                                    <td class="px-6 py-4">{{ $supplier->name }}</td>
                                    <td class="px-6 py-4">{{ $supplier->contact_phone }}</td>
                                    <td class="px-6 py-4">{{ $supplier->contact_email }}</td>
                                    <td class="px-6 py-4">{{ $supplier->zip_code }}</td>
                                    <td class="px-6 py-4">{{ $supplier->street }}</td>
                                    <td class="px-6 py-4">{{ $supplier->number }}</td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('fornecedor.edit', $supplier->id) }}">Editar</a>
                                        <a href="{{ route('fornecedor.destroy', $supplier->id) }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table> 
                    <div class="py-6">
                        {{ $suppliers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
