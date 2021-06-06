$(function() { 
    $('#da_thn').datepicker({
                        changeYear: true,
                        changeMonth: false,
                        changeDate: false,
                        showButtonPanel: true,
                        dateFormat: 'yy',
                        onClose: function(dateText, inst) { 
                            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                            $(this).datepicker('setDate', new Date(year, 1));
                        }
                    }).focus(function () {
                $(".ui-datepicker-month").hide();
                $(".ui-datepicker-calendar").hide();
            });
});