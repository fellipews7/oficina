<?php
session_start();
session_status();

if(isset($_SESSION['mensagem'])){
    var_dump($_SESSION['mensagem']);
?>
    <script src="assets/js/jquery-3.1.1.min.js"></script>
    <link href="assets/css/toastr.min.css" rel="stylesheet"/>
    <script src="assets/js/toastr.min.js"></script>
    <script>

        <?php
            if(($_SESSION['mensagem']) == 'deu'){
                echo 'cheguei';
        ?>
                toastr["success"]("<?php ($_SESSION['tipoMensagem'])?>", "Cadastro feito com sucesso!")

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
            }elseif ($_SESSION['mensagem'] == 'erro'){?>
                <script>
                    alert('oi')
                    Command: toastr["error"]("<?php ($_SESSION['tipoMensagem'])?>", "Erro ao cadastrar!")

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
session_unset();
?>