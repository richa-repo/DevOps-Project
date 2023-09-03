<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="../css/starrr.css" />

<style>
    #feedbackModal.modal.custom .modal-dialog {
    width: 50%;
    position: fixed;
    bottom: 0;
    right: 0;
    margin: 0;
}
</style>

<div class="modal custom" id="feedbackModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Rate your feedback</h3>
                <button type="button" class="close" data-dismiss="modal">
                    <span>×</span>
                </button>
            </div>
            <div class="modal-body">
                    <form onsubmit="return saveFeedback(this);">
                    <div class='starrr'></div>

                    <div class="form-group" style="margin-top: 10px;">
                    <input type="text" name="feedback" class="form-control" />
                    </div>

                    <input type="submit" class="btn btn-primary pull-right" value="Submit" />
                    </form>
            </div>
        </div>
    </div>
</div>
<script>
    var ratings = 0;

window.addEventListener("load", function () {
    $(".starrr").starrr().on("starrr:change", function (event, value) {
        ratings = value;
    });

    if (localStorage.getItem("feedback_1") == null) {
        $("#feedbackModal").modal("show").on('hidden.bs.modal', function (e) {
            localStorage.setItem("feedback_1", "1");
        });
    }
});
function saveFeedback(form) {
    var ajax = new XMLHttpRequest();
    ajax.open("POST", "save-feedback.php", true);
    ajax.onreadystatechange = function () {
        if (this.readyState == 4) {
            if (this.status == 200) {
                console.log(this.responseText);
                document.querySelector("#feedbackModal .modal-body").innerHTML = "Thank you for your feedback.";
                localStorage.setItem("feedback_1", "1");
            }
            if (this.status == 500) {
                console.log(this.responseText);
            }
        }
    };
    var formData = new FormData(form);
    formData.append("ratings", ratings);
    ajax.send(formData);
    return false;
}

</script>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/starrr.js"></script>