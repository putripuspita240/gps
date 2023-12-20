// Mendapatkan elemen gambar
const gambar = document.getElementById("gambar");

// Menambahkan event listener untuk mengatur perbesaran saat gambar diklik
gambar.addEventListener("click", function () {
    if (gambar.classList.contains("zoomed")) {
        gambar.classList.remove("zoomed");
    } else {
        gambar.classList.add("zoomed");
    }
});

// Interaksi JavaScript
const learnMoreBtn = document.getElementById("learnMoreBtn");

learnMoreBtn.addEventListener("click", () => {
    // Ganti URL dengan URL halaman "Tentang Kami" atau tujuan lainnya.
    window.location.href = "tentang-kami.html";
});