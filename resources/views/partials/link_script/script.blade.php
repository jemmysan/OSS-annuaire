

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Sparkline -->
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>

<!--
<script LANGUAGE="JavaScript">
    //variable qui permet d'identifier le timer afin de pouvoir l'arrêter
    var timerID = null;
    var timerActif = false;

    if(document.images){
        chiffre = new Array(10);
        chiffre[0] = new Image(); chiffre[0].src = "images/r0.gif";
        chiffre[1] = new Image(); chiffre[1].src = "images/r1.gif";
        chiffre[2] = new Image(); chiffre[2].src = "images/r2.gif";
        chiffre[3] = new Image(); chiffre[3].src = "images/r3.gif";
        chiffre[4] = new Image(); chiffre[4].src = "images/r4.gif";
        chiffre[5] = new Image(); chiffre[5].src = "images/r5.gif";
        chiffre[6] = new Image(); chiffre[6].src = "images/r6.gif";
        chiffre[7] = new Image(); chiffre[7].src = "images/r7.gif";
        chiffre[8] = new Image(); chiffre[8].src = "images/r8.gif";
        chiffre[9] = new Image(); chiffre[9].src = "images/r9.gif";
        Blanc = new Image(); Blanc.src = "images/rblanc.gif";
    }
    function stopClock() {
        if (timerActif) clearTimeout(timerID);
        timerActif = false;
    }

    function startClock() {
        stopClock();
        showtime();
    }

    function showtime() {
        var now = new Date();
        var hour = now.getHours();
        var min = now.getMinutes();
        var sec = now.getSeconds();

        affiche(hour,0);
        affiche(min,3);
        affiche(sec,6);
        timerID = setTimeout("showtime()",1000);
        timerActif = true;
    }

    function affiche(nombre, rang) {
        var unites = nombre % 10
        var dizaines = Math.floor(nombre / 10)
        document.images[rang+1].src = chiffre[unites].src;
        if (dizaines == 0 && rang == 0)
            document.images[rang].src = Blanc.src;
        else
            document.images[rang].src = chiffre[dizaines].src ;
    }
    //&ndash;&gt;
</script>
-->
