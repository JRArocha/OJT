<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

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
    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans,
                sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *,
        :after,
        :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg,
        video {
            display: block;
            vertical-align: middle
        }

        video {
            max-width: 100%;
            height: auto
        }

        .bg-white {
            --bg-opacity: 1;
            background-color: #fff;
            background-color: rgba(255, 255, 255, var(--bg-opacity))
        }

        .bg-gray-100 {
            --bg-opacity: 1;
            background-color: #f7fafc;
            background-color: rgba(247, 250, 252, var(--bg-opacity))
        }

        .border-gray-200 {
            --border-opacity: 1;
            border-color: #edf2f7;
            border-color: rgba(237, 242, 247, var(--border-opacity))
        }

        .border-t {
            border-top-width: 1px
        }

        .flex {
            display: flex
        }

        .grid {
            display: grid
        }

        .hidden {
            display: none
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .font-semibold {
            font-weight: 600
        }

        .h-5 {
            height: 1.25rem
        }

        .h-8 {
            height: 2rem
        }

        .h-16 {
            height: 4rem
        }

        .text-sm {
            font-size: .875rem
        }

        .text-lg {
            font-size: 1.125rem
        }

        .leading-7 {
            line-height: 1.75rem
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .ml-1 {
            margin-left: .25rem
        }

        .mt-2 {
            margin-top: .5rem
        }

        .mr-2 {
            margin-right: .5rem
        }

        .ml-2 {
            margin-left: .5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-8 {
            margin-top: 2rem
        }

        .ml-12 {
            margin-left: 3rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .max-w-6xl {
            max-width: 72rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .p-6 {
            padding: 1.5rem
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .pt-8 {
            padding-top: 2rem
        }

        .fixed {
            position: fixed
        }

        .relative {
            position: relative
        }

        .top-0 {
            top: 0
        }

        .right-0 {
            right: 0
        }

        .shadow {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)
        }

        .text-center {
            text-align: center
        }

        .text-gray-200 {
            --text-opacity: 1;
            color: #edf2f7;
            color: rgba(237, 242, 247, var(--text-opacity))
        }

        .text-gray-300 {
            --text-opacity: 1;
            color: #e2e8f0;
            color: rgba(226, 232, 240, var(--text-opacity))
        }

        .text-gray-400 {
            --text-opacity: 1;
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--text-opacity))
        }

        .text-gray-500 {
            --text-opacity: 1;
            color: #a0aec0;
            color: rgba(160, 174, 192, var(--text-opacity))
        }

        .text-gray-600 {
            --text-opacity: 1;
            color: #718096;
            color: rgba(113, 128, 150, var(--text-opacity))
        }

        .text-gray-700 {
            --text-opacity: 1;
            color: #4a5568;
            color: rgba(74, 85, 104, var(--text-opacity))
        }

        .text-gray-900 {
            --text-opacity: 1;
            color: #1a202c;
            color: rgba(26, 32, 44, var(--text-opacity))
        }

        .underline {
            text-decoration: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .w-5 {
            width: 1.25rem
        }

        .w-8 {
            width: 2rem
        }

        .w-auto {
            width: auto
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr))
        }

        @media (min-width:640px) {
            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:block {
                display: block
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-start {
                justify-content: flex-start
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:h-20 {
                height: 5rem
            }

            .sm\:ml-0 {
                margin-left: 0
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width:768px) {
            .md\:border-t-0 {
                border-top-width: 0
            }

            .md\:border-l {
                border-left-width: 1px
            }

            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width:1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }

        @media (prefers-color-scheme:dark) {
            .dark\:bg-gray-800 {
                --bg-opacity: 1;
                background-color: #2d3748;
                background-color: rgba(45, 55, 72, var(--bg-opacity))
            }

            .dark\:bg-gray-900 {
                --bg-opacity: 1;
                background-color: #1a202c;
                background-color: rgba(26, 32, 44, var(--bg-opacity))
            }

            .dark\:border-gray-700 {
                --border-opacity: 1;
                border-color: #4a5568;
                border-color: rgba(74, 85, 104, var(--border-opacity))
            }

            .dark\:text-white {
                --text-opacity: 1;
                color: #fff;
                color: rgba(255, 255, 255, var(--text-opacity))
            }

            .dark\:text-gray-400 {
                --text-opacity: 1;
                color: #cbd5e0;
                color: rgba(203, 213, 224, var(--text-opacity))
            }

            .dark\:text-gray-500 {
                --tw-text-opacity: 1;
                color: #6b7280;
                color: rgba(107, 114, 128, var(--tw-text-opacity))
            }
        }
    </style>
    <script src="{{ asset('js/ojt.js') }}"></script>

    <style>
        body {
            font-family: 'Nunito', sans-serif;

        }
    </style>
</head>

<body>
    <!-- Button trigger modal -->
    <div class="container card p-5">
        <div class="row">
            <div class="col-12 text-center p-5">
                <button type="button" class="btn btn-success" id="showForm" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop">Show Form | <i class="fa-regular fa-eye"></i></button>
            </div>
        </div>

        <form id="frmsave">
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-info text-light font-monospace">
                            <h5 class="modal-title" id="staticBackdropLabel">Register Personal Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container card p-3">
                                <div class="row g-3">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="row g-1">
                                            <p class="text-danger p-1">*Personal Information*</p>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-1 ">
                                                    <input class="form-control w-100" id="Lname" name="LastName"
                                                        type="text" placeholder="Enter Last Name" />
                                                    <label for="missionDate">Last Name <label for=""
                                                            class="text-danger">*</label></label>
                                                    <span class="text-danger small error-text surname_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-1">
                                                    <input class="form-control w-100" id="firstNameInp" name="FirstName"
                                                        type="text" placeholder="Enter First Name" />
                                                    <label for="missionDate">First Name <label for=""
                                                            class="text-danger">*</label></label>
                                                    <span class="text-danger small error-text surname_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-1">
                                                    <input class="form-control w-100" id="Mname" name="MiddleName"
                                                        type="text" placeholder="Enter Middle Name" />
                                                    <label for="missionDate">Middle Name <label for=""
                                                            class="text-danger">*</label></label>
                                                    <span class="text-danger small error-text surname_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-1">
                                                    <input class="form-control w-100" id="Sname" name="SuffixName"
                                                        type="text" placeholder="Enter Suffix Name" />
                                                    <label for="missionDate">Suffix Name <label for=""
                                                            class="text-danger">*</label></label>
                                                    <span class="text-danger small error-text surname_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row g-1">
                                            <p class="text-danger p-1">*Other Info*</p>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-1">
                                                    <input class="form-control w-100" id="birthday" name="Birthday"
                                                        type="date" placeholder="Birthday" />
                                                    <label class="form-check-label" for="inlineCheckbox1">Birthday<label
                                                            for="" class="text-danger">*</label></label>
                                                    <span class="text-danger small error-text surname_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-floating mb-1">
                                                    <select class="form-control" name="gender" id="gend">
                                                        <option value="-">-</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                    <label class="form-check-label" for="inlineCheckbox1">Gender at
                                                        Birth
                                                        <label for="" class="text-danger">*</label></label>
                                                    <span class="text-danger small error-text city_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-floating mb-1">
                                                    <select class="form-control" name="status" id="stat">
                                                        <option value="-">-</option>
                                                        <option value="Single">Single</option>
                                                        <option value="Married">Married</option>
                                                    </select>

                                                    <label class="form-check-label" for="inlineCheckbox1">Civil Status
                                                        <label for="" class="text-danger">*</label></label>
                                                    <span class="text-danger small error-text city_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success" id="save"
                                data-bs-dismiss="modal">Save Entries</button>
                            <button type="button" class="btn btn-danger" id="look">Look Up</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="container card p-4 bg-light" id="infoTable">
            <label class="fst-italic text-primary p-2 text-center text-uppercase">
                <h5>Information Table</h5>
            </label>
            <div class="container p-3">
                <!-- <div class="container card">
                    <label for="" class="fst-italic">Card Number</label>
                    <p id="cardNo" name="cardNo" ></p>
                </div> -->
                <div class="container card">
                    <label for="fullName" class="fst-italic">Full Name</label>
                    <p id="fnameShow" name="firstNameOut"></p>
                </div>
                <!-- <div class="container card">
                    <label for="" class="fst-italic">Address</label>
                    <p id="address" name="Address"></p>
                </div>
                 <div class="container card">
                    <label for="" class="fst-italic" >Province</label>
                    <p id="prov" name="prov"></p>
                </div>
                <div class="container card">
                    <label for="" class="fst-italic" >City / Municipality</label>
                    <p id="city" name="city"></p>
                </div>
                <div class="container card">
                    <label for="" class="fst-italic" >Barangay</label>
                    <p id="brgy" name="brgy"></p>
                </div>
                <div class="container card">
                    <label for="" class="fst-italic" >St. Optional</label>
                    <p id="opt" name="opt"></p>
                </div>
                <div class="container card">
                    <label for="" class="fst-italic" >Contact</label>
                    <p id="contact" name="contact"></p>
                </div>
                <div class="container card">
                    <label for="" class="fst-italic" >Email</label>
                    <p id="email" name="email"></p>
                </div> -->
                <div class="container card">
                    <label for="" class="fst-italic">Birthday</label>
                    <p id="bday" name="bday"></p>
                </div>
                {{-- <div class="container card">
                    <label for="" class="fst-italic">Age</label>
                    <p id="age" name="bday"></p>
                </div> --}}
                <div class="container card">
                    <label for="" class="fst-italic">Gender</label>
                    <p id="gender" name="gender"></p>
                </div>
                <div class="container card">
                    <label for="" class="fst-italic">Status</label>
                    <p id="status" name="status"></p>
                </div>
                <!--<div class="container card">
                    <label for="" class="fst-italic" >Gov. ID</label>
                    <p id="govID" name="govID"></p>
                </div>
                <div class="container card">
                    <label for="" class="fst-italic" >Spouse</label>
                    <p id="spouse" name="spouse"></p>
                </div>
                <div class="container card">
                    <label for="" class="fst-italic" >Date of Interview</label>
                    <p id="interview" name="interview"></p>
                </div>
                <div class="container card">
                    <label for="" class="fst-italic" >Volunteer</label>
                    <p id="volunteer" name="volunteer"></p>
                </div> -->
            </div>
        </div>
</body>

</html>
