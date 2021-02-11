<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8" style="padding-top:100px">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form method="POST"   action="{{ route('departments.store') }}" class="m-5">
                   
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="exampleInputEmail1">Department Name</label>
                        <input type="text" class="form-control" name="department_name">
                        <small id="emailHelp" class="form-text text-muted">Enter department name and click 'Add Button'</small>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Abbreviation</label>
                        <input type="text" class="form-control" name="abbreviation">
                        <small id="emailHelp" class="form-text text-muted">Enter abbreviation and click 'Add Button'</small>
                    </div>
                    {{-- <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div> --}}
                    {{-- <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div> --}}
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
