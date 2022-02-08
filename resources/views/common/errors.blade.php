
@if ($errors->any())
    <div class="alert alert-danger">
        <p>Sorry, you have errors</p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif