@extends('WeDoProject')
@section('content')

<div class="layoutSidenav_content container-fluid">
    <main class="py-5 float-end" style="width: 84%;"    >
    <div class="container w-50 my-4" style="">
        <div class="row my-5 card p-3 bg-light">

            <div class="col-lg-12 text-light text-center py-3">
                    <h3 class="text-dark">Create Account</h3>
            </div>
            <div class="col-lg-12">
                <form class="row bg-light text-light justify-content-center g-2 py-2" id="createAdmin" action="">
                    <input class="form-control" type="text" name="name" id="name" placeholder="Enter Name">
                    <input class="form-control" type="text" name="username" id="uname" placeholder="Enter Username">
                    <input class="form-control" type="password" name="password" id="pword" placeholder="Password">
                    <input class="form-control" type="password" name="password1" id="pword1" placeholder="Re-enter Password">
                    <button class="btn btn-success" id="btnCreate" type="button">Create</button>
                </form>
            </div>
        </div>
    </div>
</main>
<footer class="text-center text-secondary bg-light fixed-bottom" style="width: 100%;">
    Copyrights WeDo 2022
</footer>
</div>
@endsection
