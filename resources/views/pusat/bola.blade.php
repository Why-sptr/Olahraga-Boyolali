<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Olahraga Boyolali</title>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="{{('css/style.css')}}">

</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bxs-hot'></i>
            <span class="text">Olahraga Boyolali</span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="/homepage">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="active">
                <a href="#">
                    <i class='bx bx-football'></i>
                    <span class="text">Cabang Olahraga</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="/databasket">Cabang Olahraga Basket</a></li>
                    <li><a href="/databola">Cabang Olahraga Sepak Bola</a></li>
                    <li><a href="#">Cabang Olahraga Bola Volly</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-group'></i>
                    <span class="text">Akun Cabang</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="#">
                    <i class='bx bxs-cog'></i>
                    <span class="text">Settings</span>
                </a>
            </li>
            <li>
                <a href="#" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
            <a href="#" class="nav-link">Categories</a>
            <form action="{{ route('bola') }}" method="GET">
                <div class="form-input">
                    <input type="search" name="search" placeholder="Search...">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>

            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode"></label>
            <!-- <a href="#" class="notification">
                <i class='bx bxs-bell'></i>
                <span class="num">8</span>
            </a> -->
            <a href="#" class="profile">
                <img src="images/foto.png">
            </a>
        </nav>
        <!-- NAVBAR -->
        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Cabang Olahraga</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Cabor</a>
                        </li>
                        <i class="bx bx-chevron-right"></i>
                        <li>
                            <a class="active" href="/databola">Sepak Bola</a>
                        </li>
                    </ul>
                </div>
                <a href="/exportpdf" class="btn-download">
                    <i class='bx bxs-cloud-download'></i>
                    <span class="text">Download PDF</span>
                </a>
            </div>

            <!-- <ul class="box-info">
                <li>
                    <i class='bx bxs-hot'></i>
                    <span class="text">
                        <h3>30</h3>
                        <p>Atlet</p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-group'></i>
                    <span class="text">
                        <h3>5</h3>
                        <p>Pelatih</p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-group'></i>
                    <span class="text">
                        <h3>5</h3>
                        <p>Pelatih</p>
                    </span>
                </li>
            </ul> -->

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Data Atlet</h3>
                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah Data</button>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>TTL</th>
                                <th>NIK</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        @foreach($olahraga as $index => $or)
                        @if($or->level_cabor === 'atlet')
                        <tbody>
                            <tr>
                                <td>
                                    <img src="{{ asset('fotobola/'.$or->foto)}}">
                                    <p>{{ $or->nama }}</p>
                                </td>
                                <td>{{ $or->ttl }}</td>
                                <td>{{ $or->nik }}</td>
                                <td><a href="#" class="status completed" data-bs-toggle="modal" data-bs-target="#ModalView{{$or['id']}}">Lihat</a><span style="margin-left: 10px;"><a href="#" class="status pending" data-bs-toggle="modal" data-bs-target="#ModalDelete{{$or['id']}}">Hapus</a></span>
                                </td>
                            </tr>
                        </tbody>
                        @endif
                        @endforeach
                    </table>
                </div>
                <div class="order">
                    <div class="head">
                        <h3>Data Pelatih</h3>
                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah Data</button>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>TTL</th>
                                <th>NIK</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        @foreach($olahraga as $index => $or)
                        @if($or->level_cabor === 'pelatih')
                        <tbody>
                            <tr>
                                <td>
                                    <img src="{{ asset('fotobola/'.$or->foto)}}">
                                    <p>{{ $or->nama }}</p>
                                </td>
                                <td>{{ $or->ttl }}</td>
                                <td>{{ $or->nik }}</td>
                                <td><a href="#" class="status completed" data-bs-toggle="modal" data-bs-target="#ModalView{{$or['id']}}">Lihat</a><span style="margin-left: 10px;"><a href="#" class="status pending" data-bs-toggle="modal" data-bs-target="#ModalDelete{{$or['id']}}">Hapus</a></span>
                                </td>
                            </tr>
                        </tbody>
                        @endif
                        @endforeach
                    </table>
                </div>
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <!-- Delete Modal -->
    @foreach($olahraga as $index => $or)
    <div id="ModalDelete{{$or->id}}" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus <span style="font-weight: bold;">{{$or->nama}}</span></p>
                </div>
                <div class="modal-footer">
                    <form action="/deletebola/{{$or->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <!-- Rest of the form fields -->
                        <button type="submit" class="btn btn-danger" style="margin-top: 10px; margin-left: 10px;">Hapus</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    @endforeach

    <!-- View Modal -->
    @foreach($olahraga as $index => $or)
    <div class="modal fade" id="ModalView{{$or->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('fotobola/'.$or->foto)}}" class="rounded mx-auto d-block" style="max-height: 350px;" alt="Foto">
                    <form action="{{ route('admin/updatedatabola', ['id' => $or->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Foto</label>
                            <input type="file" name="foto" class="form-control">
                            @error('foto')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $or->nama }}">
                            @error('nama')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
    
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">TTL</label>
                            <input type="text" name="ttl" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $or->ttl }}">
                            @error('ttl')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">NIK</label>
                            <input type="text" name="nik" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $or->nik }}">
                            @error('nik')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Olahraga</label>
                            <select class="form-select" name="cabor" aria-label="Default select example">
                                <option selected>{{ $or->cabor }}</option>
                                <option value="Sepak Bola">Sepak Bola</option>
                            </select>
                            @error('cabor')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Status Data</label>
                            <select class="form-select" name="level_cabor" aria-label="Default select example">
                                <option selected>{{ $or->level_cabor }}</option>
                                <option value="atlet">Atlet</option>
                                <option value="pelatih">Pelatih</option>
                            </select>
                            @error('level_cabor')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" url="/updatedata/{id}" class="btn btn-primary">Kirim</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    @endforeach

    <!-- Insert Data Modal -->
    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahModalLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Tambah data disini</p>
                    <form action="/insertbola" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Foto</label>
                            <input type="file" name="foto" class="form-control">
                            @error('foto')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('nama') }}">
                            @error('nama')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">TTL</label>
                            <input type="text" name="ttl" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('ttl') }}">
                            @error('ttl')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">NIK</label>
                            <input type="text" name="nik" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('nik') }}">
                            @error('nik')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Olahraga</label>
                            <select class="form-select" name="cabor" aria-label="Default select example" value="{{ old('cabor') }}">
                                <option selected>Pilih Olahraga</option>
                                <option value="Sepak Bola">Sepak Bola</option>
                            </select>
                            @error('cabor')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Status Data</label>
                            <select class="form-select" name="level_cabor" aria-label="Default select example" value="{{ old('level_cabor') }}">
                                <option selected>Pilih Status</option>
                                <option value="atlet">Atlet</option>
                                <option value="pelatih">Pelatih</option>
                            </select>
                            @error('level_cabor')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-secondary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="{{asset('js/script.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>



</body>

</html>