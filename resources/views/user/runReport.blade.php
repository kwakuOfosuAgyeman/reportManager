<x-user-layout>
    @php
        $my_curl = curl_init();

        curl_setopt($my_curl, CURLOPT_URL, "http://localhost/curl_test/getInfo.php");
        curl_setopt($my_curl, CURLOPT_RETURNTRANSFER, 1);

        $return_str = curl_exec($my_curl);

        curl_close($my_curl);
        echo $return_str;
    @endphp

    @section('page-script')
    <script src="{{ asset('assets/bundles/apexcharts.bundle.js') }}"></script>
    <script src="{{ asset('assets/bundles/counterup.bundle.js') }}"></script>
    <script src="{{ asset('assets/bundles/knobjs.bundle.js') }}"></script>

    <script src="{{ asset('assets/js/core.js') }}"></script>
    <script src="{{ asset('assets/js/page/index.js') }}"></script>
    @stop

</x-user-layout>
