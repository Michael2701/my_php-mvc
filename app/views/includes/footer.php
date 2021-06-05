    <div class="modal fade" id="WorkersModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Large Modal</h4>
        </div>
        <div class="modal-body">
            <form id="workers_form">
                <div class="row">
                    <div class="col-md-6">
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <label workers="">First Name</label>
                            <input class="form-control" type="text" name="first_name">
                        </div>
                        <div class="form-group">
                            <label for="">Last Name</label>
                            <input class="form-control" type="text" name="last_name">
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <input class="form-control" type="text" name="address">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input class="form-control" type="text" name="email">
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input class="form-control" type="text" name="phone">
                        </div>
                        <div class="form-group" >
                            <label for="">Departments</label>
                            <select name="department_id" id="departments">
                                <option value="">Choose Departmen</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" id="submit_workers" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
    </div>    
        
    
    <!-- <script 
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" 
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" 
        crossorigin="anonymous" 
        referrerpolicy="no-referrer">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" 
            crossorigin="anonymous"></script> -->

    <script type="module" src="<?="./js/script.js"?>"></script>
</body>
</html>