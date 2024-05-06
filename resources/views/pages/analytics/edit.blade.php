<x-layout>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Update Analytics</div>

                    <x-form
                        offer="{{$analytics->offer}}"
                        geo="{{$analytics->geo}}"
                        vertical="{{$analytics->vertical}}"
                        expenses="{{$analytics->expenses}}"
                        income="{{$analytics->income}}"
                        source="{{$analytics->source}}"
                        route="{{ route('analytics.update', $analytics->id) }}"
                        buttonText="Update"
                        method="PUT"
                    />
                </div>
            </div>
        </div>
    </div>

</x-layout>
