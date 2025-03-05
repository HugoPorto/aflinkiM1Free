<?php
$preferredLanguage = $this->request->getCookie('preferredLanguage');

if ($preferredLanguage) {
    if ($preferredLanguage === 'pt_BR') {
        $language = 'Portuguese-Brasil.json';
    } else if ($preferredLanguage === 'en_US') {
        $language = '';
    } else {
        $language = '';
    }
} else {
    $language = '';
}
?>

<script src="<?php echo $this->request->webroot . 'adminlte/plugins/jquery/jquery.min.js'; ?>"></script>
<script src="<?php echo $this->request->webroot . 'adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js'; ?>"></script>
<script src="<?php echo $this->request->webroot . 'adminlte/dist/js/adminlte.js'; ?>"></script>
<script src="<?php echo $this->request->webroot . 'adminlte/dist/js/demo.js'; ?>"></script>
<script src="<?php echo $this->request->webroot . 'adminlte/plugins/select2/js/select2.full.min.js'; ?>"></script>
<script src="<?php echo $this->request->webroot . 'adminlte/plugins/datatables/jquery.dataTables.min.js'; ?>"></script>
<script src="<?php echo $this->request->webroot . 'adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'; ?>"></script>
<script src="<?php echo $this->request->webroot . 'adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js'; ?>"></script>
<script src="<?php echo $this->request->webroot . 'adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js'; ?>"></script>
<script src="<?php echo $this->request->webroot . 'adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js'; ?>"></script>
<script src="<?php echo $this->request->webroot . 'adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js'; ?>"></script>
<script src="<?php echo $this->request->webroot . 'adminlte/plugins/jszip/jszip.min.js'; ?>"></script>
<script src="<?php echo $this->request->webroot . 'adminlte/plugins/pdfmake/pdfmake.min.js'; ?>"></script>
<script src="<?php echo $this->request->webroot . 'adminlte/plugins/pdfmake/vfs_fonts.js'; ?>"></script>
<script src="<?php echo $this->request->webroot . 'adminlte/plugins/datatables-buttons/js/buttons.html5.min.js'; ?>"></script>
<script src="<?php echo $this->request->webroot . 'adminlte/plugins/datatables-buttons/js/buttons.print.min.js'; ?>"></script>
<script src="<?php echo $this->request->webroot . 'adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js'; ?>"></script>
<script src="<?php echo $this->request->webroot . 'adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js'; ?>"></script>
<script src="<?php echo $this->request->webroot . 'adminlte/plugins/toastr/toastr.min.js'; ?>"></script>
<script src="<?php echo $this->request->webroot . 'adminlte/plugins/sweetalert2/sweetalert2.min.js'; ?>"></script>
<script src="<?php echo $this->request->webroot . 'front/assets/js/cookies.js'; ?>"></script>

<script>
    $.ajax({
        type: "GET",
        url: "<?= $this->request->base; ?>/users/role-user",
        success: function(item) {
            if (item.role.role_two === 'builder') {
                var perfilLi = document.getElementById('perfil');

                var newLi = document.createElement('li');
                newLi.className = 'nav-item d-none d-sm-inline-block';

                var newLink = document.createElement('a');
                newLink.href = '/builder/index';
                newLink.className = 'nav-link';
                newLink.textContent = 'Builder';

                newLi.appendChild(newLink);

                perfilLi.parentNode.insertBefore(newLi, perfilLi.nextSibling);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
</script>

<script>
    $(function() {
        $('.select2').select2()

        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        $("#general").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "order": [
                [0, "desc"]
            ],
            "language": {
                "url": "<?= $language == '' ? '' : $this->request->base . '/datatables/' . $language; ?>"
            },
        });
        $("#users").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "order": [
                [0, "desc"]
            ],
            "language": {
                "url": "<?= $language == '' ? '' : $this->request->base . '/datatables/' . $language; ?>"
            },
        });
        $("#users_root").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "order": [
                [0, "desc"]
            ],
            "language": {
                "url": "<?= $language == '' ? '' : $this->request->base . '/datatables/' . $language; ?>"
            },
        });
        $("#users_admin").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "order": [
                [0, "desc"]
            ],
            "language": {
                "url": "<?= $language == '' ? '' : $this->request->base . '/datatables/' . $language; ?>"
            },
        });
    });
</script>

<?php
echo $this->Html->script(
    [
        '/axios/axios.min.js'
    ]
);
?>

<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>

