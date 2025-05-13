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
    @if(session('success'))
        <div class="bg-green-100 text-green-600 py-2 px-4 border rounded-md w-auto">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-100 text-red-600 py-2 px-4 border rounded-md w-auto">
            {{ session('error') }}
        </div>
    @endif
    <div class="dark:bg-gray-800 p-8 px-6 w-full max-w-7xl space-y-6">
        <div class="flex items-center justify-center">
            <div class="bg-white dark:bg-gray-800 p-8 px-6 rounded-lg shadow-lg w-full max-w-10xl space-y-6">
                <div class="overflow-x-auto">
                    <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-6 text-center">Crear Empresa</h1>
                    <form class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6" action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex-1 mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="flex-1 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="flex-1 mb-3">
                            <label for="website" class="form-label">Website</label>
                            <input type="url" name="website" class="form-control">
                        </div>
                        <div class="flex-1 mb-3">
                            <label for="logo" class="form-label">Logo</label>
                            <input type="file" name="logo" class="form-control">
                        </div>
                        <div class="flex-1 mb-3">
                            <button type="submit" class="bg-green-100 text-green-600 py-2 px-4 border rounded-md w-auto">
                                Guardar
                            </button>
                            <a href="{{ route('companies.index') }}" class="btn btn-secondary">
                                <button type="button" class="bg-red-100 text-red-600 py-2 px-4 border rounded-md w-auto">
                                    Cancelar
                                </button>
                            </a>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
