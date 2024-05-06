<div>
    <p><a class="link-opacity-10-hover" href="{{route('analytics.create')}}">Add statistics</a></p>
    <p><a class="link-opacity-10-hover" href="{{route('analytics.index')}}">View statistics</a></p>
    @if($addUsers)
        <p><a class="link-opacity-10-hover" href="{{route('employee.index')}}">Add an employee</a></p>
    @endif
</div>
