@extends('WeDoProject')
@section('content')

<div class="layoutSidenav_content container-fluid">
    <main class="py-3">
        <div class="container-fluid">
            <div class="row float-end">
                <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                    <div class="input-group g-3">
                        <input class="form-control" type="text" placeholder="Search for... " aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                        <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                        <button class="btn btn-success" type="button" id="regApplicant" data-bs-target='#createRecord' data-bs-toggle='modal'>New Applicants</button>
                    </div>
                </form>
            </div>
            <div>
                <table class="table table-hover text-secondary text-center">
                    <thead>
                        <tr>
                            <td>Name <i class="fa-solid fa-sort"></i> </td>
                            <td>Address <i class="fa-solid fa-sort"></i> </td>
                            <td>Email <i class="fa-solid fa-sort"></i> </td>
                            <td>Contact <i class="fa-solid fa-sort"></i> </td>
                            <td>Position <i class="fa-solid fa-sort"></i> </td>
                            <td>Application Date <i class="fa-solid fa-sort"></i> </td>
                            <td>Action</td>
                        </tr>
                    </thead>

                    <tbody id="tableBody">

                    </tbody>

                    <tfoot>
                        <tr>
                            <td>Total Applicants</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </main>
    <footer class="text-center text-secondary bg-light">
        Copyright @ 2022
    </footer>


<!-- Modal New Applicant-->
<div class="modal fade" id="createRecord" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark text-light font-monospace">
                <h5 class="modal-title" id="staticBackdropLabel">Applicants Information</h5>
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-x"></i></button>
            </div>
            <div class="modal-body">
                <form id="formRegister">
                    <div class="card">
                        <div class="row g-1 p-2">
                            <div class="col-lg-6 col-md-6">
                                <div class="row g-1">
                                    <p class="text-danger">*Personal Information*</p>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-1 ">
                                            <input class="form-control w-100" id="fname" name="fname"
                                                type="text" placeholder="Enter First Name" />
                                            <label for="missionDate">First Name <label for=""
                                                    class="text-danger">*</label></label>
                                            <span class="text-danger small error-text surname_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-1">
                                            <input class="form-control w-100" id="mname" name="mname"
                                                type="text" placeholder="Enter Middle Name" />
                                            <label for="missionDate">Middle Name</label>
                                            <span class="text-danger small error-text surname_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-1">
                                            <input class="form-control w-100" id="lname" name="lname"
                                                type="text" placeholder="Enter Last Name" />
                                            <label for="missionDate">Last Name <label for=""
                                                    class="text-danger">*</label></label>
                                            <span class="text-danger small error-text surname_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-1">
                                            <input class="form-control w-100" id="sname" name="sname"
                                                type="text" placeholder="Enter Suffix Name" />
                                            <label for="missionDate">Suffix Name</label>
                                            <span class="text-danger small error-text surname_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-1">
                                            <input class="form-control w-100" id="bday" name="bday"
                                                type="date" placeholder="Enter Last Name" />
                                            <label for="missionDate">Birthdate <label for=""
                                                    class="text-danger">*</label></label>
                                            <span class="text-danger small error-text surname_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-floating mb-1">
                                            <select  class="form-control" name="gender" id="gender">
                                                <option value="-">-</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                            <label class="form-check-label" for="inlineCheckbox1">Gender at Birth <label for="" class="text-danger">*</label></label>
                                            <span class="text-danger small error-text city_error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-1 py-1">
                                    <p class="text-danger">*Adddres Information*</p>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-1 ">
                                            <input class="form-control w-100" id="city" name="city"
                                                type="text" placeholder="Enter Municipality or City" />
                                            <label for="missionDate">Municipality/City <label for=""
                                                    class="text-danger">*</label></label>
                                            <span class="text-danger small error-text surname_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-1 ">
                                            <input class="form-control w-100" id="prov" name="prov"
                                                type="text" placeholder="Enter Province" />
                                            <label for="missionDate">Province <label for=""
                                                    class="text-danger">*</label></label>
                                            <span class="text-danger small error-text surname_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-1 ">
                                            <input class="form-control w-100" id="contact" name="contact"
                                                type="text" placeholder="Enter Contact Number" />
                                            <label for="missionDate">Contact Number <label for=""
                                                    class="text-danger">*</label></label>
                                            <span class="text-danger small error-text surname_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-1 ">
                                            <input class="form-control w-100" id="email" name="email"
                                                type="text" placeholder="Enter Email" />
                                            <label for="missionDate">Email <label for=""
                                                    class="text-danger">*</label></label>
                                            <span class="text-danger small error-text surname_error"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row g-1">
                                    <p class="text-danger">*Other Information*</p>
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-1 ">
                                            <input class="form-control w-100" id="education" name="education" type="longtext" placeholder="Educational Background" />
                                            <label for="">Educational Background <label for="" class="text-danger">*</label></label>
                                            <span class="text-danger small error-text education_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-1 ">
                                            <input class="form-control w-100" id="workExp" name="workExp" type="longtext" placeholder="Work Experience" />
                                            <label for="missionDate">Previous Work Experience <label for="" class="text-danger">*</label></label>
                                            <span class="text-danger small error-text surname_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-1">
                                            <input class="form-control w-100" id="reason" name="reason" type="longtext" placeholder="Reason for Leaving" />
                                            <label for="">Reason for Leaving <label for="" class="text-danger">*</label></label>
                                            <span class="text-danger small error-text education_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-floating mb-1">
                                            <select  class="form-control" name="field" id="field">
                                                <option value="-">-</option>
                                                <option value="IT">Information Technology</option>
                                                <option value="OPS">Operations</option>
                                                <option value="Admin">Administration</option>
                                                <option value="OGM">OGM</option>
                                            </select>
                                            <label class="form-check-label" for="inlineCheckbox1">Field <label for="" class="text-danger">*</label></label>
                                            <span class="text-danger small error-text city_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-floating mb-1">
                                            <select  class="form-control" name="position" id="position">
                                                <option value="-">-</option>
                                                <option value=""></option>
                                                <option value=""></option>
                                                <option value=""></option>
                                                <option value=""></option>
                                                <option value="Intern">Intern</option>
                                            </select>
                                            <label class="form-check-label" for="inlineCheckbox1">Position <label for="" class="text-danger">*</label></label>
                                            <span class="text-danger small error-text city_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-1 ">
                                            <input class="form-control w-100" id="appDate" name="application"
                                                type="date" placeholder="Application Date" />
                                            <label for="missionDate">Application Date <label for=""
                                                    class="text-danger">*</label></label>
                                            <span class="text-danger small error-text surname_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="form-control w-100" for="">Upload Resume <label for=""
                                            class="text-danger">*</label>
                                        <input class="form-control btn btn-light w-75" type="file" id="resume" name="resume"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btnRegister" data-bs-dismiss="modal">Register</button>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
