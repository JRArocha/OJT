$(document).ready(function () {
    
    $("#hideTable").hide();
    $("#infoTable").hide();

    $(document).on('click', "#showTable", function () {
        $("#infoTable").show();
        $("#hideTable").show();
        $("#showTable").hide();
    });
    $(document).on('click', "#hideTable", function () {
        $("#infoTable").hide();
        $("#hideTable").hide();
        $("#showTable").show();
    });

    $(document).on('click', "#save", function () {
        var frmData = $("#frmsave");
        var formData = new FormData($(frmData)[0]);
        // console.log(formData.serialize());
        alert(frmData.serialize());


        fname = $("#firstNameInp").val();
        midName = $("#Mname").val();
        surName = $("#Lname").val();
        sufName = $("#Sname").val();
        stat = $("#stat").val();
        gender = $("#gend").val();
        bday = $("#birthday").val();
        fullName = fname + " " + midName + " " + surName + " " + sufName;

        $("#fnameShow").html(fullName);
        $("#bday").html(bday);
        $("#gender").html(gender);
        $("#status").html(stat);

    });

});
