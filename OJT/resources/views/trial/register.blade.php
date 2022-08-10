<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register Student</title>

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

    <!-- public/js/registerStudent.js -->
    <script src="{{ asset('js/registerStudent.js') }}"></script>

    <style>
        body {
            font-family: 'Nunito', sans-serif;

        }
    </style>
</head>
<body>
<div class="container">
    {{-- Search Student --}}
    <div class="input-group p-3">
        <input class="form-control" id="searchVal" type="text" placeholder="Search ID here" aria-label="Search for ..." aria-describedby="btnNavbarSearch"/>
        <button class="btn btn-success" id="btnSearch" type="button">Search | <i class="fas fa-search"></i></button>
    </div>

    {{-- Register Button --}}
    <div class="row p-3">
        <div class="text-center">
            <button class="btn btn-success w-15" id="createBtn">Register Student</button>
        </div>
    </div>

    {{-- Register Students --}}
    <div class="row p-4 justify-content-center align-center" id="createRecord">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Student</h4>
                        </div>
                        <div class="card-body">
                            <form id="frmSave">
                                <div class="form-group mb-3">
                                    <label for="">Student Name</label>
                                    <input id="studName" type="text" name="name" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Student Email</label>
                                    <input id="studEmail" type="text" name="email" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Student Course</label>
                                    <input id="studCourse" type="text" name="course" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Student Section</label>
                                    <input id="studSection" type="text" name="section" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <button id="btnSave" type="button" class="btn btn-primary">Save Student</button>
                                    <button class="btn btn-danger" id="closeBtn">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

    </div>

    {{-- Show Information --}}
    <div class="row card">
        <table class="table table-hover text-center" id="prevTable">
            <thead>
                <tr>
                    <th class="text-success" scope="col">ID</th>
                    <th class="text-success" scope="col">Name</th>
                    <th class="text-success" scope="col">Email</th>
                    <th class="text-success" scope="col">Course</th>
                    <th class="text-success" scope="col">Section</th>
                    <th class="text-success" scope="col">Action</th>
                </tr>
            </thead>

            <tbody id="tableBody">

            </tbody>
        </table>
    </div>

    <!-- Modal -->
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
                                                <input class="form-control w-100" id="sname" name="Name"
                                                    type="text" placeholder="Enter Name" />
                                                <label for="missionDate">Full Name <label for=""
                                                        class="text-danger">*</label></label>
                                                <span class="text-danger small error-text surname_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-1">
                                                <input class="form-control w-100" id="semail" name="Email"
                                                    type="text" placeholder="Enter Email" />
                                                <label for="missionDate">Email <label for=""
                                                        class="text-danger">*</label></label>
                                                <span class="text-danger small error-text surname_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-1">
                                                <input class="form-control w-100" id="scourse" name="Course"
                                                    type="text" placeholder="Enter Course" />
                                                <label for="missionDate">Course <label for=""
                                                        class="text-danger">*</label></label>
                                                <span class="text-danger small error-text surname_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-1">
                                                <input class="form-control w-100" id="ssection" name="Section"
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="btnupdate">Update</button>
                    <button type="button" class="btn btn-danger" id="look">Look Up</button>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
