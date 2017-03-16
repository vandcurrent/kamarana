//Registration Validation
$(function() {
    $('.validate-form').bootstrapValidator({
        message: 'Masukan tidak valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
        	firstname: {
             message: 'Input tidak valid',
             validators: {
                 notEmpty: {
                     message: 'Nama depan tidak boleh kosong'
                 },
                 regexp: {
                     regexp: /^[a-zA-Z]+$/,
                     message: 'Nama depan hanya boleh huruf alfabet'
                 }
             }
         },
         lastname: {
             message: 'Input tidak valid',
             validators: {
                 notEmpty: {
                     message: 'Nama belakang tidak boleh kosong'
                 },
                 regexp: {
                     regexp: /^[a-zA-Z]+$/,
                     message: 'Nama belakang hanya boleh huruf alfabet'
                 }
             }
         },
         username: {
            message: 'Username tidak valid',
            validators: {
                notEmpty: {
                    message: 'Username tidak boleh kosong'
                },
                regexp: {
                    regexp: /^[a-zA-Z0-9_.]+$/,
                    message: 'Username hanya boleh berupa huruf alfabet, angka, underscore dan titik'
                }
            }
        },
        email: {
            validators: {
                notEmpty: {
                    message: 'Alamat email tidak boleh kosong'
                },
                emailAddress: {
                    message: 'Masukan alamat email yang valid'
                }
            }
        },
        password: {
            validators: {
             notEmpty: {
                message: 'Password tidak boleh kosong'
            },
            identical: {
                field: 'confirmPassword',
                message: 'Password tidak cocok'
            }
        }
    },
    confirmPassword: {
     notEmpty: {
        message: 'Masukan password sekali lagi'
    },
    validators: {
        identical: {
            field: 'password',
            message: 'Password tidak cocok'
        }
    }
}
}
});
});

//Datepicker
function daysCounter() {
    var d1 = $('input[name="date_start"]').datepicker('getDate');
    var d2 = $('input[name="date_end"]').datepicker('getDate');
    var diff = Math.floor((d2.getTime() - d1.getTime()) / 86400000);
    // if(diff<0){diff="1";}
    $("input[name='total_days']").val(diff);
};

$(function(){
    $('input[name="date_start"],input[name="date_end"]').on('change',function(e){
        daysCounter();
    });
});

$(function(){
    $( 'input[name="date_start"],input[name="date_end"],input[name="tgl_lahir"]' ).datepicker({
        language: "id",
        autoclose: true,
        todayHighlight: true
    });
});
