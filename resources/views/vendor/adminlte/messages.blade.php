
@if(count($errors->all()) > 0)
    <div class="alert alert-danger message">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session()->has('success'))
    <div class="alert alert-success message">
        <h2>{{ session('success') }}</h2>
    </div>
@endif

@if(session()->has('error'))
    <div class="alert alert-danger message">
        <h2>{{ session('error') }}</h2>
    </div>
@endif

@push('js')
    <script type="text/javascript">
        $(function () {
            $('.message').fadeOut(3000);
        })

    </script>
@endpush