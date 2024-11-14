<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Fatture</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .navbar{
        background-color: #007bff;
        }
        .navbar-brand, .navbar-nav .nav-link {
            color: white !important;
        }
        .container {
            margin-top: 50px;
        }
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }
        .card-header {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
     <!-- Barra di navigazione -->
     <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Gestione CRM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('clients.index') }}">Clienti</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    </li>
                </ul>
                <!-- Form di logout invisibile -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Lista Fatture</h2>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Numero Fattura</th>
                            <th>Data</th>
                            <th>Cliente</th>
                            <th>Importo (€)</th>
                            <th>Stato</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Fatture fittizie -->
                        <tr>
                            <td>1</td>
                            <td>FAT-2023-001</td>
                            <td>2023-11-01</td>
                            <td>Mario Rossi</td>
                            <td>500,00</td>
                            <td><span class="badge bg-success">Pagata</span></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>FAT-2023-002</td>
                            <td>2023-11-05</td>
                            <td>Giulia Bianchi</td>
                            <td>1.200,00</td>
                            <td><span class="badge bg-warning">In attesa</span></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>FAT-2023-003</td>
                            <td>2023-11-10</td>
                            <td>Luca Verdi</td>
                            <td>750,00</td>
                            <td><span class="badge bg-danger">Scaduta</span></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>FAT-2023-004</td>
                            <td>2023-11-12</td>
                            <td>Anna Neri</td>
                            <td>300,00</td>
                            <td><span class="badge bg-success">Pagata</span></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>FAT-2023-005</td>
                            <td>2023-11-15</td>
                            <td>Marco Blu</td>
                            <td>1.050,00</td>
                            <td><span class="badge bg-warning">In attesa</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Script di Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
