<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register Student</title>

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

    <style>
        body {
            font-family: 'Nunito', sans-serif;

        }
    </style>
</head>

<body>
<div class="container">
    {{-- Search Student --}}
    <div class="container">
        <form>
            <div class="input-group form-control">
                <input class="form-control" id="searchVal" type="text" placeholder="Search ID here" aria-label="Search for ..." aria-describedby="btnNavbarSearch"/>
                <button class="btn btn-success" id="btnSearch" type="button">Search | <i class="fas fa-search"></i></button>
            </div>
        </form>
    </div>
    <div class="container card p-3 float">
        <div class="text-center">
            <button class="btn btn-success w-15" id="createBtn">Register Student</button>
            <button class="btn btn-danger w-15" id="closeBtn">Close</button>
        </div>
    </div>
    {{-- Register Students --}}
    <div class="container card p-2 w-75" id="createRecord">
        <div class="container p-2">
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
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Show Information --}}
    <div class="container card">
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
</div>
</body>
</html>
