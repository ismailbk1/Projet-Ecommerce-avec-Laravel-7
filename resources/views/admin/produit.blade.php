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
                                        data-bs-target="#exampleModal">Ajouter produit</button>
                                </div>

                                {{-- tableau des categories --}}

                                <div id="tableExample"
                                    data-list='{"valueNames":["name","email","age"],"page":5,"pagination":true}'>
                                    <div class="table-responsive scrollbar">
                                        <h3>Listes des produits :</h3>
                                        <hr>
                                        <hr>

                                        <table class="table table-bordered table-striped fs--1 mb-0">
                                            <thead class="bg-200 text-900">
                                                <tr>
                                                    <th class="sort" data-sort="number">#</th>
                                                    <th class="sort" data-sort="email">Nom</th>
                                                    <th class="sort" data-sort="text">Description</th>
                                                    <th class="sort" data-sort="text">Quantite</th>
                                                    <th class="sort" data-sort="age">Prix</th>
                                                    <th class="sort" data-sort="number">Image</th>
                                                  
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list">

                                                @foreach ($prod as $index => $p)
                                                    <tr>
                                                        <td class="name">{{ $index + 1 }}</td>
                                                        <td class="email">{{ $p->name }}</td>
                                                        <td class="age">{{ $p->description }}</td>
                                                        <td class="age">{{ $p->quantite }}</td>                                                        
                                                        <td class="age">{{ $p->prix }}</td>
                                                        <td class="age"  ><img src="{{ asset('uploads') }}/{{$p->image}} " alt="" srcset="" width="80px"></td>

                                                        <td>
                                                            <a type="button"  data-bs-toggle="modal"
                                                            data-bs-target="#categomodif{{ $p->id }}"
                                                                class="btn btn-outline-success">Modifier</a>
                                                            <a type="button" onclick="return confirm('Are you sure you want to delete?')"
                                                                class="btn btn-outline-danger"   href="/admin/produit/destore/{{$p->id}}">Supprimer</a>
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
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter Produit</h5><button class="btn p-1"
                        type="button" data-bs-dismiss="modal" aria-label="Close"><span
                            class="fas fa-times fs--1"></span></button>

                </div>










           
                <form action="/admin/produit/store" method="post" enctype="multipart/form-data" >
                    @csrf
                    <div class="modal-body">

                        <div class="mb-3"><label class="form-label" for="exampleFormControlInput1">Categorie de produit
                            </label>
                          <select class="form-select" name="cat">
                            @foreach ($cat as $c)
                            <option  name="cat" value="{{ $c->id }}">{{ $c->name}}</option>
                            
                            @endforeach
                          </select>
                        </div>
                        @error('nom')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror  <div class="mb-3"><label class="form-label" for="exampleFormControlInput1">nom de produit
                        </label>
                        <input name="nom" class="form-control" id="exampleFormControlInput1" type="text"
                            placeholder="tapper le nom de categorie...">
                    </div>
                    @error('nom')
                        <div class="alert alert-danger"> {{ $message }}</div>
                    @enderror
                        <div class="mb-0"><label class="form-label" placeholder='description...'
                                for="exampleTextarea"> Description de produit </label>
                            <textarea name="description" class="form-control" id="exampleTextarea" rows="3"> </textarea>
                        </div>
                        @error('description')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                        <div class="mb-3"><label class="form-label" for="exampleFormControlInput1">Quantite de produit
                        </label>
                        <input name="qt" class="form-control" id="exampleFormControlInput1" type="number"
                            placeholder="tapper le quantite de produit...">
                    </div>
                    @error('qt')
                        <div class="alert alert-danger"> {{ $message }}</div>
                    @enderror
                    <div class="mb-3"><label class="form-label" for="exampleFormControlInput1">prix de produit
                    </label>
                    <input name="prix" class="form-control" id="exampleFormControlInput1" type="number"
                        placeholder="tapper le prix de produit...">
                </div>
                @error('prix')
                    <div class="alert alert-danger"> {{ $message }}</div>
                @enderror
                        <div class="mb-3"><label class="form-label" for="exampleFormControlInput1">image de produit
                        </label>
                        <input name="image" class="form-control" id="exampleFormControlInput1" type="file"
                           >
                    </div>
                    @error('image')
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
    @foreach ($prod as $index => $p )
    <div class="modal fade" id="categomodif{{ $p->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modifier produit : <span class="text-primary">{{ $p->name }}</span></h5><button class="btn p-1"
                        type="button" data-bs-dismiss="modal" aria-label="Close"><span
                            class="fas fa-times fs--1"></span></button>

                </div>   
                <div><img src="{{ asset('uploads') }}/{{$p->image}} " alt="" srcset="" width="90px"></div>  
                <form action="/admin/produit/update" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="mb-3"><label class="form-label" for="exampleFormControlInput1">nom de produit
                            </label>
                            <input name="nom" class="form-control" id="exampleFormControlInput1" type="text" value="{{ $p->name }}"
                                placeholder="tapper le nom de produit...">
                        </div>
                        @error('nom')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror

                        {{-- envoie de id hidden dans un input --}}
                        <input name='id' type="hidden" value="{{$p->id}}">
                        <div class="mb-0"><label class="form-label" placeholder='description...'
                                for="exampleTextarea"> Description de produit </label>
                            <textarea name="description" class="form-control" id="exampleTextarea" rows="3">{{ $p->description }}</textarea>
                        </div>
                        @error('description')
                            <div class="alert alert-danger"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3"><label class="form-label" for="exampleFormControlInput1">Quantite de produit
                    </label>
                    <input name="qt" class="form-control" id="exampleFormControlInput1" type="number" value="{{ $p->quantite }}"
                        placeholder="tapper le quantite de produit...">
                </div>
                @error('qt')
                    <div class="alert alert-danger"> {{ $message }}</div>
                @enderror
                <div class="mb-3"><label class="form-label" for="exampleFormControlInput1">prix de produit
                </label>
                <input name="prix" class="form-control" id="exampleFormControlInput1" type="number" value="{{ $p->prix }}"
                    placeholder="tapper le nom de produit...">
            </div>
            @error('prix')
                <div class="alert alert-danger"> {{ $message }}</div>
            @enderror
                    <div class="mb-3"><label class="form-label" for="exampleFormControlInput1">image de produit
                    </label>
                    <input name="image" class="form-control" id="exampleFormControlInput1" type="file" 
            >
                </div>
                @error('image')
                    <div class="alert alert-danger"> {{ $message }}</div>
                @enderror
         
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
