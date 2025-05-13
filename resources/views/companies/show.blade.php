<x-app-layout>
    <x-slot name="header">
        <div class="max-w-10xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Compañias
            </h2>
            </div>
        </div>
    </x-slot>
    
    <div class="dark:bg-gray-800 p-8 px-6 w-full max-w-7xl space-y-6">
        <div class="flex items-center justify-center">
            <div class="bg-white dark:bg-gray-800 p-8 px-6 rounded-lg shadow-lg w-full max-w-10xl space-y-6">
                <div class="overflow-x-auto">
                    <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-6 text-center">Detalle de Empresa: {{ $company->name }}</h1>
                    <form class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6" enctype="multipart/form-data">
                        @csrf
                        <div class="flex-1">
                            <label for="email" class="form-label">Email: </label>
                            {{ $company->email }}
                        </div>
                        <div class="flex-1">
                            <label for="website" class="form-label">Website: </label>
                            {{ $company->website }}
                        </div>
                        <div class="flex-1">
                            <label for="logo" class="form-label">Logo: </label>
                            <img src="{{ asset('../storage/app/public/' . $company->logo) }}" width="100">
                        </div>
                        <div class="flex-1">
                            <a href="{{ route('companies.index') }}">
                                <button type="button" class="bg-red-100 text-red-600 py-2 px-4 border rounded-md w-auto">
                                    Volver 
                                </button>
                            </a>  
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>

</x-app-layout>
