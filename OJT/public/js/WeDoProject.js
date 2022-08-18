$(document).ready(function () {
loadData();
    $(document).on('click', '#btnRegister', function(){
        var frmData = $('#formRegister');
        var formData = new FormData($(frmData)[0]);

        axios.post('create',formData)
        .then(function(response){
            var status=response.data.status;
            var msg=response.data.msg;
            var resultData = response.data.data;

            if(status=='200'){
                //call on aftersave
                loadData();
                $('#formRegister')[0].reset();
            }else{
                alert(msg);
            }

        })
        .catch(function(error){})
        .then(function(){});
    })

    function loadData(){
        axios.get('getapplicant')
        .then(function(view){
            var showData = view.data.data;
            var total= view.data.total;
            var responseData = "";
            $(showData).each(function(index, row){

                responseData+="<tr>"+
                "<td>"+row.lname+" "+row.fname+"</td>"+
                "<td>"+row.prov+" "+row.city+"</td>"+
                "<td>"+row.email+"</td>"+
                "<td>"+row.contact+"</td>"+
                "<td>"+row.field+" "+row.position+"</td>"+
                "<td>"+row.application+"</td>"+
                "<td>"+"<button class='btn btn-secondary fa-solid fa-eye' data-bs-target='#' data-bs-toggle='modal' id='btnView' value='"+row.id+"' type='button'></button>"+
                "&nbsp;&nbsp;"

                responseData+="</tr>";

            })
            $('#tableBody').empty().append(responseData);

        })
        .catch(function(error){})
        .then(function(){});
    }

});
