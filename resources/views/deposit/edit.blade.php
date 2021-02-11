<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form class="m-2 border" method="POST" action="{{ route('deposits.update',$deposit->id) }}">
                    @csrf
                    @method('PATCH')
                    <div class="m-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="mb-3 ">
                                        <label class="form-label">Particulars</label>
                                        <input type="text" class="form-control" name="particulars" value="{{ $deposit->particulars }}">
                                        <div class="form-text">Enter particulars</div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="mb-3 ">
                                        <label class="form-label">Department Name</label>
                                        <input name="department" type="text" class="form-control" value="{{ $deposit->department  }}">
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="mb-3 ">
                                        <label class="form-label">Challan Date</label>
                                        <input type="date" class="form-control" name="create_date" value="{{ $deposit->create_date }}">
                                        <div class="form-text">Enter Challan Date</div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="mb-3 ">
                                        <label class="form-label">Challan number</label>
                                        <input type="text" class="form-control" name="challan_number" value="{{ $deposit->challan_number }}">
                                        <div class="form-text">Enter Challan number</div>
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="mb-3 ">
                                        <label class="form-label">Challan Amount</label>
                                        <input type="text" class="form-control" name="challan_amount" value="{{ $deposit->challan_amount }}">
                                        <div class="form-text">Enter Challan Amount</div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="mb-3 ">
                                        <label class="form-label">Withdrawn amount</label>
                                        <input type="text" class="form-control" name="withdrawn_amount" value="{{ $deposit->withdrawn_amount }}">
                                        <div class="form-text">Enter withdrawn amount</div>
                                    </div>
                                </div>
                              
                                <div class="col-sm">
                                    <div class="mb-3 ">
                                        <label class="form-label">Balance</label>
                                        <input type="text" class="form-control" name="balance" value="{{ $deposit->balance }}">
                                        <div class="form-text">Enter Balance</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        

                       
                        <input type="text" value="{{ $deposit->department_id }}" class="ml-2 mr-2" name="department_id"><br>
                        <button type="submit" class="btn btn-primary ml-2 mr-2">Submit</button>
                    </div>

                    
                    
                </form>
            </div>
        </div>
    </div>
</x-app-layout>