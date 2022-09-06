$(document).ready(function () {
    var descVal = "DESC";
    // LOGIN
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

    // REGISTER BUTTON
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

    // SEARCH
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
                    "<td>"+row.status+"</td>"+
                    "<td>"+row.employeestatus+"</td>"+
                    "<td>"+"<button class='btn btn-sm btn-secondary fa-solid fa-pen-to-square' data-bs-target='#updateRecord' data-bs-toggle='modal' id='btnEdit' value='"+row.ctrlno+"' type='button'></button>"+
                    "&nbsp;&nbsp;"+
                    "<button class='btn btn-sm btn-secondary fa-solid fa-eye' data-bs-target='#viewRecord' data-bs-toggle='modal' id='btnView' value='"+row.ctrlno+"' type='button'></button>"+
                    "&nbsp;&nbsp;"

                    responseData+="</tr>";
                    $("#total").html(clear);
                })
                $("#total").html(total);
                $('#tableBody').empty().append(responseData);


            }

            else{
                loadData();
                alert(msg);
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

    // VIEW BUTTON
    $(document).on('click', "#btnView", function () {
        var id = $(this).val();
        $('#btnPrint').val(id);
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
                res = row.resume;
                stat = row.status;
                estat = row.employeestatus;
                remark = row.remarks;

                $("#preview").attr("src",picturePath);
                $("#upremarks").val(remark);
                $("#vremarks").val(remark);
                $("#fullname").val(fullname);
                $("#upfname").val(row.fname);
                $("#upmname").val(row.mname);
                $("#uplname").val(row.lname);
                $("#upsname").val(row.sname);
                $("#ctrlno").val(control);
                $("#vgender").val(gender);
                $("#upgender").val(gender);
                $("#vbday").val(bday);
                $("#upbday").val(bday);
                $("#vaddress").val(address);
                $("#upprov").val(row.prov);
                $("#upcity").val(row.city);
                $("#vemail").val(email);
                $("#upemail").val(email);
                $("#vnumber").val(number);
                $("#upcontact").val(number);
                $("#vposition").val(position);
                $("#upfield").val(row.field);
                $("#upposition").val(row.position);
                $("#vappdate").val(appdate);
                $("#upapplication").val(appdate);
                $("#veducation").val(background);
                $("#upeducation").val(background);
                $("#vworkExp").val(work);
                $("#upworkExp").val(work);
                $("#vreason").val(reason);
                $("#upreason").val(reason);
                $("#vassessor").val(assess);
                $("#vstatus").val(stat);
                $("#upstatus").val(stat);
                $("#vempstatus").val(estat);
                $("#upestatus").val(estat);
                $("#resume").val(res);
                $("#upresume").val(res);

            })
        })
        .catch(function(error){})
        .then(function(){});
    });

    // EDIT BUTTON
    $(document).on('click', "#btnEdit", function () {
        var id = $(this).val();
        $('#btnupdate').val(id);
    });

    // BUTTON UPDATE
    $(document).on('click', '#btnupdate', function () {
        var id = $(this).val();

        var newData = $('#updateinfo');
        var NewData = new FormData ($(newData)[0]);
        NewData.append('id',id);

        axios.post('update', NewData)
        .then(function(response){
            var status = response.data.status
            var resultData = response.data.data;
            var msg = response.data.msg
            if(status=='200'){
                loadData();
                $('#updateinfo')[0].reset();
            }else{
                alert(msg);
            }
        })
        .catch(function(error){})
        .then(function(){});
    });

    // DOWNLOAD BUTTON
    // $(document).on('click', '#btnPrint', function(){
    //     var id = $(this).val();
    //     axios.get('/print',{
    //         params:{
    //             id:id
    //         }
    //     })
    //     .then(function(response){
    //         var status = response.data.status
    //         var resultData = response.data.data;
    //         var msg = response.data.msg
    //         if(status=='200'){
    //             loadData();
    //         }else{
    //             alert(msg);
    //         }
    //     })
    //     .catch(function(error){})
    //     .then(function(){});
    // });

    // CREATE BUTTON
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
                "<td>"+row.status+"</td>"+
                "<td>"+row.employeestatus+"</td>"+
                "<td>"+"<button class='btn btn-sm btn-secondary fa-solid fa-pen-to-square' data-bs-target='#updateRecord' data-bs-toggle='modal' id='btnEdit' value='"+row.ctrlno+"' type='button'></button>"+
                "&nbsp;&nbsp;"+
                "<button class='btn btn-sm btn-secondary fa-solid fa-eye' data-bs-target='#viewRecord' data-bs-toggle='modal' id='btnView' value='"+row.ctrlno+"' type='button'></button>"+
                "&nbsp;&nbsp;"
                responseData+="</tr>";
            })
            $('#tableBody').empty().append(responseData);
            $('#total').html(total);
        })

        .catch(function(error){})
        .then(function(){});
    }

    $(document).on('click', '#appDateSort', function () {
        if(descVal == "DESC")
        {
            descVal="ASC";
            $("#appDateSort").removeClass("fa-sort-up").addClass("fa-sort-down");
        }
        else
        {
            descVal='DESC';
            $("#appDateSort").removeClass("fa-sort-down").addClass("fa-sort-up");
        }

        axios.get('/appDate',{
            params:{
                descVal:descVal
            }
        })
        .then(function(response){
            var status = response.data.status;
            var resultData = response.data.data;
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
                    "<td>"+row.status+"</td>"+
                    "<td>"+"<button class='btn btn-sm btn-secondary fa-solid fa-eye' data-bs-target='#viewRecord' data-bs-toggle='modal' id='btnView' value='"+row.ctrlno+"' type='button'></button>"+
                    "&nbsp;&nbsp;"

                    responseData+="</tr>";
                })
                $('#tableBody').empty().append(responseData);
            }
            else{
                loadData();
                alert(msg);
            }
        })
        .catch(function(error){})
        .then(function(){});
    });

    loadData();
});
