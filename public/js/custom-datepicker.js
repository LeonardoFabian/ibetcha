$ = jQuery.noConflict();

$(document).ready(function(){

    $(function(){
        $("#_ibetcha_user_birthday").datepicker({
            closeText: 'Cerrar',
            prevText: '< Ant',
            nextText: 'Sig >',
            currentText: 'Hoy',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
            dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'], 
            // firstDay: 1, //Hace que la semana comience en Lunes
            // minDate: 0, //Hace que no se puedan seleccionar fechas pasadas
            maxDate: "-18y",
            dateFormat: "dd/mm/yy", //Establece el formato de fecha
            changeMonth: true, //Permite seleccionar el mes directamente
            changeYear: true, //Permite seleccionar el año directamente
            onClose: function () {
                var selDate = $(this).val();
                if ( (selDate.length) > 0 ) {
                    iYear = selDate.substring(selDate.length - 4, selDate.length);
                    currentYear = new Date().getFullYear(); // return the current year

                    // compare if year selected < 18
                    if( (currentYear - iYear) < 18 ) {
                        $(this).datepicker( 'setDate', new Date("-18y"));
                    }

                    // console.log(currentYear);
                }
            }
        });
    });

    
});