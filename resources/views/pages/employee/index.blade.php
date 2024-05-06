<x-layout>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Add Employee</div>
                    <div class="col-md-12 mt-5 d-flex" style="flex-wrap: wrap">
                        @foreach( $users as $user)
                            <div class="card col-md-4 mb-4" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Name: {{$user->name}}</h5>
                                    <p class="card-text">Email: {{$user->email}}</p>
                                    <form method="post"  action="{{route('employee.store', $user)}}" >
                                        @csrf
                                        <button type="submit" class="btn btn-success">Add</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>
