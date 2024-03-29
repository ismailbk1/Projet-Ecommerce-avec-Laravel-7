<!doctype html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Phoenix</title>
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&amp;display=swap"
        rel="stylesheet">
    <link href="{{ asset('dashboradasset/css/phoenix.min.css') }}" rel="stylesheet" id="style-default">
    <link href="{{ asset('dashboradasset/css/user.min.css') }}" rel="stylesheet" id="user-style-default">
    <style>
        body {
            opacity: 0;
        }
    </style>
</head>

<body>
    <main class="main" id="top">
        <div class="container-fluid px-0">
            @include('admin.ncl.sidebar')
            @include('admin.ncl.nav')
            <div class="content">
                <div class="pb-5">
                    <div class="row g-5">
                        <div class="col-12 col-xxl-6">
                            <div class="row align-items-center g-4">




                                <div>
                                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">Ajouter categorie</button>
                                </div>

                                {{-- tableau des categories --}}

                                <div id="tableExample"
                                    data-list='{"valueNames":["name","email","age"],"page":5,"pagination":true}'>
                                    <div class="table-responsive scrollbar">
                                        <h3>Listes des categories :</h3>
                                        <hr>
                                        <hr>

                                        <table class="table table-bordered table-striped fs--1 mb-0">
                                            <thead class="bg-200 text-900">
                                                <tr>
                                                    <th class="sort" data-sort="name">#</th>
                                                    <th class="sort" data-sort="email">Nom</th>
                                                    <th class="sort" data-sort="age">Description</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list">

                                                @foreach ($categs as $index => $c)
                                                    <tr>
                                                        <td class="name">{{ $index + 1 }}</td>
                                                        <td class="email">{{ $c->name }}</td>
                                                        <td class="age">{{ $c->description }}</td>
                                                        <td>
                                                            <a type="button"  data-bs-toggle="modal"
                                                            data-bs-target="#categomodif{{ $c->id }}"
                                                                class="btn btn-outline-success">Modifier</a>
                                                            <a type="button" onclick="return confirm('Are you sure you want to delete?')"
                                                                class="btn btn-outline-danger"   href="/admin/categorie/destory/{{$c->id}}">Supprimer</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row align-items-center mt-3">
                                        <div class="pagination d-none"></div>
                                        <div class="col">
                                            <p class="mb-0 fs--1">
                                                <span class="d-none d-sm-inline-block" data-list-info></span>
                                                <span class="d-none d-sm-inline-block"> &mdash; </span>
                                                <a class="fw-semi-bold" href="#!" data-list-view="*">
                                                    View all
                                                    <span class="fas fa-angle-right ms-1"
                                                        data-fa-transform="down-1"></span>
                                                </a><a class="fw-semi-bold d-none" href="#!"
                                                    data-list-view="less">
                                                    View Less
                                                    <span class="fas fa-angle-right ms-1"
                                                        data-fa-transform="down-1"></span>
                                                </a>
                                            </p>
                                        </div>
                                        <div class="col-auto d-flex">
                                            <button class="btn btn-sm btn-primary" type="button"
                                                data-list-pagination="prev"><span>Previous</span></button>
                                            <button class="btn btn-sm btn-primary px-4 ms-2" type="button"
                                                data-list-pagination="next"><span>Next</span></button>
                                        </div>
                                    </div>





                                    {{-- fin tableu des categories --}}

                                </div>

                            </div>
                        </div>
                    </div>
                    <footer class="footer">
                        <div class="row g-0 justify-content-between align-items-center h-100 mb-3">
                            <div class="col-12 col-sm-auto text-center">
                                <p class="mb-0 text-900">Thank you for creating with phoenix<span
                                        class="d-none d-sm-inline-block"></span><span class="mx-1">|</span><br
                                        class="d-sm-none">2022 &copy; <a href="https://themewagon.com">Themewagon</a>
                                </p>
                            </div>
                            <div class="col-12 col-sm-auto text-center">
                                <p class="mb-0 text-600">v1.1.0</p>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
    </main>
         {{-- modal d'ajout --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter Categorie</h5><button class="btn p-1"
                        type="button" data-bs-dismiss="modal" aria-label="Close"><span
                            class="fas fa-times fs--1"></span></button>

                </div>










           
                <form action="/admin/categorie/store" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="mb-3"><label class="form-label" for="exampleFormControlInput1">nom de categorie
                            </label>
                            <input name="nom" class="form-control" id="exampleFormControlInput1" type="text"
                                placeholder="tapper le nom de categorie...">
                        </div>
                        @error('nom')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                        <div class="mb-0"><label class="form-label" placeholder='description...'
                                for="exampleTextarea"> Description de categorie </label>
                            <textarea name="description" class="form-control" id="exampleTextarea" rows="3"> </textarea>
                        </div>
                        @error('description')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="modal-footer"><button class="btn btn-primary" type="submit">Ajouter</button>
                        <button class="btn btn-outline-primary" type="button"
                            data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- fin modal --}}




    {{-- debut modal du modification --}}
    @foreach ($categs as $index => $c )
    <div class="modal fade" id="categomodif{{ $c->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modifier Categorie : <span class="text-primary">{{ $c->name }}</span></h5><button class="btn p-1"
                        type="button" data-bs-dismiss="modal" aria-label="Close"><span
                            class="fas fa-times fs--1"></span></button>

                </div>     
                <form action="/admin/categorie/update" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="mb-3"><label class="form-label" for="exampleFormControlInput1">nom de categorie
                            </label>
                            <input name="nom" class="form-control" id="exampleFormControlInput1" type="text" value="{{ $c->name }}"
                                placeholder="tapper le nom de categorie...">
                        </div>
                        @error('nom')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                        <input name='id' type="hidden" value="{{$c->id}}">
                        <div class="mb-0"><label class="form-label" placeholder='description...'
                                for="exampleTextarea"> Description de categorie </label>
                            <textarea name="description" class="form-control" id="exampleTextarea" rows="3">{{ $c->description }}</textarea>
                        </div>
                        @error('description')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="modal-footer"><button class="btn btn-primary" type="submit">Modifer</button>
                        <button class="btn btn-outline-primary" type="button"
                            data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
{{-- fin modal du modificatin --}}
</body>

<script src="{{ asset('dashboradasset/js/phoenix.js') }}"></script>
<script src="{{ asset('dashboradasset/js/ecommerce-dashboard.js') }}"></script>

</html>
<!--
  <script src="{{ asset('dashboradasset/js/phoenix.js') }}"></script>
  <script src="{{ asset('dashboradasset/js/ecommerce-dashboard.js') }}"></script>
  <link href="{{ asset('dashboradasset/css/phoenix.min.css') }}" rel="stylesheet" id="style-default">
  <link href="{{ asset('dashboradasset/css/user.min.css') }}" rel="stylesheet" id="user-style-default"> -->
