    <script type="text/javascript">
    function getStart()
    {
        var form = $('#form-pasien');
            form[0].reset();
        $('#frame_error').hide();
        $('#frame_success').hide();
        $('#poli').attr('readonly', true);
        $('#tarif').attr('readonly', true);
        $('#kdDokter').attr('readonly', true);
        $('#jnsPasien').attr('readonly', true);
        var form = $('#form-pasien')
            // Reset validationo error
            form.find('.invalid-feedback').remove();
            form.find('input').removeClass('is-invalid');
    }

    $('.modal').on('hidden.bs.modal', function(){
        $(this).find('form')[0].reset();
        
        $('#no_rm').attr('readonly', false);
    });

    $('#nama_poli').keyup(function() {
        if(this.value.length > 1) return;
        if ($(this).val().length == 0) {
            $('#poli').val("");
            $('#tarif').val("");
            $('#kd_tarif').val("");
            $('#rek_p').val("");
            $("#kdDokter").val([]).trigger("change")
        }
    });

    function resetAll(){
        $('#frame_error').hide();
        $('#error_reg').remove();
    }

    function resetSuccessReg() {
        $('#frame_success').hide();
        $('#success_reg').remove();
    }
</script>