$(document).ready(function () {
    hablaIdiomaAncestral();
    discapacidad();
    becaDocente();
    publicacionRev();
    getFecha();
    cateMigratoria(2);
    $('.dropdown-submenu a.test').on("click", function(e){
            $(this).next('ul').toggle();
            e.stopPropagation();
            e.preventDefault();
          });

            $('#datepicker1').datepicker({
                uiLibrary: 'bootstrap4',
                format: 'yyyy/mm/dd',
                startDate: '-3d',
            });

            $('#datepicker2').datepicker({
                uiLibrary: 'bootstrap4',
                format: 'yyyy/mm/dd',
                startDate: '-3d',
            });

            $('#datepicker3').datepicker({
                uiLibrary: 'bootstrap4',
                format: 'yyyy/mm/dd',
                startDate: '-3d',
            });
});

/*Esconde el contenedor de opciones de categoria migratoria en la vista docente información personal*/
function cateMigratoria(par) {
    var op;
    if(par != 2)
        op = $('option:selected',par).attr('data');
    else
        op = 0;
    console.info(op);
    if(op == 0 || op == 1)
        $("#contenedorMigratorio").hide();
    else
        $("#contenedorMigratorio").show();
}

//funcion que muestra u oculta contenedores para casos de elección SI o NO
function S_o_N(elemento,contenedor) {
    var op = $(elemento).val();
    console.info(op);
    if(op === 'NO' || op === 'SELECCIONE')
        $(contenedor).hide();
    else
        $(contenedor).show();
}

//Retorna la edad mediante la fecha de nacimiento
function getFecha() {
    var fe = $("#datepicker1").val();
    var fecha = new Date();
    var anioAct = fecha.getFullYear();
    if(fe.length > 0){
        var anioNac = fe.split("/");
        var cadena = anioNac[2] + anioNac[1] + anioNac[0];
        //console.log(cadena);
        var edad = calcularEdad(cadena);
        //console.log(edad)
        $("#edad").val(edad);
    }
}

function calcularEdad(dob) {
    var year = Number(dob.substr(0, 4));
    var month = Number(dob.substr(4, 2)) - 1;
    var day = Number(dob.substr(6, 2));
    var today = new Date();
    var age = today.getFullYear() - year;
    if (today.getMonth() < month || (today.getMonth() == month && today.getDate() < day)) {
        age--;
    }
    return age;
}


function hablaIdiomaAncestral() {
    var op = $("#hab_idi").val();
    //console.log(op);
    if(op == 0 || op == 2)
        $("#idiAnce").hide();
    else
        $("#idiAnce").show();
}

function discapacidad() {
    var op = $("#tDisc").val();
    //console.log(op);
    if(op == 0 || op == 2)
        $(".discapacidad").hide();
    else
        $(".discapacidad").show();
}

function cursaEstSupe() {
    var op = $("#curEstSup").val();
    //console.log(op);
    if(op === '--Seleccione--' || op === 'NO')
        $("#instCursa").hide();
    else
        $("#instCursa").show();
}

function becaDocente() {
    var op = $("#poseeBeca").val();
    //console.info(op);
    if(op === 'SELECCIONE' || op === 'NO')
        $("#beca").hide();
    else
        $("#beca").show();
}

function publicacionRev() {
    var op = $("#pubRev").val();
    if(op == 0 || op == 2)
        $("#nroPubRev").hide();
    else
        $("#nroPubRev").show();
}
//___________________________________________
//Combobox de Pais Nacionalidad
function paises(par) {
    //var op = $("#pais").val();
    var op = $('option:selected', par).attr('data');
    //console.info(op);
    if (op != 0){
        llenarCbx("#provincias",op,'/docentes/provincias');
    }
}

//Combobox de Provincias
function cantones(par) {
    var ca = $('option:selected',par).attr('data');
    console.info(ca);
    if (ca != 0){
        llenarCbx('#canton',ca,'/docentes/cantones');
    }
}
//______________________________________________________

//ComboBox de Pais Residencia
function paisRes() {
    var op1 = $("#paisResi").val();
    console.log(op1);
    if (op1 != 0){
        llenarCbx("#provResi",op1,'/docentes/provincias');
    }
}

function cantonResi() {
    var op2 = $("#provResi").val();
    console.log(op2);
    if (op2 != 0){
        llenarCbx("#cantResi",op2,'/docentes/cantones');
    }
}

//___________________________________________________________-

function llenarCbx(idSelect, dato, url) {
    //console.log('entro');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: ruta_global+url,
        type: 'post',
        dataType: 'json',
        data: {'id' : dato},
        success: function (data) {
            //console.info(data);
            $(idSelect).empty();
            $(idSelect).append("<option values='0'>--Seleccione--</option>");
            $.each(data, function (i,item){
                $(idSelect).append("<option values='"+item.id+"' data='"+item.id+"'>"+item.etiqueta+"</option>");
            });
        }
    });
}

function cargar() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'post',
        url: ruta_global+'/docentes/infAcademica',
        dataType: 'json',
        success: function (data) {
            console.info(data);
            $("#relLab").empty();
            $.each(data, function (i, item) {
                $("#relLab").append("<option values='"+item.etiqueta+"' data='"+item.id+"'>"+item.etiqueta+"</option>");
            })
        }
    });
}

