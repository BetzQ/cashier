window.onbeforeunload = function () {
    if (localStorage.getItem("loadStock") == "true") {
        localStorage.removeItem("loadStock");
        localStorage.removeItem("indexStock");
        localStorage.removeItem("nilaiAwalStock");
        localStorage.removeItem("nilaiAkhirStock");
    } else if (localStorage.getItem("buktiLoadStock") == "true") {
        // Bukti Stock
        localStorage.removeItem("buktiLoadStock");
        localStorage.removeItem("buktiIndexStock");
        localStorage.removeItem("buktiNilaiAwalStock");
        localStorage.removeItem("buktiNilaiAkhirStock");
    }
};
// set stock
if (
    localStorage.getItem("nilaiAwalStock") ==
    localStorage.getItem("nilaiAkhirStock")
) {
    localStorage.removeItem("indexStock");
    localStorage.removeItem("nilaiAwalStock");
    localStorage.removeItem("nilaiAkhirStock");
} else if (localStorage.getItem("loadStock") == "false") {
    $("#adjustStock" + localStorage.getItem("indexStock")).append(
        `<input type="hidden" name="stock" value="` +
            localStorage.getItem("nilaiAkhirStock") +
            `">`
    );
    localStorage.setItem(
        "penghapusCardIndex",
        localStorage.getItem("indexStock")
    );
    localStorage.setItem(
        "penghapusCardStock",
        localStorage.getItem("nilaiAkhirStock")
    );
    localStorage.setItem("nilaiAwalStock", "");
    localStorage.removeItem("loadStock");
    $("#adjustStock" + localStorage.getItem("indexStock")).submit();
} else if (localStorage.getItem("nilaiAwalStock") == "") {
    localStorage.removeItem("indexStock");
    localStorage.removeItem("nilaiAwalStock");
    localStorage.removeItem("nilaiAkhirStock");
}
if (
    localStorage.getItem("buktiNilaiAwalStock") ==
    localStorage.getItem("buktiNilaiAkhirStock")
) {
    // Bagian Awal Stock###################
    // Bukti Stock
    localStorage.removeItem("buktiIndexStock");
    localStorage.removeItem("buktiNilaiAwalStock");
    localStorage.removeItem("buktiNilaiAkhirStock");
} else if (localStorage.getItem("buktiNilaiAwalStock", "") == "") {
    // Bukti Stock
    localStorage.removeItem("buktiIndexStock");
    localStorage.removeItem("buktiNilaiAwalStock");
    localStorage.removeItem("buktiNilaiAkhirStock");
} else if (localStorage.getItem("buktiLoadStock") == "false") {
    // Bukti Stock
    let buktiAkhir = parseInt(localStorage.getItem("buktiNilaiAkhirStock"));
    let buktiAwal = parseInt(localStorage.getItem("buktiNilaiAwalStock"));
    localStorage.setItem(
        "penghapusCardIndex",
        localStorage.getItem("buktiIndexStock")
    );
    localStorage.setItem(
        "penghapusCardStock",
        localStorage.getItem("buktiNilaiAkhirStock")
    );
    let hasil = buktiAkhir - buktiAwal;
    let hasil1;
    if (hasil < 0) {
        hasil1 = "update__: dikurangi= " + hasil;
    } else if (hasil >= 1) {
        hasil1 = "update__: ditambah= " + hasil;
    }
    $("#buktiStock" + localStorage.getItem("buktiIndexStock")).append(
        `<input type="hidden" name="bukti" value="` + hasil1 + `">`
    );
    localStorage.setItem("buktiNilaiAwalStock", "");
    localStorage.removeItem("buktiLoadStock");
    $("#buktiStock" + localStorage.getItem("buktiIndexStock")).submit();
}
if (localStorage.getItem("penghapusCardStock") < 1) {
    // Penghapusan Card apabila < 1
    // ##########################################
    $("#deleteCard" + localStorage.getItem("penghapusCardIndex")).submit();
}
// Tambah Satu Item
function tambahSatuItem(e, s) {
    localStorage.setItem("loadStock", "true");
    localStorage.setItem("indexStock", e);
    localStorage.setItem("nilaiAwalStock", s);
    $(
        ".editStock,.item" +
            e +
            ",.batal0" +
            e +
            ",.itemTambahSatu,.batalOrKirim"
    ).addClass("d-none");
    $(".batalOrKirim" + e + ",.bgItem" + e + ",#otherHand" + e).removeClass(
        "d-none"
    );
    // Data Set
    // input section
    let indexItem = $(".inputItem" + e).val();
    let valueGambar = $(".inputGambar" + e).val();
    let inputHarga1 = $(".inputHarga" + e).val();
    let inputHarga = parseInt(inputHarga1);
    // #################
    let namaBarang = $(".namaBarang" + e).html();
    let jumlahBarang = "1";
    let jmlItem = $(".jmlItem" + e).html();
    let gambarBarang = $(".gambarBarang" + e).attr("src");
    // Stock Barang
    let SBarang1 = $(".SBarang" + e).html();
    let SBarang = parseInt(SBarang1);
    SBarang -= 1;
    $(".SBarang" + e).html(SBarang);
    localStorage.setItem("nilaiAkhirStock", SBarang);
    // ###########
    if ($(".jmlItem" + e).val() == "") {
        $(".jmlItem" + e).html("1");
        $("#sendSelectedData").append(
            `<input type="hidden" name="nama" value="` +
                namaBarang +
                `" class="input00` +
                e +
                `">
    <input type="hidden" name="harga" value="` +
                inputHarga +
                `" class="input00` +
                e +
                `">
    <input type="hidden" name="jumlah_barang" value="` +
                jumlahBarang +
                `" id="inputJumlahBarang` +
                e +
                `" class="input00` +
                e +
                `">
    <input type="hidden" name="gambar" value="` +
                valueGambar +
                `" class="input00` +
                e +
                `">`
        );
        $(".keranjangItem").append(
            `
                <div class="row" id="perItem` +
                indexItem +
                `">
            <input type="hidden" class="inputItem` +
                indexItem +
                `" value="` +
                indexItem +
                `">
        <div class="col-2 ps-md-4 py-md-2 border">` +
                namaBarang +
                `</div>
        <div class="col-3 ps-md-4 py-md-2 border">Rp.` +
                inputHarga.toLocaleString() +
                `</div>
        <div class="col-2 ps-md-4 py-md-2 border jumlahBarang` +
                indexItem +
                `">` +
                jmlItem +
                `</div>
        <div class="col-3 ps-md-4 py-md-2 border">
          <img
            src="` +
                gambarBarang +
                `"
            alt=""
            width="50px"
          />
        </div>
        <div class="col-2 ps-md-4 pt-md-1 pt-2 border">
          <button id="deleteItem` +
                e +
                `" class="badge rounded-pill text-bg-danger border-0 mb-1" onclick="deleteItem(` +
                indexItem +
                `)">Hapus</button>
          <button id="kurangiItem` +
                e +
                `" class="badge rounded-pill text-bg-warning border-0" onclick="kurangiItem(` +
                indexItem +
                `)">kurangi</button>
        </div>
      </div>`
        );
        // Set ke 1 Jumlah Barang Di Keranjang
        $(".jumlahBarang" + e).html("1");
    }
}
// Tambah lebih dari satu item
function tambahLebihDariSatuItem(e) {
    // Stock Barang
    let SBarang1 = $(".SBarang" + e).html();
    let SBarang = parseInt(SBarang1);
    SBarang -= 1;
    $(".SBarang" + e).html(SBarang);
    localStorage.setItem("nilaiAkhirStock", SBarang);
    if (localStorage.getItem("nilaiAkhirStock") < 1) {
        $(".itemPlus" + e).addClass("d-none");
    }
    // #############
    let IJBarang1 = parseInt($("#inputJumlahBarang" + e).val());
    IJBarang1 += 1;
    let IStock = parseInt($("#inputStock" + e).val());
    IStock -= 1;
    $("#inputJumlahBarang" + e).val(IJBarang1);
    $("#inputStock" + e).val(IStock);
    // Penghilangan button tambah
    // Data Set
    let tambah = parseInt($(".jmlItem" + e).html());
    // let indexItem = $(".inputItem" + i).val();
    let valueJmlBarang = parseInt($(".jumlahBarang" + e).html());
    // ##########################################################;
    let tambah1 = tambah + 1;
    let tambah2 = valueJmlBarang + 1;
    $(".jmlItem" + e).html(tambah1);
    $(".jumlahBarang" + e).html(tambah2);
    // Jumlah Barang
}
// kurangi
function kurangiItem(e) {
    // Data Set
    let valueJmlBarang = parseInt($(".jmlItem" + e).html());
    let kurangiCard = parseInt($(".jmlItem" + e).html());
    // ############
    // Stock Barang
    let SBarang1 = $(".SBarang" + e).html();
    let SBarang = parseInt(SBarang1);
    SBarang += 1;
    $(".SBarang" + e).html(SBarang);
    localStorage.setItem("nilaiAkhirStock", SBarang);
    if (localStorage.getItem("nilaiAkhirStock") > 0) {
        $(".itemPlus" + e).removeClass("d-none");
    }
    // ###############
    // Kurangi barang dan Stock dari segi input hidden
    let IJBarang1 = parseInt($("#inputJumlahBarang" + e).val());
    IJBarang1 -= 1;
    $("#inputJumlahBarang" + e).val(IJBarang1);
    let IStock = parseInt($("#inputStock" + e).val());
    IStock += 1;
    $("#inputStock" + e).val(IStock);
    // ###################
    valueJmlBarang -= 1;
    kurangiCard -= 1;
    $(".jumlahBarang" + e).html(valueJmlBarang);
    $(".jmlItem" + e).html(kurangiCard);
    if (valueJmlBarang < 1) {
        localStorage.removeItem("indexStock");
        localStorage.removeItem("nilaiAwalStock");
        localStorage.removeItem("nilaiAkhirStock");
        $("#perItem" + e).remove();
        $(".input00" + e).remove();
        $(".editStock,.itemTambahSatu" + ",.stock" + e).removeClass("d-none");
        $(
            ".batalOrKirim,.bgItem" +
                e +
                ",itemMinus" +
                e +
                ",itemPlus" +
                e +
                ",.batal0" +
                e +
                ",#otherHand" +
                e
        ).addClass("d-none");
        $("#otherHand" + e).val("");
    }
}
// Memunculkan Modal
$(".itemTerpilih").click(function () {
    $(".bgModal,.Modal,.x-circle,.masukkanKeranjang").removeClass("d-none");
    $("body").css("overflow", "hidden");
    window.scrollTo(0, 0);
});
// Tutup Modal
$(".x-circle").click(function () {
    $(".bgModal,.Modal,.x-circle,.masukkanKeranjang").addClass("d-none");
    $("body").css("overflow", "");
});
// Keranjang Item
// hapus
function deleteItem(e) {
    $("#perItem" + e).remove();
}

