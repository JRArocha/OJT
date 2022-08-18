$(document).ready(function () {

    var idforUpdate;
    $('#createRecord').hide();
    $("#closeBtn").hide();

    // button signin
    $(document).on('click', '#btnSignin', function(){
        axios.get('/Dashboard')
        .then(function(){})
        .catch(function(error){})
        .then(function(){});
    });

    // button search
    $(document).on('click', '#btnSearch', function(){
        var search = $('#searchVal').val();
        axios.get('search_student', {
            params:{
                id: search
            }
        })
        .then(function(response){
            var msg = response.data.msg;
            var resultData = response.data.data;
            var status = response.data.status;
            var responseData="";
            // alert(resultData);
            // return false;

            if(status == 200){
                $(resultData).each(function(index, row){
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
                alert(msg);
            }else{
                alert(msg);
                $('#tableBody').empty().append(responseData);
            }
        })
        .catch(function(error){})
        .then(function(){});
    });

    // button clear search
    $(document).on('click', '#clrSearch', function () {
        var clear = "";
        $("#searchVal").val(clear);
        loadData();
    });

    // button delete
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

    // button edit
    $(document).on('click', "#btnEdit", function () {
        var id = $(this).val();
        $('#btnupdate').val(id);
    });

    // button update
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
                loadData();
                $('#updateData')[0].reset();
            }else{
                alert(msg);
            }
        })
        .catch(function(error){})
        .then(function(){});
    });

    // register
    $(document).on('click', "#regBtn", function () {
        $("#createRecord").show();
    });

    // button save
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
                $('#frmSave')[0].reset();
            }else{
                alert(msg);
            }

        })
        .catch(function(error){})
        .then(function(){});
    });

    // call on create page
    function loadData(){
        axios.get('get_allStudent')
        .then(function(view){
            var showData = view.data.data;
            var total= view.data.total;
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
            $("#total").val(total);

        })
        .catch(function(error){})
        .then(function(){});
    }

loadData();
});
