@include('template.header')
<body>
    @include('sweetalert::alert')
<div class="container mt-5">
    <h2>@yield('judul')</h2>
    <p>Nama : M Wahyu Adi Nugroho</p>
    @if ($errors->any())
    <div class="alert alert-danger mb-3 mt-3">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @yield('content')
</div>
@yield('scripts')
@include('template.js')
