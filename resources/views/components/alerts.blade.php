@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="my-2 p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 " role="alert">
            {{ $error }}
        </div>
    @endforeach
@endif

@if (session()->has('message'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 " role="alert">
        {{ session('message') }}
    </div>
@endif
