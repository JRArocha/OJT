$(document).ready(function () {

    var idforUpdate;
    $('#createRecord').hide();
    $("#closeBtn").hide();

    $(document).on('click', '#btnDelete', function () {

        var id = $(this).val();
        axios.get('delete_student', {
            params:{
                id: id
            }
        })
        .then(function(response){
            var msg = response.data.msg;
            var resultData = response.data.data;
            var status = response.data.status;

            if(status == 200){
                loadData();
            }else{

            }
        })
        .catch(function(error){})
        .then(function(){});
    });

    $(document).on('click', "#btnEdit", function () {
        var id = $(this).val();
        $('#btnupdate').val(id);
    });

    $(document).on('click', '#btnupdate', function () {
        var id = $(this).val();

        var newData = $('#updateData');
        var NewData = new FormData ($(newData)[0]);
        NewData.append('id',id);

        axios.post('update_student', NewData)
        .then(function(response){
            var status = response.data.status
            var resultData = response.data.data;
            var msg = response.data.msg
            if(status=='200'){
                alert(msg);
                loadData();
            }else{
                alert(msg);
            }

        })
        .catch(function(error){})
        .then(function(){});
    });

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
                $('#createRecord').hide();
                $("#closeBtn").hide();
                $("#createBtn").show();

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
                "<td>"+"<button class='btn btn-secondary fa-solid fa-pen-to-square' data-bs-target='#mdlregister' data-bs-toggle='modal' id='btnEdit' value='"+row.id+"' type='button'></button>"+
                "&nbsp;&nbsp;"+
                "<button class='fa-solid fa-trash btn btn-danger' id='btnDelete' value='"+row.id+"'></button>"+"</td>"
                responseData+="</tr>";
            })
            $('#tableBody').empty().append(responseData);

        })
        .catch(function(error){})
        .then(function(){});
    }

});
