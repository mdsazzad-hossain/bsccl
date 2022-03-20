<div class="modal fade" id="user-add-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mr-5">User Form</h4>
                <p class="bulk-tag">If you import bulk user data <a onclick="bulkModal()"
                        href="javascript:void(0)">Click Here</a></p>
                <p class="single-tag">If you add single user data <a onclick="singleUserModal()"
                        href="javascript:void(0)">Click Here</a></p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-primary">
                    <form id="add-user">
                        @csrf
                        <div class="card-body user-modal animate__animated">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Enter name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" name="email" class="form-control" id="email"
                                            placeholder="Enter email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Phone Number</label>
                                        <input type="number" name="phone" class="form-control" id="phn-number"
                                            placeholder="Enter phone number">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" name="password" class="form-control"
                                            id="exampleInputPassword1" placeholder="Enter Password">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <input type="text" name="address" class="form-control" id="address"
                                    placeholder="Enter your address">
                            </div>
                        </div>
                        <div class="card-body bulk-modal animate__animated">
                            <div class="row">
                                <div class="form-group width">
                                    <label for="exampleInputFile">File input</label>
                                    <small class="color-red">Only (.csv, .xls, .xlsx) file accepeted</small>
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" accept=".csv,.xls,.xlsx" class="custom-file-input"
                                                id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function bulkModal() {
        $(".user-modal").removeClass('animate__backInLeft');
        $(".user-modal").addClass('animate__backOutLeft');
        $(".user-modal").css("display", "none");
        $(".bulk-modal").removeClass('animate__backOutRight');
        $(".bulk-modal").addClass('animate__backInRight');
        $(".bulk-modal").css("display", "block");
        $(".bulk-tag").css('display', 'none')
        $(".single-tag").css('display', 'block')
    }

    function singleUserModal() {
        $(".user-modal").css("display", "block");
        $(".user-modal").removeClass('animate__backOutLeft');
        $(".user-modal").addClass('animate__backInLeft');
        $(".bulk-modal").removeClass('animate__backInRight');
        $(".bulk-modal").addClass('animate__backOutRight');
        $(".bulk-modal").css("display", "none");
        $(".bulk-tag").css('display', 'block')
        $(".single-tag").css('display', 'none')
    }
</script>
<style>
    .bulk-tag {
        margin-left: 16%;
        margin-bottom: 0;
        margin-top: 9px;
    }

    .single-tag {
        margin-left: 16%;
        margin-bottom: 0;
        margin-top: 9px;
        display: none;
    }

    .bulk-modal {
        display: none;
    }

    .width {
        width: 100%;
    }

</style>
