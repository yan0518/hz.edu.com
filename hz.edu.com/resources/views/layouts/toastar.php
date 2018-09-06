@section('toastr')
    {!! Toastr::render() !!}
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/toastr.min.js') }}"></script>
@stop