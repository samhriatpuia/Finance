<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form class="m-2 border" method="POST" action="{{ route('deposits.store') }}">
                    @csrf
                    @method('POST')
                    <div class="m-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="mb-3 ">
                                        <label class="form-label">Particulars</label>
                                        <input type="text" class="form-control" name="particulars">
                                        <div class="form-text">Enter particulars</div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="mb-3 ">
                                        <label class="form-label">Department Name</label>
                                        <input name="department" type="text" class="form-control" value="{{ $department->department_name }}">
                                        
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="mb-3 ">
                                        <label class="form-label">Challan Number</label>
                                        <input type="text" class="form-control" name="challan_number">
                                        <div class="form-text">Enter Challan Number</div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="mb-3 ">
                                        <label class="form-label">Creation Date</label>
                                        <input type="date" class="form-control" name="create_date">
                                        <div class="form-text">Enter Creation date</div>
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                        <div>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="mb-3 ml-2 mr-2">
                                        <label class="form-label">Challan Amount</label>
                                        <input type="text" class="form-control" name="challan_amount">
                                        <div class="form-text">Enter Challan Amount</div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    {{-- <div class="mb-3 ml-2 mr-2">
                                        <label class="form-label">Released Amount</label>
                                        <input type="text" class="form-control" name="release_amount"></textarea>
                                       
                                        <div class="form-text">Enter Release Amount</div>
                                    </div> --}}
                                </div>
                              
                            </div>
                        </div>
                       
                        <div>
                            {{-- <div class="row">
                                <div class="col-sm">
                                    <div class="mb-3 ml-2 mr-2">
                                        <label class="form-label">Release Date</label>
                                        <input type="date" class="form-control" name="release_date"></textarea>
                                       
                                        <div class="form-text">Enter Release Date</div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="mb-3 ml-2 mr-2">
                                        <label class="form-label">Balance</label>
                                        <input type="text" class="form-control" name="balance"></textarea>
                                       
                                        <div class="form-text">Enter Balance</div>
                                    </div>
                                </div>
                                
                            </div> --}}
                        </div>
                        
                        

                        
                       
                        

                        <input type="text" value="{{ $department->id }}" class="ml-2 mr-2" name="department_id"><br>
                        <button type="submit" class="btn btn-primary ml-2 mr-2">Submit</button>
                    </div>

                    
                    
                </form>
            </div>
        </div>
    </div>
</x-app-layout>