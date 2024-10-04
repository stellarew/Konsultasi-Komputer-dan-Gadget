<?php include('../header.php'); ?>
<main>
    <h2>Tambah Mobil</h2>
    <form action="../processes/process_add_car.php" method="POST" onsubmit="return formatPriceBeforeSubmit()">
        <input type="text" name="model" placeholder="Model" required>
        <input type="text" name="brand" placeholder="Brand" required>
        
        <!-- Dropdown untuk memilih tahun, terbaru di atas -->
        <select name="year" required>
            <option value="" disabled selected>Pilih Tahun</option>
            <?php
            // Menghasilkan dropdown tahun dari tahun saat ini hingga 1980
            $currentYear = date("Y");
            for ($year = $currentYear; $year >= 1980; $year--) {
                echo "<option value='$year'>$year</option>";
            }
            ?>
        </select>

        <!-- Input harga dengan format mata uang -->
        <input type="text" id="price" name="price" placeholder="Harga" required oninput="formatCurrency(this)">

        <button type="submit">Tambah Mobil</button>
    </form>

    <script>
        // Fungsi untuk memformat input harga menjadi format mata uang
        function formatCurrency(input) {
            // Menghapus semua karakter selain angka
            let value = input.value.replace(/\D/g, ''); // Hanya ambil angka
            // Memformat sebagai mata uang
            if (value) {
                // Mengonversi nilai ke format rupiah
                input.value = 'Rp ' + new Intl.NumberFormat('id-ID').format(value);
                setCursorToEnd(input);
            } else {
                input.value = '';
            }
        }

        function formatPriceBeforeSubmit() {
            // Menghapus format mata uang sebelum submit
            let priceInput = document.getElementById('price');
            let rawValue = priceInput.value.replace(/Rp\s/g, '').replace(/\./g, ''); // Menghapus simbol Rp dan titik
            priceInput.value = rawValue; // Set input ke angka tanpa format

            // Pastikan harga adalah angka bulat
            if (isNaN(priceInput.value) || priceInput.value === "") {
                alert("Harga tidak valid!");
                return false; // Mencegah submit jika harga tidak valid
            }

            return true; // Melanjutkan submit
        }

        function setCursorToEnd(input) {
            // Menempatkan kursor di akhir input
            setTimeout(() => {
                input.selectionStart = input.value.length; // Pindahkan kursor ke akhir
                input.selectionEnd = input.value.length; // Pindahkan kursor ke akhir
            }, 0);
        }
    </script>
</main>
<?php include('../footer.php'); ?>
