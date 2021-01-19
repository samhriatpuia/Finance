<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form class="m-2 border">
                    <div class="m-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="mb-3 ">
                                        <label class="form-label">Date</label>
                                        <input type="text" class="form-control" aria-describedby="emailHelp">
                                        <div class="form-text">We'll never share your email with anyone else.</div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="mb-3 ">
                                        <label class="form-label">File Number</label>
                                        <input type="text" class="form-control" aria-describedby="emailHelp">
                                        <div id="emailHelp" class="form-text">Enter file number</div>
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="mb-3 ">
                                        <label class="form-label">Release Date</label>
                                        <input type="text" class="form-control" aria-describedby="emailHelp">
                                        <div id="emailHelp" class="form-text">Enter Release Date</div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="mb-3 ">
                                        <label class="form-label">Balance</label>
                                        <input type="text" class="form-control" aria-describedby="emailHelp">
                                        <div id="emailHelp" class="form-text">Enter Balance</div>
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                        
                        <div class="mb-3 ml-2 mr-2">
                            <label class="form-label">Misellinous</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">Enter Misellinous</div>
                        </div>
                        
                        <div class="mb-3 ml-2 mr-2">
                            <label class="form-label">Message</label>
                            <textarea class="form-control" style="height: 100px"></textarea>
                            {{-- <label for="floatingTextarea2">Message</label> --}}
                            <div id="emailHelp" class="form-text">Enter Message</div>
                        </div>
                        

                       
                        <input type="text" value="{{ $department->id }}" class="ml-2 mr-2"><br>
                        <button type="submit" class="btn btn-primary ml-2 mr-2">Submit</button>
                    </div>

                    
                    
                </form>
            </div>
        </div>
    </div>
</x-app-layout>