if (localStorage.getItem("loadCard") == "false") {
    let gambar = $("#gambar00").val();
    let bukti = localStorage.getItem("stock");
    let hasil = "tambahCard__: stock = " + bukti;
    $("#inputMSTambah").append(
        `<input type="hidden" name="nama" value="` +
            localStorage.getItem("nama") +
            `">
        <input type="hidden" name="harga" value="` +
            localStorage.getItem("harga") +
            `">
        <input type="hidden" name="gambar" value="` +
            gambar +
            `">
        <input type="hidden" name="bukti" value="` +
            hasil +
            `">`
    );
    localStorage.removeItem("nama");
    localStorage.removeItem("harga");
    localStorage.removeItem("stock");
    localStorage.removeItem("loadCard");
    $("#inputMSTambah").submit();
}
function previewImage() {
    const gambar = document.querySelector("#gambar");
    const imgPreview = document.querySelector(".img-preview");

    imgPreview.style.display = "block";
    imgPreview.style.width = "150px";

    const blob = URL.createObjectURL(gambar.files[0]);
    imgPreview.src = blob;
}
function tambah() {
    let nama = $("#nama").val();
    let harga = $("#harga").val();
    let stock = $("#stock").val();
    localStorage.setItem("nama", nama);
    localStorage.setItem("harga", harga);
    localStorage.setItem("stock", stock);
    localStorage.setItem("loadCard", "false");
    $("#Card00").submit();
}
