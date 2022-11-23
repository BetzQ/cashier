// for (let i = 0; i < 10; i++) {
//         $(".penampungData").append(
//             `<div class="row border" id="perItem` +
//                 i +
//                 `">
//         <div class="col-1 border pt-2">` +
//                 i +
//                 `</div>
//         <div class="col-1 border pt-2 dateNoneMobile">` +
//                 i +
//                 `-` +
//                 i +
//                 `</div>
//         <div class="col-2 border pt-2">Gamis</div>
//         <div class="col-2 border pt-2">Rp 810.000<div class="Modal modal` +
//                 i +
//                 ` position-absolute bg-light d-none">
//     <img src="https://images.tokopedia.net/img/cache/500-square/VqbcmM/2020/5/3/21fb9267-e47b-41e0-9035-aa1252c4d3c5.jpg" alt="" class="rounded">
//     </div></div>
//         <div class="col-md-2 col-3 border pt-2">10</div>
//         <div class="col-2 border pt-2 pb-md-2 pb-0">
//           <img
//             src="https://images.tokopedia.net/img/cache/500-square/VqbcmM/2020/5/3/21fb9267-e47b-41e0-9035-aa1252c4d3c5.jpg"
//             alt="" class="gambarPerItem"
//           />
//           <button class="badge text-dark bg-success border-0 DNL" id="tekanLihatGambar` +
//                 i +
//                 `"><i class="bi bi-eye-fill"></i></button>
//           <button class="badge text-dark bg-success border-0 d-none DNT" id="tekanTutupGambar` +
//                 i +
//                 `"><i class="bi bi-eye-fill"></i></button>
//         </div>
//         <div class="col-2 border pt-2"><button class="btn btn-danger hapusRow mt-1 mt-md-2" onclick="kurangiItem(` +
//                 i +
//                 `)">Delete</button></div>
//         <div class="col border pt-2 dateMobile text-center">Tanggal : ` +
//                 i +
//                 `-` +
//                 i +
//                 `</div>
//       </div>`
//         );
//     // Tekan Lihat Gambar
//     // Desktop
//     if (screen.width < 576) {
//         $("#tekanLihatGambar" + i)
//             .on("mousedown", function () {
//                 let x = $("#tekanLihatGambar" + i).position();
//                 let y = x.top - 180;
//                 $(".modal" + i)
//                     .removeClass("d-none")
//                     .css("top", y);
//             })
//             .on("mouseup mouseleave", function () {
//                 $(".modal" + i).addClass("d-none");
//             });
//     }
//     // Mobile
//     if (screen.width < 576) {
//         $("#tekanLihatGambar" + i).click(function () {
//             $(".DNT").addClass("d-none");
//             $(".DNL").removeClass("d-none");
//             let x = $("#tekanLihatGambar" + i).position();
//             let y = x.top - 90;
//             $(".modal" + i + ",#tekanTutupGambar" + i)
//                 .removeClass("d-none")
//                 .css("top", y);
//             $("#tekanLihatGambar" + i).addClass("d-none");
//         });
//         $("#tekanTutupGambar" + i).click(function () {
//             $(".modal" + i + ",#tekanTutupGambar" + i).addClass("d-none");
//             $("#tekanLihatGambar" + i).removeClass("d-none");
//         });
//     }
// }
function showImage(e) {
    let x = $("#tekanLihatGambar" + e).position();
    let y = x.top - 130;
    $(".modal" + e)
        .removeClass("d-none")
        .css("top", y);
}
function leftMouseImage(e) {
    $(".modal" + e).addClass("d-none");
}
function seeImage(e) {
    if (screen.width < 576) {
        $(".DNT").addClass("d-none");
        $(".DNL").removeClass("d-none");
        let x = $("#tekanLihatGambar" + e).position();
        let y = x.top - 50;
        $(".modal" + e + ",#tekanTutupGambar" + e)
            .removeClass("d-none")
            .css("top", y);
        $("#tekanLihatGambar" + e).addClass("d-none");
    }
}
function closeImage(e) {
    if (screen.width < 576) {
        $(".modal" + e + ",#tekanTutupGambar" + e).addClass("d-none");
        $("#tekanLihatGambar" + e).removeClass("d-none");
    }
}
// Kurangi item
function kurangiItem(e) {
    if (confirm("Yakin ingin menghapus?") == true) {
        $("#perItem" + e).remove();
    }
}
// delete data
function deleteData(e) {
    if (confirm("yakin untuk menghapus data ini?") == true) {
        document.querySelector("#deleteData" + e).submit();
    } else {
        event.preventDefault();
    }
}
function deleteDataTOU(e) {
    event.preventDefault();
    if (confirm("yakin untuk menghapus data ini?") == true) {
        document.querySelector("#deleteData" + e).submit();
    }
}
