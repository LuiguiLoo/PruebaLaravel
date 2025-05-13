<x-app-layout>
    <x-slot name="header">
        <div class="max-w-10xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Empleados
            </h2>
            </div>
        </div>
    </x-slot>
    <div class="dark:bg-gray-800 p-8 px-6 w-full max-w-7xl space-y-6">
        <div class="flex items-center justify-center">
            <div class="bg-white dark:bg-gray-800 p-8 px-6 rounded-lg shadow-lg w-full max-w-10xl space-y-6">
                <div class="overflow-x-auto">
                    <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-6 text-center">Editar Empleado: {{ $employee->first_name }} {{ $employee->last_name }}</h1>
                    <form class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6" action="{{ route('employees.update', $employee) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="flex-1 mb-3">
                            <label for="first_name" class="form-label">Nombre</label>
                            <input type="text" name="first_name" class="form-control" value="{{ $employee->first_name }}" required>
                        </div>

                        <div class="flex-1 mb-3">
                            <label for="last_name" class="form-label">Apellido</label>
                            <input type="text" name="last_name" class="form-control" value="{{ $employee->last_name }}" required>
                        </div>
                        
                        <div class="flex-1 mb-3">
                            <label for="company_id" class="form-label">Empresa</label>
                            <select name="company_id" class="form-control">
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}" {{ $employee->company_id == $company->id ? 'selected' : '' }}>
                                        {{ $company->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="flex-1 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $employee->email }}" required>
                        </div>

                        <div class="flex-1 mb-3">
                            <label for="phone" class="form-label">Teléfono</label>
                            <input type="text" name="phone" class="form-control" value="{{ $employee->phone }}">
                        </div>

                        <div class="flex-1">
                            <button type="submit" class="bg-green-100 text-green-600 py-2 px-4 border rounded-md w-auto">
                                Actualizar
                            </button>
                            <a href="{{ route('employees.index') }}" class="btn btn-secondary">
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
