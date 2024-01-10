@csrf 
<div class="grid grid-cols-4 gap-4">
    <x-text-input id="name" label="Nome" name="name" value="{{ $supplier->name ?? old('endpoint') }}" />
    <x-text-input id="contact_phone" label="Telefone de Contato" name="contact_phone" value=""/>
    <x-text-input id="contact_email" label="Email de Contato" name="contact_email" />
    <x-text-input id="zip_code" label="CEP" name="zip_code" />
    <x-text-input id="street" label="Rua" name="street" />
    <x-text-input id="complement" label="Complemento" name="complement" />
    <x-text-input id="neighborhood" label="Bairro" name="neighborhood" />
    <x-text-input id="city" label="Cidade" name="city" />
    <x-text-input id="state" label="Estado" name="state" />
    <x-text-input id="number" label="Número" name="number" />
</div>
<button type="submit" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>

<script>
    $(document).ready(function () {
        $('#contact_phone').mask('(00) 00000-0000');
        $('#zip_code').mask('00000-000');
    });
    $(document).ready(function () { 
        function limpa_formulário_zip_code() {
            // Limpa valores do formulário de zip_code.
            $("#street").val("");
            $("#neighborhood").val("");
            $("#cidade").val("");
            $("#state").val(""); 
        }

        //Quando o campo zip_code perde o foco.
        $("#zip_code").blur(function () {

            //Nova variável "zip_code" somente com dígitos.
            var zip_code = $(this).val().replace(/\D/g, '');

            //Verifica se campo zip_code possui valor informado.
            if (zip_code != "") {

                //Expressão regular para validar o zip_code.
                var validazip_code = /^[0-9]{8}$/;

                //Valida o formato do zip_code.
                if (validazip_code.test(zip_code)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#street").val("...");
                    $("#neighborhood").val("...");
                    $("#city").val("...");
                    $("#state").val("..."); 

                    //Consulta o webservice viazip_code.com.br/
                    $.getJSON("https://viacep.com.br/ws/" + zip_code + "/json/?callback=?", function (dados) {

                        if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("#street").val(dados.logradouro);
                            $("#neighborhood").val(dados.bairro);
                            $("#city").val(dados.localidade);
                            $("#state").val(dados.uf); 
                        } //end if.
                        else {
                            //zip_code pesquisado não foi encontrado.
                            limpa_formulário_zip_code();
                            alert("zip_code não encontrado.");
                        }
                    });
                } //end if.
                else {
                    //zip_code é inválido.
                    limpa_formulário_zip_code();
                    alert("Formato de zip_code inválido.");
                }
            } //end if.
            else {
                //zip_code sem valor, limpa formulário.
                limpa_formulário_zip_code();
            }
        });
    });
</script>