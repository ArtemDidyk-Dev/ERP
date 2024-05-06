<x-layout>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Analytics {{$user->name}} | {{$role}}</div>
                </div>

            </div>

            <div class="col-md-12 mt-5 d-flex" style="flex-wrap: wrap">

                @foreach( $statistics as $item)

                    <div class="card col-md-3 " style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Offer: {{$item->offer}}</h5>
                            <p class="card-text">Geo: {{$item->geo}}</p>
                            <p class="card-text">Income: {{$item->income}}$</p>
                            <p class="card-text">Expenses: {{$item->expenses}}$</p>
                            <p class="card-text">Source: {{$item->source}}</p>
                            <p class="card-text">Vertical: {{$item->vertical}}</p>
                            <p class="card-text">Roi: {{$item->roi}}%</p>
                            <a href="{{route('analytics.edit', $item->id)}}" class="card-link">Update offer</a>
                            <form method="post" action="{{ route('analytics.destroy', $item->id) }}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger mt-3">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            @if($userStatistics)
                <div class="col-md-12 mt-5 d-flex" style="flex-wrap: wrap">
                    <h2>Employee statistics</h2>
                    @foreach($userStatistics as $user)
                        <div class="card col-md-12 mb-12 mt-2" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Name: {{$user->name}}</h5>
                                <p class="card-text">Email: {{$user->email}}</p>
                                <p class="card-text">Position: {{$user->roles->first()->name}}</p>
                            </div>
                        </div>
                        @foreach($user->analytics as $item)
                            <div class="card col-md-3 mt-2" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Offer: {{$item->offer}}</h5>
                                    <p class="card-text">Geo: {{$item->geo}}</p>
                                    <p class="card-text">Income: {{$item->income}}$</p>
                                    <p class="card-text">Expenses: {{$item->expenses}}$</p>
                                    <p class="card-text">Source: {{$item->source}}</p>
                                    <p class="card-text">Vertical: {{$item->vertical}}</p>
                                    <p class="card-text">Roi: {{$item->roi}}%</p>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            @endif

        </div>
    </div>

</x-layout>
