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
    });</script>

<!--<script>
    $(document).ready(function() {
    $('.selectGeneros').select2({
    placeholder: 'Selecciona Géneros',
            allowClear: true,
            width: '100%'  // Ajusta el ancho para que se adapte al contenedor
    });
    // Forzar recalculación del ancho en eventos específicos
    $(window).on('resize', function() {
    $('.selectGeneros').select2('destroy').select2({
    placeholder: 'Selecciona Géneros',
            allowClear: true,
            width: '100%',
    });
    });
    });</script>-->

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const timePicker = document.querySelector('.time-picker');
    const timeDropdown = document.getElementById('timeDropdown');
    const times = [];
    for (let hour = 0; hour < 24; hour++) {
    for (let minute = 0; minute < 60; minute += 30) {
    let h = hour < 10 ? '0' + hour : hour;
    let m = minute < 10 ? '0' + minute : minute;
    times.push(${h}:${m});
    }
    }

    times.forEach(time => {
    const timeOption = document.createElement('div');
    timeOption.textContent = time;
    timeOption.addEventListener('click', function() {
    timePicker.value = time;
    timeDropdown.style.display = 'none';
    });
    timeDropdown.appendChild(timeOption);
    });
    timePicker.addEventListener('focus', function() {
    timeDropdown.style.display = 'block';
    });
    document.addEventListener('click', function(event) {
    if (!event.target.closest('.time-picker-container')) {
    timeDropdown.style.display = 'none';
    }
    });
    });</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>