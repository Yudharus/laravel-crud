<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Daftar Produk</h1>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProductModal">Tambah Data</button>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#salesChartModal">Chart Penjualan</button>

        </div>

        <!-- Modal for Adding Product -->
        <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addProductModalLabel">Tambah Produk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('products.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="qty">Jumlah</label>
                                <input type="number" class="form-control" id="qty" name="qty" required>
                            </div>
                            <div class="form-group">
                                <label for="penjualan">Penjualan</label>
                                <input type="number" class="form-control" id="penjualan" name="penjualan" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table of Products -->
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Jumlah</th>
                    <th>Penjualan</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->qty }}</td>
                        <td>{{ $product->penjualan }}</td>
                        <td class="text-center">
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-info">Detail</a>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal for Sales Chart -->
    <div class="modal fade" id="salesChartModal" tabindex="-1" aria-labelledby="salesChartModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="salesChartModalLabel">Chart Penjualan Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Tempat untuk menampilkan chart penjualan -->
                    <canvas id="salesChart" width="800" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
    // Ambil data produk dari PHP
    var products = @json($products);

    // Persiapkan data untuk chart
    var productNames = products.map(product => product.name);
    var productQty = products.map(product => product.qty);
    var productSales = products.map(product => product.penjualan);

    // Hitung persentase penjualan untuk setiap produk
    var productSalesPercentage = [];
    for (var i = 0; i < products.length; i++) {
        var salesPercentage = (productSales[i] / productQty[i]) * 100;
        productSalesPercentage.push(salesPercentage);
    }

    // Render chart menggunakan Chart.js
    var ctx = document.getElementById('salesChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: productNames,
            datasets: [{
                label: 'Persentase Penjualan',
                data: productSalesPercentage,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

</body>
</html>
