<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container mt-3 mb-5">
                    <a class="btn btn-primary btn-sm mb-3 float-right" href="{{ route('departments.create') }}">New Department</a>
                    <table class="table table-hover table-bordered align-middle">
                        <thead>
                          <tr>
                            <th scope="col">SI</th>
                            <th scope="col">Department Name</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($departments as $department)
                            <tr>
                                <th scope="row">{{ $department->id }}</th>
                                <td>{{ $department->department_name }}</td>
                                <td>
                                    <button type="button" class="btn btn-outline-success btn-sm "> <i class="fas fa-pen-square mr-2 fa-lg float-center icon_at_center" ></i></button>
                                    <button type="button" class="btn btn-outline-danger btn-sm"> <i class="fas fa-calendar-times mr-2 fa-lg icon_at_center"></i></button>
                                    <button type="button" class="btn btn-outline-primary btn-sm"><i class="fas fa-location-arrow fa-lg icon_at_center" style="padding-right:7px"></i></button>
                                </td>
                               
                                   
                                    
                            </tr>
                            @endforeach
                            
                          
                          
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
<style>
    .icon_at_center{
        padding-left:7px;
        padding-top:7px;
    }
</style>