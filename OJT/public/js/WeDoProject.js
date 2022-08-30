$(document).ready(function () {

    //login
    $(document).on('click', '#login', function(){
        var uname = $('#username').val();
        var upass = $('#password').val();
        axios.get('/fetch_login', {
            params:{
                uname:uname,
                upass:upass
            }
        })
        .then(function(response){

            if(response.data.status==201){
                alert(response.data.msg);
            }else{
                window.location.href = "/";
            }

        })
        .catch(function(error){})
        .then(function(){});

    })

    getLogUser();
    function getLogUser(){
        axios.post('/getloguser')
        .then(function(response){
            $(response.data.data).each(function(index, row){
                $('#user').text(row.name);
                $('#interviewer').text(row.name);
                $('#vassessor').text(row.name);
            })
        })
        .catch(function(error){})
        .then(function(){});
    }

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

    $(document).on('click', '#btnNavbarSearch', function(){
        var search = $('#searchApplicant').val();
        axios.get('searchapplicant', {
            params:{
                id: search
            }
        })

        .then(function(response){
            var msg = response.data.msg;
            var resultData = response.data.data;
            var status = response.data.status;
            var total = response.data.count;
            var clear = "";

            // alert(total);

            var responseData="";

            if(status == 200){
                $(resultData).each(function(index, row){
                    responseData+="<tr>"+
                    "<td>"+row.ctrlno+"</td>"+
                    "<td>"+row.lname+", "+row.fname+"</td>"+
                    "<td>"+row.prov+" "+row.city+"</td>"+
                    "<td>"+row.field+" "+row.position+"</td>"+
                    "<td>"+row.application+"</td>"+
                    "<td>"+row.assessor+"</td>"+
                    "<td>"+"<button class='btn btn-sm btn-secondary fa-solid fa-eye' data-bs-target='#viewRecord' data-bs-toggle='modal' id='btnView' value='"+row.ctrlno+"' type='button'></button>"+
                    "&nbsp;&nbsp;"

                    responseData+="</tr>";
                    $("#total").html(clear);
                })
                $("#total").html(total);
                $('#tableBody').empty().append(responseData);


            }

            else{
                loadData();
            }
        })
        .catch(function(error){})
        .then(function(){});
    });

    $(document).on('click', '#clrSearch', function () {
        var clear = "";
        $("#searchApplicant").val(clear);
        loadData();
    });

    $(document).on('click', "#btnView", function () {
        var id = $(this).val();
        $('#btnDownload').val(id);
        axios.get('select',{
            params:{
                id: id
            }
        })
        .then(function(view){
            var showData = view.data.data;
            var total= view.data.total;
            var picturePath=view.data.picturePath;

            console.log(showData);
            $(showData).each(function(index, row){
                control=row.ctrlno;
                fullname = row.lname+", "+row.fname;
                bday = row.bday;
                gender = row.gender;
                address = row.city + ", " + row.prov;
                number = row.contact;
                email = row.email
                background = row.education;
                work = row.workExp;
                reason = row.reason;
                position = row.position + " " + row.field;
                appdate = row.application;
                assess = row.assessor;
                resume = row.resume;

                $("#fullname").val(fullname);
                $("#ctrlno").val(control);
                $("#vgender").val(gender);
                $("#vbday").val(bday);
                $("#vaddress").val(address);
                $("#vemail").val(email);
                $("#vnumber").val(number);
                $("#vposition").val(position);
                $("#vappdate").val(appdate);
                $("#veducation").val(background);
                $("#vworkExp").val(work);
                $("#vreason").val(reason);
                $("#vassessor").val(assess);
                $("#preview").attr("src",picturePath);
            })
        })
        .catch(function(error){})
        .then(function(){});
    });

    $(document).on('click', '#btnDownload', function(){

    });

    $(document).on('click', '#btnCreate', function(){
        var frmData = $('#createAdmin');
        var formData = new FormData($(frmData)[0]);

        axios.post('regadmin', formData)
        .then(function(response){
            var status=response.data.status;
            var msg=response.data.msg;
            var resultData = response.data.data;

            if(status=='200'){
                alert(msg);
                // $('#createAdmin')[0].reset();
                window.location.href = "/";
            }else{
                alert(msg);

            }

        })
        .catch(function(error){})
        .then(function(){});
    });

    function loadData(){
        axios.get('getapplicant')
        .then(function(view){
            var showData = view.data.data;
            var total= view.data.total;
            var responseData = "";
            $(showData).each(function(index, row){
                responseData+="<tr>"+
                "<td>"+row.ctrlno+"</td>"+
                "<td>"+row.lname+", "+row.fname+"</td>"+
                "<td>"+row.prov+" "+row.city+"</td>"+
                "<td>"+row.field+" "+row.position+"</td>"+
                "<td>"+row.application+"</td>"+
                "<td>"+row.assessor+"</td>"+
                "<td>"+"<button class='btn btn-sm btn-secondary fa-solid fa-eye' data-bs-target='#viewRecord' data-bs-toggle='modal' id='btnView' value='"+row.ctrlno+"' type='button'></button>"+
                "&nbsp;&nbsp;"
                responseData+="</tr>";
            })
            $('#tableBody').empty().append(responseData);
            $('#total').html(total);
        })

        .catch(function(error){})
        .then(function(){});
    }

    loadData();
});
