<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="https://th.bing.com/th/id/R.e7e4d800b99f44d0a4a829f5126ca862?rik=JQWcj5P8Ymgwpw&riu=http%3a%2f%2fwedo.russnino.com%2fwp-content%2fuploads%2f2018%2f03%2flogo-1.png&ehk=Beuc%2b0ybW0GoeV6KXIF7GdgrETR38wHIsB%2bRdgp%2fP%2bA%3d&risl=&pid=ImgRaw&r=0">
    <title>WeDo OJT</title>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Latest compiled JQuery -->
    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <!-- Latest compiled Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- Latest compiled font awesome -->
    <script src="https://kit.fontawesome.com/941ad23302.js" crossorigin="anonymous"></script>

    <script src="{{ asset('js/registerStudent.js') }}"></script>
</head>

<body>
    <header class="navbar navbar-expand bg-dark container-fluid fixed-top" style="height: 64px;">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <div class="float-start px-5">
                <a class="navbar-brand text-danger" id="wedoIcon" href="/WeDoDashboard">
                <img src="https://th.bing.com/th/id/R.e7e4d800b99f44d0a4a829f5126ca862?rik=JQWcj5P8Ymgwpw&riu=http%3a%2f%2fwedo.russnino.com%2fwp-content%2fuploads%2f2018%2f03%2flogo-1.png&ehk=Beuc%2b0ybW0GoeV6KXIF7GdgrETR38wHIsB%2bRdgp%2fP%2bA%3d&risl=&pid=ImgRaw&r=0" alt="WeDo Logo" style="width:2cm; "></a>
                {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span> --}}
                </button>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
            <div class="float-start px-2">
                <div class="navbar-nav ">
                    {{-- <a class="nav-link text-light btn btn-dark" id="home" href="#Home">Home</a>
                    <a class="nav-link text-light btn btn-dark" id="aboutUs" href="#AboutUs">About Us</a>
                    <a class="nav-link text-light btn btn-dark" id="services" href="#Services">Services</a>
                    <a class="nav-link text-light btn btn-dark" id="services" href="#Projects">Projects</a> --}}
                </div>
            </div>
            <div class="float-end px-4">
                <div class="navbar-nav">
                    <a class="nav-link text-light btn btn-dark" id="messageUs" href="#MessageUs"><i class="fa-regular fa-message"></i></a>
                    <a class="nav-link text-light btn btn-dark" id="logout" href="/WeDoLogin"><i class="fa-solid fa-power-off"></i></a>
                </div>
            </div>
        </div>
    </header>
    <div class="container-xxl fixed-left">
        <aside class="bg-dark bd-sidebar text-muted py-3" style="width: 185px; height: 91%; left: 0; bottom: 0%; position:fixed;">
            <a class="nav-link text-light btn btn-dark" id="regBtn" data-bs-target='#createRecord' data-bs-toggle='modal'>Register</a>
            <a class="nav-link text-light btn btn-dark" id="aboutUs" href="#AboutUs">About Us</a>
            <a class="nav-link text-light btn btn-dark" id="services" href="#Services">Services</a>
            <a class="nav-link text-light btn btn-dark" id="services" href="#Projects">Projects</a>
        </aside>
        <main class="bd-main order-1" style="position: absolute; top: 13%; left: 16%; width: 83%; height: 100%;">
            <div class="container card ">

                {{-- Search Student --}}
                <div class="input-group py-3">
                    <input class="form-control flex" id="searchVal" type="text" placeholder="Search ID here" style="width: 85%;" required=""/>
                    <button type="button" class="btn-light" id="clrSearch"> <i class="fa-solid fa-xmark"></i> </button>
                    <button class="btn btn-success btn-sm" id="btnSearch" type="button" style="width: 10%;">Search | <i class="fas fa-search"></i></button>
                </div>

                {{-- Show Information --}}
                <div class="row card table-wrapper-scroll-y">
                    <table class="table table-hover text-center " id="prevTable">
                        <thead>
                            <tr>
                                <th class="text-dark" scope="col">ID</th>
                                <th class="text-dark" scope="col">Name</th>
                                <th class="text-dark" scope="col">Email</th>
                                <th class="text-dark" scope="col">Course</th>
                                <th class="text-dark" scope="col">Section</th>
                                <th class="text-dark" scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody id="tableBody">

                        </tbody>

                        <tfoot>
                            <tr>
                                <td>Footer Here.</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </main>
    </div>
<!-- Modal Register -->
<div class="modal fade" id="createRecord" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xs modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-info text-light font-monospace">
                <h5 class="modal-title" id="staticBackdropLabel">Add Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card p-3">
                    <div class="row g-3">
                        <div class="col-lg-12 col-md-12">
                            <form id="frmSave">
                                <div class="row g-1">
                                    <p class="text-danger p-1">*Personal Information*</p>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-1 ">
                                            <input class="form-control w-100" id="studName" name="name"
                                                type="text" placeholder="Enter Name" />
                                            <label for="missionDate">Full Name <label for=""
                                                    class="text-danger">*</label></label>
                                            <span class="text-danger small error-text surname_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-1">
                                            <input class="form-control w-100" id="studEmail" name="email"
                                                type="text" placeholder="Enter Email" />
                                            <label for="missionDate">Email <label for=""
                                                    class="text-danger">*</label></label>
                                            <span class="text-danger small error-text surname_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-1">
                                            <input class="form-control w-100" id="studCourse" name="course"
                                                type="text" placeholder="Enter Course" />
                                            <label for="missionDate">Course <label for=""
                                                    class="text-danger">*</label></label>
                                            <span class="text-danger small error-text surname_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-1">
                                            <input class="form-control w-100" id="studSection" name="section"
                                                type="text" placeholder="Enter Section" />
                                            <label for="missionDate">Section <label for=""
                                                    class="text-danger">*</label></label>
                                            <span class="text-danger small error-text surname_error"></span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btnSave" data-bs-dismiss="modal">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Edit -->
<div class="modal fade" id="mdlregister" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xs modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-info text-light font-monospace">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Personal Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card p-3">
                    <div class="row g-3">
                        <div class="col-lg-12 col-md-12">
                            <form id="updateData">
                                <div class="row g-1">
                                    <p class="text-danger p-1">*Personal Information*</p>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-1 ">
                                            <input class="form-control w-100" id="sname" name="name"
                                                type="text" placeholder="Enter Name" />
                                            <label for="missionDate">Full Name <label for=""
                                                    class="text-danger">*</label></label>
                                            <span class="text-danger small error-text surname_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-1">
                                            <input class="form-control w-100" id="semail" name="email"
                                                type="text" placeholder="Enter Email" />
                                            <label for="missionDate">Email <label for=""
                                                    class="text-danger">*</label></label>
                                            <span class="text-danger small error-text surname_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-1">
                                            <input class="form-control w-100" id="scourse" name="course"
                                                type="text" placeholder="Enter Course" />
                                            <label for="missionDate">Course <label for=""
                                                    class="text-danger">*</label></label>
                                            <span class="text-danger small error-text surname_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-1">
                                            <input class="form-control w-100" id="ssection" name="section"
                                                type="text" placeholder="Enter Section" />
                                            <label for="missionDate">Section <label for=""
                                                    class="text-danger">*</label></label>
                                            <span class="text-danger small error-text surname_error"></span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btnupdate" data-bs-dismiss="modal">Update</button>
            </div>
        </div>
    </div>
</div>

</body>
</html>
