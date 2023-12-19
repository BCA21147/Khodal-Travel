<?php
include('components/head_links.php');
include('components/header.php');
?>

<!-- REST TIME - Modal -->
<div class="rest_time_loader position-fixed d-none" id="rest_time_loader">
    <div class="w-100 h-100 d-flex flex-column justify-content-center align-items-center">
        <div class="spinner-border text-white" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="text-white p-3 preloader_content">
            <b>Please Wait Few Seconds ...</b>
        </div>
    </div>
</div>

<div class="container mt-5 mb-3">
    <div class="row">
        <div class="col-md-6 col-sm-9 col-12 mx-auto">
            <form method="post" id="find_ticket">
                <div class="form-group">
                    <label for="ticket_id">TICKET ID : <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="ticket_id" name="ticket_id" placeholder="Ticket ID. ..."
                        minlength="15" maxlength="15" required>
                </div>
                <div class="form-btn d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary px-4">Find Ticket</button>
                </div>
            </form>
        </div>
        <div class="col-12 py-4" id="busTicketImg">
            <div class="w-75 mx-auto">
                <div class="w-50 mx-auto">
                    <img src="./Images/Bus_Ticket_1.png" alt="" srcset="" class="w-100">
                </div>
            </div>
        </div>
        <div class="col-12" id="ticket_data">
        </div>
    </div>
</div>

<?php
include('components/footer.php');
?>

<script>

    $(document).ready(function () {
        $("#find_ticket").submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: "POST",
                url: "admin/CRUD/book_ticket/receipt.php",
                data: { "book_ticket_id": formData.get('ticket_id') },
                success: function (data, status) {
                    $("#busTicketImg").addClass("d-none");
                    $("#ticket_data").html(data);
                }
            })
        })
    })

    function closeTicket() {
        $("#ticket_data").empty();
        $("#busTicketImg").removeClass("d-none");
    }

    function goto_booking() {
        window.location.reload();
    }

    async function downloadTicket(book_ticket_id) {
        var download = false;
        for (let time = 0; time < 2; time++) {
            await $.ajax({
                type: "POST",
                url: "admin/CRUD/book_ticket/download_ticket.php",
                data: { "book_ticket_id": book_ticket_id },
                beforeSend: function () {
                    $("#rest_time_loader").toggleClass("d-none");
                },
                success: function (data, status) {
                    $("#rest_time_loader").toggleClass("d-none");
                    if (!download) {
                        var tag = document.createElement('a');
                        tag.href = `admin/CRUD/book_ticket/PDF/${book_ticket_id}.pdf`;
                        tag.download = `${book_ticket_id}.pdf`;
                        tag.click();
                        download = true;
                    }
                }
            })
        }
    }

</script>

<?php
include('components/foot_links.php');
?>