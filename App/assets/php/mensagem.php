<?php
session_start();
session_status();

if(isset($_SESSION['mensagem'])){
    if(isset($_SESSION['tipoAcao']) and ($_SESSION['tipoAcao'] == 2) ){

    ?>
    <script src="../assets/js/jquery-3.1.1.min.js"></script>
    <link href="../assets/css/toastr.min.css" rel="stylesheet"/>
    <script src="../assets/js/toastr.min.js"></script>


    <?php
        $_SESSION['tipoAcao'] = null;
    }else{?>
        <script src="assets/js/jquery-3.1.1.min.js"></script>
        <link href="assets/css/toastr.min.css" rel="stylesheet"/>
        <script src="assets/js/toastr.min.js"></script>
    <?php }

    if($_SESSION['mensagem'] == 'deu'){
        ?>
        <script>
            toastr["success"]("<?php echo ($_SESSION['tipoErro'])?>", "Sucesso!")

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
    if($_SESSION['mensagem'] == 'erro'){
        ?>
        <script>

            toastr["error"]("<?php echo ($_SESSION['tipoErro'])?>", "Erro!")

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
}

?>