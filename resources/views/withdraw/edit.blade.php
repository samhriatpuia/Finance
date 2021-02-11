<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form class="m-2 border" method="POST" action="{{ route('withdraws.update',$withdraw->id) }}">
                    @csrf
                    @method('PATCH')
                    <div class="m-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="mb-3 ">
                                        <label class="form-label">Release Memo</label>
                                        <input type="text" class="form-control form-control{{($errors->first('release_memo') ? 'is-dangerous' : '')}}" name="release_memo" value="{{ $withdraw->release_memo }}">
                                        <div class="form-text">Enter release memo</div>
                                        <p class="help" style="color:red">{{ $errors->first('release_memo') }}</p>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="mb-3 ">
                                        <label class="form-label">Release Amount</label>
                                        <input type="text" class="form-control form-control{{($errors->first('release_amount') ? 'is-dangerous' : '')}}" id="RA" name="release_amount" onkeyup="sum();" value="{{ $withdraw->release_amount }}">
                                        <div class="form-text">Enter release amount</div>
                                        <p class="help" style="color:red">{{ $errors->first('release_amount') }}</p>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="mb-3 ">
                                        <label class="form-label">Release Date</label>
                                        <input type="date" class="form-control form-control{{($errors->first('release_date') ? 'is-dangerous' : '')}}" name="release_date" value="{{ $withdraw->release_date }}">
                                        <div class="form-text">Enter release date</div>
                                        <p class="help" style="color:red">{{ $errors->first('release_date') }}</p>
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="mb-3 ">
                                        <label class="form-label">Challan Remaining</label>
                                        <input type="text" class="form-control form-control{{($errors->first('challan_amount') ? 'is-dangerous' : '')}}" id="CA" name="challan_amount" value={{ $deposit->challan_amount }} >
                                        <div class="form-text">Challan Remaining</div>
                                        <p class="help" style="color:red">{{ $errors->first('challan_amount') }}</p>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="mb-3 ">
                                        <label class="form-label">Balance</label>
                                        <input type="text" class="form-control form-control{{($errors->first('balance') ? 'is-dangerous' : '')}}" id="BA" name="balance" required value={{ $withdraw->balance }}>
                                        <p class="help" style="color:red">{{ $errors->first('challan_amount') }}</p>
                                       
                                    </div>
                                    <script>
                                        function sum() {
                                            var txtFirstNumberValue = document.getElementById('CA').value;
                                            var txtSecondNumberValue = document.getElementById('RA').value;
                                            var result = parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue);
                                            if (!isNaN(result)) {
                                                document.getElementById('BA').value = result;
                                            }
                                        }
                                    </script>
                                </div>
                              
                            </div>
                        </div>
                        
                       
                       
                        
                        

                        
                       
                        
                        
                        <input type="text" value="{{ $deposit->id }}" class="ml-2 mr-2" name="deposit_id"><br>
                        <button type="submit" class="btn btn-primary ml-2 mr-2">Submit</button>
                    </div>

                    
                    
                </form>
            </div>
        </div>
    </div>
</x-app-layout>