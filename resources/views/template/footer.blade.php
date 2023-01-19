<footer>
    <div class="pull-right">
        Abude Group 2022
    </div>
    <div class="clearfix"></div>
</footer>
</div>
</div>

<script src="{{ asset('assets') }}/vendors/jquery/dist/jquery.min.js"></script>

<script src="{{ asset('assets') }}/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<script src="{{ asset('assets') }}/vendors/fastclick/lib/fastclick.js"></script>

<script src="{{ asset('assets') }}/vendors/nprogress/nprogress.js"></script>

<script src="{{ asset('assets') }}/vendors/Chart.js/dist/Chart.min.js"></script>

<script src="{{ asset('assets') }}/vendors/gauge.js/dist/gauge.min.js"></script>

<script src="{{ asset('assets') }}/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>

<script src="{{ asset('assets') }}/vendors/iCheck/icheck.min.js"></script>

<script src="{{ asset('assets') }}/vendors/skycons/skycons.js"></script>

<script src="{{ asset('assets') }}/vendors/Flot/jquery.flot.js"></script>
<script src="{{ asset('assets') }}/vendors/Flot/jquery.flot.pie.js"></script>
<script src="{{ asset('assets') }}/vendors/Flot/jquery.flot.time.js"></script>
<script src="{{ asset('assets') }}/vendors/Flot/jquery.flot.stack.js"></script>
<script src="{{ asset('assets') }}/vendors/Flot/jquery.flot.resize.js"></script>

<script src="{{ asset('assets') }}/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="{{ asset('assets') }}/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="{{ asset('assets') }}/vendors/flot.curvedlines/curvedLines.js"></script>

<script src="{{ asset('assets') }}/vendors/DateJS/build/date.js"></script>

<script src="{{ asset('assets') }}/vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="{{ asset('assets') }}/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="{{ asset('assets') }}/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>

<script src="{{ asset('assets') }}/vendors/moment/min/moment.min.js"></script>
<script src="{{ asset('assets') }}/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<script src="{{ asset('assets') }}/build/js/custom.min.js"></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194"
    integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw=="
    data-cf-beacon='{"rayId":"71a2af78eac50635","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2021.12.0","si":100}'
    crossorigin="anonymous"></script>
<script src="{{ asset('assets') }}/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets') }}/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="{{ asset('assets') }}/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('assets') }}/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="{{ asset('assets') }}/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="{{ asset('assets') }}/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('assets') }}/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('assets') }}/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="{{ asset('assets') }}/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="{{ asset('assets') }}/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('assets') }}/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="{{ asset('assets') }}/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (Session::get('sukses'))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: "{{ Session::get('sukses') }}",
            showConfirmButton: false,
            width: 500,
            height: 200,
            timer: 2500
        })
    </script>
@elseif(Session::get('sukses'))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: "{{ Session::get('sukses') }}",
            showConfirmButton: false,
            width: 500,
            height: 200,
            timer: 2500
        })
    </script>
@endif
<script>
    $('#table').DataTable();
</script>
@yield('script')
</body>

</html>