<script>
    function toastrDeleteCategory(idCategory) {
        $.ajax({
            method: "get",
            url: "<?= $this->request->base ?>/stores-categories/delete/" + idCategory,
            success: function(result) {
                console.log(result);
                if (result.msg === 'success') {
                    toastr.error('Categoria Deletada com Sucesso!');
                    window.location.replace("<?= $this->request->base ?>/stores-categories/");
                    return false;
                } else {
                    toastr.info(result.msg);
                }
            }
        });

        return false;
    }

    function toastrDeleteSubcategory(idCategory) {
        $.ajax({
            method: "get",
            url: "<?= $this->request->base ?>/stores-subcategories/delete/" + idCategory,
            success: function(result) {
                if (result === 'success') {
                    toastr.error('Subacategoria deletada com sucesso!');
                    window.location.replace("<?= $this->request->base ?>/stores-subcategories/");
                    return false;
                } else {
                    toastr.error(result);
                }
            }
        });

        return false;
    }

    <?php if ($this->request->controller === 'StoresDemands') : ?>

        function updateDemand(idDemand) {
            $.ajax({
                method: "get",
                url: "<?= $this->request->base ?>/stores-demands/updateStatusDemand/" + idDemand,
                success: function(result) {
                    if (result === 'success') {
                        window.location.replace("<?= $this->request->base ?>/stores-demands/");
                        return false;
                    } else {
                        toastr.info(result);
                    }
                }
            });

            return false;
        }

        function showAddress(idDemand) {
            $.ajax({
                method: "get",
                url: "<?= $this->request->base ?>/stores-address/getAddress/" + idDemand,
                success: function(result) {

                    const obj = JSON.parse(result);

                    var html = '<ul class="list-group list-group-flush">' +
                        '<li class="list-group-item">Endereço: ' + obj.address + '</li>' +
                        '<li class="list-group-item">CEP: ' + obj.cep + '</li>' +
                        '<li class="list-group-item">Cidade: ' + obj.city + '</li>' +
                        '<li class="list-group-item">Bairro: ' + obj.district + '</li>' +
                        '<li class="list-group-item">Número: ' + obj.number + '</li>' +
                        '<li class="list-group-item">Referência: ' + obj.reference + '</li>' +
                        '</ul>';

                    $(".modal-body-address").html(html);
                    $('#myModal').modal('show');
                }
            });

            return false;
        }

    <?php endif; ?>

    function swalDefaultSuccess(idDemand) {
        var Toast = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        });

        Toast.fire({
            title: 'Dados de Entrega',
            text: 'Teste',
            showCancelButton: true,
            cancelButtonText: 'Fechar',
            showConfirmButton: false,
            reverseButtons: true
        });
    }

    function mouseOverWhatsapp() {
        document.getElementById("whatsapp").style.cursor = "pointer";
    }

    function mouseWhatsappClick() {
        this.updateWhatsappNumber();
    }

    function updateWhatsappNumber() {
        Swal.fire({
            title: 'Atualizar Nº do Whatsapp',
            input: 'text',
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Confirmar',
            showLoaderOnConfirm: true,
            preConfirm: (number) => {
                return fetch(`<?= $this->request->base ?>/homes/editWhatsapp/${number}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(response.statusText)
                        }
                        return response.json()
                    })
                    .catch(error => {
                        Swal.showValidationMessage(
                            `Requisição falhou: ${error}`
                        )
                    })
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: result.value.msg,
                })
            }
        })
    }

    function mouseOverFacebook() {
        document.getElementById("facebook").style.cursor = "pointer";
    }

    function mouseFacebookClick() {
        this.updateFacebookLink();
    }

    function updateFacebookLink() {
        Swal.fire({
            title: 'Atualizar Link do Facebook',
            input: 'text',
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Confirmar',
            showLoaderOnConfirm: true,
            preConfirm: (link) => {

                const link64 = window.btoa(link);

                return fetch(`<?= $this->request->base ?>/homes/editFacebook/${link64}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(response.statusText)
                        }
                        return response.json()
                    })
                    .catch(error => {
                        Swal.showValidationMessage(
                            `Requisição falhou: ${error}`
                        )
                    })
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: result.value.msg,
                })
            }
        })
    }

    function mouseOverInstagram() {
        document.getElementById("instagram").style.cursor = "pointer";
    }

    function mouseOverUpdateBannerPromotion() {
        document.getElementById("promotion").style.cursor = "pointer";
    }

    function mouseInstagramClick() {
        this.updateInstagramLink();
    }

    function redirectPromotionBanner() {
        window.location.href = "<?= $this->request->base ?>/pages/editPromotionBanner";
    }

    function updateInstagramLink() {
        Swal.fire({
            title: 'Atualizar Link do Instagram',
            input: 'text',
            inputAttributes: {
                autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Confirmar',
            showLoaderOnConfirm: true,
            preConfirm: (link) => {

                const link64 = window.btoa(link);

                return fetch(`<?= $this->request->base ?>/homes/editInstagram/${link64}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(response.statusText)
                        }
                        return response.json()
                    })
                    .catch(error => {
                        Swal.showValidationMessage(
                            `Requisição falhou: ${error}`
                        )
                    })
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: result.value.msg,
                })
            }
        })
    }

    function verifySubcategory() {
        let idCategory = document.getElementById("category").value;
        const subcategoria = document.getElementById('subcategory');
        const finalcategory = document.getElementById('finalcategory');

        $.ajax({
            method: "get",
            url: "<?= $this->request->base ?>/stores-subcategories/loadSubcategoryByIdcategory/" + idCategory,
            success: function(result) {

                let options = '';

                for (var count = 0; count < result.length; count++) {
                    options = options + '<option value="' + result[count].id + '">' + result[count].subcategory + '</option>'
                }

                const html = '<div class="form-group">' +
                    '<label for="description">Subcategorias*</label>' +
                    '<div class="input select">' +
                    '<select name="stores_subcategories_id" class="form-control" onchange="verifyFinalCategory()" id="selectsubcategory">' +
                    '<option selected>Selecione uma subcategoria</option>' +
                    options +
                    '</select>' +
                    '</div>' +
                    '</div>';

                subcategoria.innerHTML = html;
            },
            error: function(result) {
                toastr.info(result.responseJSON.msg);
                subcategoria.innerHTML = '';
                finalcategory.innerHTML = '';
            }
        });

        return false;
    }

    function verifyFinalCategory() {
        let idSubcategory = document.getElementById("selectsubcategory").value;
        const finalcategory = document.getElementById('finalcategory');

        $.ajax({
            method: "get",
            url: "<?= $this->request->base ?>/stores-finalcategories/loadFinalcategoryByIdSubcategory/" + idSubcategory,
            success: function(result) {

                let options = '';

                for (var count = 0; count < result.length; count++) {
                    options = options + '<option value="' + result[count].id + '">' + result[count].category + '</option>'
                }

                const html = '<div class="form-group">' +
                    '<label for="description">Categoria Final*</label>' +
                    '<div class="input select">' +
                    '<select name="stores_finalcategories_id" class="form-control">' +
                    '<option selected>Selecione uma categoria final</option>' +
                    options +
                    '</select>' +
                    '</div>' +
                    '</div>';

                finalcategory.innerHTML = html;
            },
            error: function(result) {
                toastr.info(result.responseJSON.msg);
                finalcategory.innerHTML = '';
            }
        });

        return false;
    }

    function verifyState() {
        let idCity = document.getElementById("stores-products-id").value;
        let state = document.getElementById("state");


        $.ajax({
            method: "get",
            url: "<?= $this->request->base ?>/companys/loadState/" + idCity,
            success: function(result) {
                const html = '<label for="states_id">Estado*</label><p> ' + result.name + '</p><input type="hidden" name="states_id" value="' + result.id + '"/>';

                state.innerHTML = html;
            },
            error: function(result) {
                toastr.info(result.responseJSON.msg);
                subcategoria.innerHTML = '';
                finalcategory.innerHTML = '';
            }
        });

        return false;
    }
</script>

<?php if ($this->request->controller === 'StoresCourses' && $this->request->action === 'courses') : ?>
    <script src="<?php echo $this->request->webroot . 'adminlte/plugins/bootstrap-switch/js/bootstrap-switch.min.js'; ?>"></script>

    <script>
        $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });

        $("input[data-bootstrap-switch]").on('switchChange.bootstrapSwitch', function(event, state) {
            const data = {
                state: state
            };

            const csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                headers: {
                    'X-CSRF-Token': csrfToken
                },
                type: "POST",
                url: "<?= $this->request->base; ?>/users/update-role-user",
                data: data,
                success: function(item) {
                    if (item.role.role_two !== null) {
                        document.querySelector('.card-tools [data-card-widget="remove"]').click();

                        toastr.success('Você agora é um usuário Builder!');

                        var perfilLi = document.getElementById('perfil');
                        var newLi = document.createElement('li');
                        newLi.className = 'nav-item d-none d-sm-inline-block';
                        var newLink = document.createElement('a');
                        newLink.href = '/builder/index';
                        newLink.className = 'nav-link';
                        newLink.textContent = 'Builder';
                        newLi.appendChild(newLink);
                        perfilLi.parentNode.insertBefore(newLi, perfilLi.nextSibling);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        });
    </script>
<?php endif; ?>

<?php if ($this->request->controller === 'StoresProducts') : ?>
    <script>
        $("#customSwitch1").click(function() {
            const color_select = document.getElementById('color_select');

            if ($(this).is(':checked')) {
                const html = '<label for="color">Cor 1*</label>' +
                    '<div class="input color"><input type="color" name="color" id="color"></div>' +
                    '<br>' +
                    '<label for="description">Cor 2*</label>' +
                    '<div class="input color"><input type="color" name="color2" id="color2"></div>' +
                    '<br>' +
                    '<label for="description">Cor 3*</label>' +
                    '<div class="input color"><input type="color" name="color3" id="color3"></div>'

                color_select.innerHTML = html;
            } else {
                const html = '<label for="description">Cor 1*</label>' +
                    '<div class="input color"><input type="color" name="color" id="color"></div>'

                color_select.innerHTML = html;
            }
        });

        $("#customSwitch2").click(function() {
            const color_select = document.getElementById('color_select');

            if ($(this).is(':checked')) {
                const html = '<label for="color">Cor 1*</label>' +
                    '<div class="input color"><input type="color" name="color" id="color"></div>' +
                    '<br>' +
                    '<label for="description">Cor 2*</label>' +
                    '<div class="input color"><input type="color" name="color2" id="color2"></div>'

                color_select.innerHTML = html;
            } else {
                const html = '<label for="description">Cor 1*</label>' +
                    '<div class="input color"><input type="color" name="color" id="color"></div>'

                color_select.innerHTML = html;
            }
        });
    </script>
<?php endif; ?>

</body>

</html>