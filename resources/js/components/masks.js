import $ from "jquery";

$(document).ready(function() {
    $('.m_date').mask('00/00/0000');
    $('.m_time').mask('00:00:00');
    $('.m_date_time').mask('00/00/0000 00:00:00');
    $('.m_cep').mask('00000-000');
    $('.m_phone').mask('0000-0000');
    $('.m_celphone_with_ddd').mask('(00) 00000-0000');
    $('.m_celphone_only_numbers').mask('+0000000000000');
    $('.m_phone_with_ddd').mask('(00) 0000-0000');
    $('.m_phone_us').mask('(000) 000-0000');
    $('.m_mixed').mask('AAA 000-S0S');
    $('.m_cpf').mask('000.000.000-00', {reverse: true});
    $('.m_cnpj').mask('00.000.000/0000-00', {reverse: true});
    $('.m_money').mask('000.000.000.000.000,00', {reverse: true});
    $('.m_money2').mask("#.##0,00", {reverse: true});
    $('.m_ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
      translation: {
        'Z': {
          pattern: /[0-9]/, optional: true
        }
      }
    });
    $('.m_ip_address').mask('099.099.099.099');
    $('.m_percent').mask('##0,00%', {reverse: true});
    $('.m_clear_if_not_match').mask("00/00/0000", {clearIfNotMatch: true});
    $('.m_placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
    $('.m_fallback').mask("00r00r0000", {
        translation: {
          'r': {
            pattern: /[\/]/,
            fallback: '/'
          },
          placeholder: "__/__/____"
        }
      });
    $('.m_selectonfocus').mask("00/00/0000", {selectOnFocus: true});

    var SPMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
    spOptions = {
        onKeyPress: function(val, e, field, options) {
            field.mask(SPMaskBehavior.apply({}, arguments), options);
        }
    };
      
    $('.m_sp_celphones').mask(SPMaskBehavior, spOptions);
});