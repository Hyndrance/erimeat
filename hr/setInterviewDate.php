<div class="row">
    <div class="col-lg-12">

        <div class="card-box">
            <div class="row">
                    <div id="calendar"></div>
            </div>  <!-- end row -->
        </div>

        <!-- BEGIN MODAL -->
        <div class="modal fade none-border" id="event-modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add New Event</h4>
                    </div>
                    <div class="modal-body p-b-0"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                        <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Add Category -->
        <div class="modal fade none-border" id="add-category" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add a category</h4>
                    </div>
                    <div class="modal-body p-b-0">
                        <form role="form">
                            <div class="form-group">
                                <label class="control-label">Category Name</label>
                                <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name"/>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Choose Category Color</label>
                                <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                    <option value="success">Success</option>
                                    <option value="danger">Danger</option>
                                    <option value="info">Info</option>
                                    <option value="pink">Pink</option>
                                    <option value="primary">Primary</option>
                                    <option value="warning">Warning</option>
                                    <option value="inverse">Inverse</option>
                                </select>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MODAL -->
    </div>
    <!-- end col-12 -->
</div> <!-- end row -->
