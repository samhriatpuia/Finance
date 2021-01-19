<x-app-layout>
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8" style="padding-top:20px">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h3 class="ml-4 mt-3" style="color: rgba(59, 130, 246, 0.5)">{{ $department->department_name}}</h3>
                <table class="table-fixed table-bordered m-3 container-fluid">
                    <thead>
                        <tr>
                            <th>File No</th>
                            <th>Misc</th>
                            <th>Entry Date</th>
                            <th>Release Date</th>
                            <th class="w-3/6">Detail</th>
                            <th>Balance</th>
                            <th class="ml-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($deposits as $deposit)
                            <tr>
                                <td scope="row">{{ $deposit->file_number }}</td>
                                <td><div class="ml-1" style="font-size:15px">{{ $deposit->misc }}</td>
                                <td style="font-size:15px">{{ $deposit->date }}</div></td>
                                <td style="font-size:15px">{{ $deposit->release_date }}</td>
                                <td>
                                    <small>  
                                        <div class="ml-1">{{ $deposit->message }}</div>
                                    </small>
                                </td>
                                <td>{{ $deposit->balance }}</td>
                                <td style="display: flex; justify-content:start">
                                    <div>
                                        <a class="btn btn-outline-success btn-sm mt-2" href="{{ route('departments.edit',$department->id) }}"> 
                                            <i class="fas fa-pen-square fa-lg float-center icon_at_center" ></i>
                                        </a>
                                    </div>
                                    <div>
                                        <form action="{{ route('departments.destroy',$department->id) }}" method="POST" class="ml-2 mt-2">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-calendar-times fa-lg icon_at_center">
                                                </i>
                                            </button>
                                        </form>
                                    </div>
                                </td>    
                            </tr>
                            @endforeach
                        </tr>
                      
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</x-app-layout>
