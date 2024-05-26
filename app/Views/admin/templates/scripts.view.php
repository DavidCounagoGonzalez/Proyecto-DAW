<!--   Core JS Files   -->
<script src="/assets/js/core/jquery.min.js"></script>
<script src="/assets/js/core/popper.min.js"></script>
<script src="/assets/js/core/bootstrap.min.js"></script>
<script src="/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Google Maps Plugin    -->
<!-- Place this tag in your head or just before your close body tag. -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chart JS -->
<script src="/assets/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="/assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
<script src="/assets/js/black-dashboard.min.js?v=1.0.0"></script>
<script>
    $(document).ready(function() {
    // Javascript method's body can be found in assets/js/demos.js
    demo.initDashboardPageCharts();
    });</script>
<script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
<script>
    window.TrackJS &&
            TrackJS.install({
            token: "ee6fab19c5a04ac1a32a645abde4613a",
                    application: "black-dashboard-free"
            });</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
    $('.selectGeneros').select2({
    allowClear: true,
            width: '100%'  // Ajusta el ancho para que se adapte al contenedor
    });
    // Inicializar Select2 para el select individual
    $('.selectCustom').select2({
            width: '100%'  // Ajusta el ancho para que se adapte al contenedor
    });
    // Ocultar la barra de búsqueda en el select individual
    $('.selectCustom').on('select2:open', function() {
    $(this).next('.select2-container').next('.select2-dropdown').find('.select2-search').hide();
    });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        // Espera a que el DOM esté completamente cargado
        document.addEventListener('DOMContentLoaded', function() {
            // Inicializa flatpickr en el input
            flatpickr("input[type=time]", {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true,
                onReady: function(selectedDates, dateStr, instance) {
                    instance.input.removeAttribute("readonly");
                } 
            });
        });
    </script>

