// $('.date-form').daterangepicker({
//     opens: 'left'
// }, function (start, end, label) {
//     $("dateRange " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));

// });
// console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));

window.addEventListener("alert.message", (event) => {

    const Toast = Swal.mixin({
        toast: true,
        position: "top",
        iconColor: "white",
        customClass: { popup: "colored-toast" },
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true,
    });
    let { type, message } = event.detail[0];
    Toast.fire({
        icon: type,
        title: message,
    });
});


//START OPEN MODAL POPUP
window.addEventListener("modal.openModal", (event) => {
    console.log('Hello');
    $("#openModal").modal("show");
});
// CLOSED MODAL OPEN FORM
window.addEventListener("modal.closeModal", (event) => {
    $("#openModal").modal("hide");
});

//OPEN MODAL FORM
window.addEventListener("modal.openModalUpdate", (event) => {
    $("#openModalUpdate").modal("show");
});
// CLOSE UPDATE MODAL FORM
window.addEventListener("modal.closeModalUpdate", (event) => {
    $("#openModalUpdate").modal("hide");
});

// OPEN MODAL CHANGING CURRENT PASSWORD
window.addEventListener("modal.openModalChangePassword", (event) => {
    $("#openModalChangePassword").modal("show");
});
// CLOSED MODAL CHANGE PASSWORD
window.addEventListener("modal.closeModalChangePassword", (event) => {
    $("#openModalChangePassword").modal("hide");
});

// OPEN MODAL SetAwardTarget
window.addEventListener('modal.openModalSetAwardTarget', event => {
    $("#openModalSetAwardTarget").modal("show");
});

window.addEventListener('modal.closeModalSetAwardTarget', event => {
    $("#openModalSetAwardTarget").modal("hide");
});

// OPEN MODAL CreateAwardTarget
window.addEventListener('modal.openModalCreateAwardTarget', event => {
    $("#openModalCreateAwardTarget").modal("show");
});
// CLOSED CreateAwardTarget
window.addEventListener('modal.closeModalCreateAwardTarget', event => {
    $("#openModalCreateAwardTarget").modal("hide");
});

// OPEN MODAL SetTarget
window.addEventListener('modal.openModalSetTarget', event => {
    $("#openModalSetTarget").modal("show");
});
// CLOSED SetTarget
window.addEventListener('modal.openModalSetTarget', event => {
    $("#openModalSetTarget").modal("hide");
});

//OPEN APPLY ROLE PERMISSION
window.addEventListener("modal.openModalApplyRole", (event) => {
    $("#openModalApplyRole").modal("show");
});

// ADDRESS MODAL
window.addEventListener("modal.addressModal", (event) => {
    $("#addressModal").modal("show");
});
window.addEventListener('modal.closeAddressModal', event => {
    $("#addressModal").modal("hide");
});
// Guarantor MODAL
window.addEventListener("modal.guarantorModal", (event) => {
    $("#guarantorModal").modal("show");
});

// Bank Info
window.addEventListener("modal.bankModal", (event) => {
    $("#bankModal").modal("show");
});

// Update Status of Agency
window.addEventListener("modal.updateStatus", (event) => {
    $("#statusModal").modal("show");
});
// Update Code in Agency List
window.addEventListener("modal.updateCode", (event) => {
    $("#updateCode").modal("show");
});
window.addEventListener("modal.closeUpdateCode", (event) => {
    $("#updateCode").modal("hide");
});

// Show Filter Status
window.addEventListener("modal.modal.ShowFilterStatus", (event) => {
    $("#Status_id").modal("show");
});
window.addEventListener("modal.confirmDelete", (event) => {
    $("#delete").modal("show");
});
window.addEventListener("modal.closeDelete", (event) => {
    $("#delete").modal("hide");
});

////Update Shop MODAL FORM
window.addEventListener('modal.openModalUpdateShop', (event) => {
    $("#openUpdateShop").modal("show");
});

window.addEventListener('modal.closeModalUpdateShop', (event) => {
    $("#openUpdateShop").modal("hide");
});
//
window.addEventListener('modal.openEditProductModal', event => {
    $("#opendProductModal").modal("show");
});
window.addEventListener('modal.closeModal', event => {
    $("#opendProductModal").modal("hide");
});

window.addEventListener('modal.openModalCommission', event => {
    $("#openModalCommission").modal("show");
});

window.addEventListener('modal.openModalAssign', event => {
    $("#openModalAssign").modal("show");
});
window.addEventListener('modal.closeModalAssign', event => {
    $("#openModalAssign").modal("hide");
});

//
//window.addEventListener('modal.closedForm', event => {
//    $('#openModal').modal("hide");

//});

