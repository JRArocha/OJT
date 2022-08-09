$(document).ready(function () {

    $('#createRecord').hide();
    $("#closeBtn").hide();

    $(document).on('click', "#createBtn", function () {
        $("#createRecord").show();
        $("#closeBtn").show();
        $("#createBtn").hide();
    });

    $(document).on('click', "#closeBtn", function () {
        $("#createRecord").hide();
        $("#closeBtn").hide();
        $("#createBtn").show();
    });

    $(document).on('click', "#btnSave", function () {
        var frmData = $('#frmSave');
        var formData = new FormData ($(frmData)[0]);
        axios.post('add_student',formData)
        .then(function(response){
            var status=response.data.status;
            var msg=response.data.msg;
            if(status=='200'){
                //call on aftersave
                loadData();
                alert(msg);
                $('#frmSave')[0].reset();
            }else{
                alert(msg);
            }

        })
        .catch(function(error){})
        .then(function(){});

    });
    //call on create page
   loadData();

    function loadData(){

        axios.get('get_allStudent')
        .then(function(view){
            var showData = view.data.data;
            var responseData = "";

            $(showData).each(function(index, row){
                responseData+="<tr>"+
                "<td>"+row.id+"</td>"+
                "<td>"+row.name+"</td>"+
                "<td>"+row.email+"</td>"+
                "<td>"+row.course+"</td>"+
                "<td>"+row.section+"</td>"+
                "<td>"+"<button class='fa-solid fa-pen-to-square'>" + "</button>"+
                "&nbsp;"+"&nbsp;"+
                "<button class='fa-solid fa-trash'>" + "</button>"+"</td>"
                responseData+="</tr>";
            })
            $('#tableBody').empty().append(responseData);

        })
        .catch(function(error){})
        .then(function(){});
    }

});
