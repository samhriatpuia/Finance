<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="pl-3 pr-3 mt-3 mb-5">
                    <div class="grid grid-cols-3 gap-4">
                        <div class="...">
                            <!--Card 1-->
                            <div class="max-w-lg rounded overflow-hidden shadow-lg">
                                
                                <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">{{ $deposit->particulars }}</div>
                                <p class="text-gray-700 text-base">
                                    <div class="grid grid-cols-6 gap-4">
                                       
                                        <div class="col-start-1 col-end-5 ...">Department</div>
                                        <div class="col-start-7 col-span-5 ...">{{ $deposit->department }}</div>
                                        <div class="col-start-1 col-end-5 ...">Challan No.</div>
                                        <div class="col-start-7 col-span-5 ...">{{ $deposit->challan_number }}</div>

                                        <div class="col-start-1 col-end-5 ...">Date</div>
                                        <div class="col-start-7 col-span-5 ...">{{ $deposit->create_date }}</div>
                                        <div class="col-start-1 col-end-5 ...">Challan amount</div>
                                        <div class="col-start-7 col-span-5 ...">{{ $deposit->challan_amount }}</div>

                                        <div class="col-start-1 col-end-5 ...">Withdrawn Amount</div>
                                        <div class="col-start-7 col-span-5 ...">{{ $deposit->withdrawn_amount }}</div>
                                        
                                        <div class="col-start-1 col-end-5 ...">Balance</div>
                                        <div class="col-start-7 col-span-5 ...">{{ $deposit->balance }}</div>
                                    </div>
                                </p>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-span-2 ...">
                            <a class="btn btn-primary btn-sm mb-3 float-right" href="{{ route('withdraws.main.create',$deposit->id) }}">Withdraw</a>
                            <table class="table table-hover table-bordered align-middle">
                                <thead>
                                    <tr>
                                        <th>SI</th>
                                        <th class="w-1/4">Release Memo</th>
                                        <th class="w-1/4">Release Amount</th>
                                        <th class="w-1/4">Release Date</th>
                                       
                                        <th class="w-1/4">Balance</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($withdraws as $withdraw)
                                    <tr>
                                        <th scope="row">{{ $withdraw->id }}</th>
                                        <td>{{ $withdraw->release_memo }}</td>
                                        <td>{{ $withdraw->release_amount }}</td>
                                        <td>{{ $withdraw->release_date }}</td>
                                       
                                        <td>{{ $withdraw->balance }}</td>
                                        <td >
                                            <div class="grid grid-flow-col md:grid-flow-col">
                                                <div class="...">
                                                    <a type="button" class="btn btn-outline-success btn-sm" href="{{ route('withdraws.edit',$withdraw->id) }}"> 
                                                        <i class="fas fa-pen-square " ></i>
                                                    </a>
                                                </div>
                                                <div class="...">
                                                    <form action="{{ route('withdraws.destroy',$withdraw->id) }}" method="POST" class="ml-2 mr-2">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure?')">
                                                        <i class="fas fa-calendar-times">
                                                        </i>
                                                    </button>
                                                    </form>
                                                   
                                                </div>
                                                <div>
                                                    <a type="button" class="btn btn-outline-success btn-sm" href="{{ route('withdraws.word',$withdraw->id) }}"> 
                                                        <i class="far fa-file-word" > </i>
                                                    </a>
                                                </div>
                                               
                                            </div>
                                            
                                        
                                            
                                            
                                           
                                        </td>
                                    
                                        
                                            
                                    </tr>
                                    @endforeach
                                    
                                
                                
                                </tbody>
                            </table>
                        </div>
                    </div>    
                    
                </div>  
                
            </div>
        </div>
    </div>
</x-app-layout>