// send selected data
function sendSelectedData(e) {
    var check = confirm("yakin untuk memasukkan data ini?");
    if (check) {
        let other = $("#otherHand" + e).val();
        $("#sendSelectedData").append(
            `
        <input type="hidden" name="other" value="` +
                other +
                `" class="input00` +
                e +
                `">`
        );
        localStorage.setItem("loadStock", "false");
        document.querySelector("#sendSelectedData").submit();
    }
}
// Set Stock Item
function stockEdit(e, s) {
    localStorage.setItem("buktiIndexStock", e);
    localStorage.setItem("buktiNilaiAwalStock", s);
    $(".editStock,.itemTambahSatu,.bgItem" + e + ",.stock" + e).addClass(
        "d-none"
    );
    $(".batal0" + e + ",.bgStock" + e).removeClass("d-none");
}
function batal(e) {
    localStorage.removeItem("buktiNilaiAwalStock");
    $(".bgStock" + e).val("");
    $(".editStock,.item" + e + ",.itemTambahSatu").removeClass("d-none");
    $(".batal0" + e + ",.bgStock" + e).addClass("d-none");
}
function update(e) {
    var check = confirm("yakin ingin mengupdate stock?");
    if (check) {
        localStorage.setItem("buktiLoadStock", "false");
        let inputUpdateStock = $(".bgStock" + e).val();
        localStorage.setItem("buktiNilaiAkhirStock", inputUpdateStock);
        $("#adjustStock00" + e).append(
            `<input type="hidden" name="stock" value="` +
                inputUpdateStock +
                `">`
        );
        $("#adjustStock00" + e).submit();
    }
}
// Kirim/batal
function batalKirim(e, a) {
    localStorage.removeItem("indexStock");
    localStorage.removeItem("nilaiAwalStock");
    localStorage.removeItem("nilaiAkhirStock");
    $(".itemTambahSatu,.editStock").removeClass("d-none");
    $(".bgItem,.batalOrKirim,#otherHand" + e).addClass("d-none");
    $("#otherHand" + e).val("");
    $("#perItem" + e).remove();
    $(".input00" + e).remove();
    $(".SBarang" + e).html(a);
    $(".itemPlus" + e).removeClass("d-none");
}
// Button Penghapusan stock
function buttonDeleteCard(e) {
    var check = confirm("yakin ingin menghapus card?");
    if (check) {
        $("#deleteCard" + e).submit();
    }
}
