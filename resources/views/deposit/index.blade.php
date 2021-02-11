<x-app-layout>
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8" style="padding-top:20px">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div style="display: flex;justify-content: space-between">
                    <h3 class="ml-4 mt-3" style="color: rgba(59, 130, 246, 0.5)">{{ $department->department_name}}</h3>
                    <a class="btn btn-primary btn-sm mb-3 float-right mt-3 mr-2" href="{{ route('deposits.maincreate',$department->id) }}">New Transaction</a>
                </div>
                
                <table class="table-fixed table-bordered m-3 container-fluid ">
                    <thead>
                        <tr>
                            <th>Particulars</th>
                            <th>Department</th>
                            <th>Challan No</th>
                            <th>Date</th>
                            <th>Challan Amount</th>
                            <th>Withdrawn amount</th>
                            <th>Balance</th>
                            <th class="ml-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($deposits as $deposit)
                            <tr>
                                <td scope="row">{{ $deposit->particulars }}</td>
                                <td><div class="ml-1" style="font-size:15px">{{ $deposit->department }}</td>
                                <td style="font-size:15px">{{ $deposit->challan_number }}</div></td>
                                <td style="font-size:15px">{{ $deposit->create_date }}</td>
                                <td>
                                    <div class="ml-1">{{ $deposit->challan_amount }}</div>
                                </td>
                                <td>
                                    <div class="ml-1">{{ $deposit->withdrawn_amount }}</div>
                                </td>
                                
                                <td>{{ $deposit->balance }}</td>
                                <td style="display: flex; justify-content:start">
                                    <div>
                                        <a class="btn btn-outline-success btn-sm mt-2" href="{{ route('deposits.edit',$deposit->id) }}"> 
                                            <i class="fas fa-pen-square fa-lg float-center icon_at_center" ></i>
                                        </a>
                                    </div>
                                    <div>
                                        <form action="{{ route('deposits.destroy',$deposit->id) }}" method="POST" class="ml-2 mt-2">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-calendar-times fa-lg icon_at_center">
                                                </i>
                                            </button>
                                        </form>
                                    </div>
                                    <div>
                                        <a type="button" class="btn btn-outline-primary btn-sm mt-2 ml-2" href="{{ route('withdraws.main',$deposit->id) }}">
                                           <i class="fas fa-rupee-sign fa-lg icon_at_center"></i>
                                          
                                        </a>
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
