
<!--begin::Footer-->
<div class="footer py-4 d-flex flex-lg-column fixed-bottom" id="kt_footer">
    <!--begin::Container-->
    <div
        class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-center">
        <!--begin::Copyright-->
        <div class="text-dark order-2 order-md-1 px-15">
            <span id="copyright" class="text-muted fw-bold me-1"></span>
            <a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">Alustadh</a>
        </div>
        <!--end::Copyright-->
        <!--begin::Menu-->
        <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
            <li class="menu-item">
                <a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
            </li>
            <li class="menu-item">
                <a href="https://keenthemes.com/support" target="_blank"
                   class="menu-link px-2">Support</a>
            </li>
            <li class="menu-item">
                <a href="https://1.envato.market/EA4JP" target="_blank"
                   class="menu-link px-2">Purchase</a>
            </li>
        </ul>
        <!--end::Menu-->
    </div>
    <!--end::Container-->
</div>
<!--end::Footer-->
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var year = new Date().getFullYear();
            document.getElementById('copyright').innerText = 'copyrights ' + year + '©';
        });
    </script>
@endsection
