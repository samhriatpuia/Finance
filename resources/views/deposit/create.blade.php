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
                                        <input type="text" class="form-control form-control{{($errors->first('particulars') ? 'is-dangerous' : '')}}" name="particulars">
                                        <div class="form-text">Enter particulars</div>
                                        <p class="help" style="color:red">{{ $errors->first('particulars') }}</p>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="mb-3 ">
                                        <label class="form-label">Department Name</label>
                                        <input name="department" type="text" class="form-control form-control{{($errors->first('department_name') ? 'is-dangerous' : '')}}" value="{{ $department->department_name }}">
                                        <div class="form-text">Department Name</div>
                                        <p class="help" style="color:red">{{ $errors->first('department_name') }}</p>
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="mb-3 ">
                                        <label class="form-label">Challan Number</label>
                                        <input type="text" class="form-control form-control{{($errors->first('challan_number') ? 'is-dangerous' : '')}}" name="challan_number">
                                        <div class="form-text">Enter Challan Number</div>
                                        <p class="help" style="color:red">{{ $errors->first('challan_number') }}</p>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="mb-3 ">
                                        <label class="form-label">Creation Date</label>
                                        <input type="date" class="form-control form-control{{($errors->first('create_date') ? 'is-dangerous' : '')}}" name="create_date">
                                        <div class="form-text">Enter Creation date</div>
                                        <p class="help" style="color:red">{{ $errors->first('create_date') }}</p>
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                        <div>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="mb-3 ml-2 mr-2">
                                        <label class="form-label">Challan Amount</label>
                                        <input type="text" class="form-control form-control{{($errors->first('challan_amount') ? 'is-dangerous' : '')}}" name="challan_amount" id="CA" onkeyup="sum();">
                                        <div class="form-text">Enter Challan Amount</div>
                                        <p class="help" style="color:red">{{ $errors->first('challan_amount') }}</p>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="mb-3 ml-2 mr-2">
                                        <label class="form-label">Withdrawn Amount</label>
                                        <input type="text" class="form-control form-control{{($errors->first('withdrawn_amount') ? 'is-dangerous' : '')}}" name="withdrawn_amount" value='0'></textarea>
                                        <div class="form-text">Enter Withdrawn Amount</div>
                                        <p class="help" style="color:red">{{ $errors->first('withdrawn_amount') }}</p>
                                    </div>
                                </div>

                                <div class="col-sm">
                                    <div class="mb-3 ml-2 mr-2">
                                        <label class="form-label">Balance</label>
                                        <input type="text" class="form-control form-control{{($errors->first('balance') ? 'is-dangerous' : '')}}" name="balance" id="balance"></textarea>
                                        <div class="form-text">Enter Balance</div>
                                        <p class="help" style="color:red">{{ $errors->first('balance') }}</p>
                                    </div>
                                </div>
                              
                                <script>
                                    function sum() {
                                        var txtFirstNumberValue = document.getElementById('CA').value;
                                        
                                        var result = parseInt(txtFirstNumberValue);
                                        if (!isNaN(result)) {
                                            document.getElementById('balance').value = result;
                                        }
                                    }
                                </script>
                            </div>
                        </div>
                       
                       
                        
                        

                        
                       
                        

                        <input type="text" value="{{ $department->id }}" class="ml-2 mr-2" name="department_id"><br>
                        <button type="submit" class="btn btn-primary ml-2 mr-2">Submit</button>
                    </div>

                    
                    
                </form>
            </div>
        </div>
    </div>
</x-app-layout>