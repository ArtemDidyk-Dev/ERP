<form method="POST" class="p-4" action="{{ $route  }}">
    @method($method)
    @csrf
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputOffer">Offer</label>
            <input required type="text" class="form-control" id="inputOffer" placeholder="Offer" name="offer" value="{{$offer}}">
        </div>
        <div class="form-group col-md-4">
            <label for="inputGeo">Geo</label>
            <input type="text" name="geo" class="form-control" id="inputGeo" placeholder="Geo" value="{{$geo}}">
        </div>

        <div class="form-group col-md-4">
            <label for="inputVertical">Vertical</label>
            <input type="text" name="vertical" class="form-control" id="inputVertical" placeholder="Vertical" value="{{$vertical}}">
        </div>

    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputExpenses">Expenses</label>

            <input type="number" step="0.01" name="expenses" class="form-control" id="inputIncome" placeholder="500.00"
                   value="{{$expenses}}">

        </div>
        <div class="form-group col-md-4">
            <label for="inputIncome">Income</label>
            <input type="number"  step="0.01"  name="income" class="form-control" id="inputIncome" placeholder="1500.00"
                   value="{{$income}}"}>

        </div>
        <div class="form-group col-md-4">
            <label for="inputSource">Source</label>
            <input required type="text" class="form-control" id="inputSource" placeholder="Source" name="source" value="{{$source}}">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">{{$buttonText}}</button>

</form>
@if ($errors->any())
    <div class="alert alert-danger mt-2 ml-4 mr-4" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
