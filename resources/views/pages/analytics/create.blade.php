<x-layout>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Add Analytics</div>
                    <x-form
                        offer=""
                        geo=""
                        vertical=""
                        expenses=""
                        income=""
                        source=""
                        route="{{ route('analytics.store') }}"
                        buttonText="Add analytics"
                        method="POST"
                    />
                </div>
            </div>
        </div>
    </div>

</x-layout>
