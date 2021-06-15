<?php
session_start();
session_status();
if(isset($_SESSION['mensagem'])){
    echo 'cheguei';?>
    <script src="assets/js/jquery-3.1.1.min.js"></script>
    <link href="assets/css/toastr.min.css" rel="stylesheet"/>
    <script src="assets/js/toastr.min.js"></script>
    <script>

        toastr["success"]("Usuário cadastrado com sucesso!", "Usuário cadastrado!")

        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
    <?php
}
session_unset();
?>