<x-app-layout>
    <x-slot name="header">
        <div class="max-w-10xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Empleados
            </h2>
            <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">
                <button class="bg-green-100 text-green-600 py-2 px-4 border rounded-md w-auto">
                    Nuevo Empleado
                </button>
            </a>
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

    
    <div class="bg-gray-100 dark:bg-gray-900">
        <div class="flex items-center justify-center">
            <div class="bg-white dark:bg-gray-800 p-8 px-6 rounded-lg shadow-lg w-full max-w-10xl space-y-6">
                <div class="overflow-x-auto">
                    <table class="min-w-full w-full table-auto text-left">
                        <!-- Encabezado -->
                        <thead class="bg-gray-200 dark:bg-gray-700">
                            <tr>
                                <th class="py-2 px-4 text-sm font-medium text-gray-900 dark:text-gray-100">Nombre</th>
                                <th class="py-2 px-4 text-sm font-medium text-gray-900 dark:text-gray-100">Apellido</th>
                                <th class="py-2 px-4 text-sm font-medium text-gray-900 dark:text-gray-100">Empresa</th>
                                <th class="py-2 px-4 text-sm font-medium text-gray-900 dark:text-gray-100">Email</th>
                                <th class="py-2 px-4 text-sm font-medium text-gray-900 dark:text-gray-100">Teléfono</th>
                                <th class="py-2 px-4 text-sm font-medium text-gray-900 dark:text-gray-100">Ver</th>
                                <th class="py-2 px-4 text-sm font-medium text-gray-900 dark:text-gray-100">Editar</th>
                                <th class="py-2 px-4 text-sm font-medium text-gray-900 dark:text-gray-100">Eliminar</th>
                            </tr>
                        </thead>

                        <!-- Cuerpo de la tabla -->
                        <tbody>
                            @foreach($employees as $employee)
                            <tr>
                                <td class="py-3 px-4 text-sm text-gray-700 dark:text-gray-100">{{ $employee->first_name }}</td>
                                <td class="py-3 px-4 text-sm text-gray-700 dark:text-gray-100">{{ $employee->last_name }}</td>
                                <td class="py-3 px-4 text-sm text-gray-700 dark:text-gray-100">{{ $employee->company->name }}</td>
                                <td class="py-3 px-4 text-sm text-gray-700 dark:text-gray-100">{{ $employee->email }}</td>
                                <td class="py-3 px-4 text-sm text-gray-700 dark:text-gray-100">{{ $employee->phone }}</td>
                                <td class="py-3 px-4 text-sm text-gray-700 dark:text-gray-100"><a href="{{ route('employees.show', $employee) }}" class="btn btn-info">Ver</a></td>
                                <td class="py-3 px-4 text-sm text-gray-700 dark:text-gray-100"><a href="{{ route('employees.edit', $employee) }}" class="btn btn-warning">Editar</a></td>
                                <td class="py-3 px-4 text-sm text-gray-700 dark:text-gray-100"><form action="{{ route('employees.destroy', $employee) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <div class="pagination">
                    {{ $employees->links() }}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>