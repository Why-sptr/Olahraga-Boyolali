<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="{{('css/style.css')}}">

    <title>Olahraga Boyolali</title>
</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bxs-hot'></i>
            <span class="text">Olahraga Boyolali</span>
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="/homepage">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
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
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
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
                    <h1>Dashboard</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                    </ul>
                </div>
                <!-- <a href="#" class="btn-download">
                    <i class='bx bxs-cloud-download'></i>
                    <span class="text">Download PDF</span>
                </a> -->
            </div>

            <ul class="box-info">
                <li>
                    <i class='bx bxs-hot'></i>
                    <span class="text">
                        <h3>10</h3>
                        <p>Cabor</p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-group'></i>
                    <span class="text">
                        <h3>{{ $total_pelatih }}</h3>
                        <p>Pelatih</p>
                    </span>
                </li>
                <li>
                    <i class='bx bx-football'></i>
                    <span class="text">
                        <h3>{{ $total_atlet }}</h3>
                        <p>Atlet</p>
                    </span>
                </li>
            </ul>


            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Overview</h3>
                        <i class='bx bx-search'></i>
                        <i class='bx bx-filter'></i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Cabor</th>
                                <th>Atlet</th>
                                <th>Pelatih</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAc5JREFUSEu1lf0xBUEQxPtFQAaIgAwQASJABGSADIgAEZCBJwMZIAMioH5X06/m9vb27p+bqqt6dneme3o+rLSwrRaOrzkAp5JOJD1I+pD0KmkrfvP3c4tkC+BI0qOk3QhwLGkd32EKytldnA+wxgC2JX0FUzuNAXD/G0R+SoQaAMF5eBCskAPbC1AY5wwITrbIZd8NTgnAwxdJsMXBIOh+ESw/E8scnLdvks6yXCUAsuxEBhkEZjB/knQeALXgfodvZxmAboG9DZkMwhnFNvux4Pa9DDI9gMyOh++SblO6los7a25ZYJ6Nlr4uM7DGyIT+fGZOANeEM/9G8zK4yUGiOWg4XkUWpVw15mQMOT6M7HsAHPyF1ujdMQjLmnOUW5ghu4/GKJTqA5T9XQtO4CwRmZkxd/tB8LtWZFggSbZat3Cfu4tMb4qMR4vM7hljngvqqS7lsi/DxnAOikx3kGarz9medBzMkShPPGsFebwgBwA4gdzqc7PnHTupXCsMLPXsbGrZlX1OKwKepzq38OSyM3BtXXNnAEAAtwFCZrPWtZ0Iwmzk1WwAzukcDM2pyUaW3IZz/mXiTI/zwRCNXWTq0HXLmM0BaPlP3i0O8A8pQYgZRZLF2AAAAABJRU5ErkJggg=="/>
                                    <span>Basket</span>
                                </td>
                                <td>Jumlah Atlet : {{ $baskets_atlet }}</td>
                                <td>Jumlah Pelatih : {{ $baskets_pelatih }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAc5JREFUSEu1lTsyBVEQhr+7AkRkWAECUuyAIkeuymMD2IBHlRw5hRUQE2AHZGSsgPpV91TPuefMHY/bycz06dN/P/7u6dBn6fTZP20AFoAJYA6YtIAegVtAz+umIJsA5OwkOC35EciagXXZlAB2gR2zfgFOgU1gwHQfwCGwCoyaTnf2UoQcgC5umOGWOdLnoAHpXY7fzUbAB/Z+ZIFUOCmA6n1pp1OltDO1UjkfTL8IXLlNCvBsKcfI2xLNM5GP8RyA0lZTlfpQweu06e8L57qrPlVZxAzUyBW7OG80jH6U1b4ptkPd3UY0vrGPM+tTbQ5EN/FdIo4LRDICHANLSdQXwDrwGu7M2rt8qYc1gM/goIrAHJ8XSrIMCEgSK1D5jiVygCebWqehjBXlcALyZtm5WjRW5l6Fb98RwEtUo5ndVu3VgyjivnoRxWmuIL/XSq7JOYqKPXeJsxkgZZNTNdtkp2mNx4Xal9Q+R1ma6tJ/DJp215hH0LQq3CY3E34Wue+6xlUho7js9B1nIi2Nzpz7Ouu57NxBXNfS6VuNUwklKoGmXnqX7P7q9cPR8DivS40VJUUQ0bxL2v4yxenSL7Nazb8F+CFT6+ZtMvgTwBdZb2AZ8PkKBQAAAABJRU5ErkJggg==" />
                                    <span>Sepak Bola</span>
                                </td>
                                <td>Jumlah Atlet : {{ $sepak_bolas_atlet }}</td>
                                <td>Jumlah Pelatih : {{ $sepak_bolas_pelatih }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="todo">
                    <div class="head">
                        <h3>Todos</h3>
                        <i class='bx bx-plus'></i>
                        <i class='bx bx-filter'></i>
                    </div>
                    <ul class="todo-list">
                        <li class="completed">
                            <p>Todo List</p>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="completed">
                            <p>Todo List</p>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="not-completed">
                            <p>Todo List</p>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="completed">
                            <p>Todo List</p>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="not-completed">
                            <p>Todo List</p>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                    </ul>
                </div>
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script src="{{asset('js/script.js')}}"></script>
</body>

</html>