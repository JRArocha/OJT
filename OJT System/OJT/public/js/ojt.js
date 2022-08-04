$(document).ready(function () {

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

    $(document).on('load', function () {
        $("#showForm").hide();
    });

});
