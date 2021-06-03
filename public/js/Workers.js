
class Customers{
    headers = ["Id", "First Name", "Last Name", "Address", "Email", "Phone", "", ""];
    $workers_form = $('#workers_form');

    loadCustomers(){
        $.ajax({
            method: 'GET',
            url: '/workers/show',
            success: res => {
                console.log(typeof res);
                this.workers = JSON.parse(res);
                this.renderTable(this.workers);
                this.addButtonsEvents();
            },
            error: err => {
                console.log(err);
            }
        }) 
    }

    renderTable(data){
        let html = "<table class='table'>";
        data.forEach(dt => {
            html += `<tr>`;
            html += `<td>${dt.id}</td>`;
            html += `<td>${dt.first_name}</td>`;
            html += `<td>${dt.last_name}</td>`;
            html += `<td>${dt.address}</td>`;
            html += `<td>${dt.email}</td>`;
            html += `<td>${dt.phone}</td>`;
            html += `<td><button data-toggle="modal" data-target="#WorkersModal" class="btn btn-primary worker-btn" data-id="${dt.id}" id="update_worker">Update</button></td>`;
            html += `<td><button class="btn btn-danger worker-btn" data-id="${dt.id}" id="delete_worker">Delete</button></td>`;
            html += `</tr>`;
        });

        $root.html(html);
    }

    addButtonsEvents(){
        $('body').find(".worker-btn").on('click', (e)=>{
            const $btn =$(e.target);
            const worker_id = $btn.data('id');
            const type = $btn.attr('id');

            switch(type){
                case 'update_worker':
                    this.updateCustomer(type, worker_id);
                    break;
                case 'delete_worker':
                    this.deleteCustomer();
                    this.loadCustomers();
                    break;               
            }
        });
        $('#submit_workers').on('click', (e) => {

            const form_data = $("#workers_form").serializeArray();

            const worker = {};
            form_data.forEach(input => {
                worker[input.name] = input.value
            });

            const url = worker.id == "" ? "/workers/create" : `/workers/${worker.id}/update`; 
            const message = worker.id == "" ? "worker created" : "worker updated";
            delete worker.id;

            $.post({
                data: worker,
                url:url,
                success: rec => {
                    this.loadCustomers();
                    alert(message);
                },
                error: err => {
                    alert("Something went wrong")
                    console.log(err);
                }
            });

            $('#WorkersModal').modal('hide');
        });
    }

    updateCustomer(type, id){
        let worker = null;
        if(type == 'update_worker'){
            worker = this.workers.find( worker => {
                return worker.id == id;           
            });

            this.$workers_form.find('input[name=first_name]').val(worker.first_name);
            this.$workers_form.find('input[name=last_name]').val(worker.last_name);
            this.$workers_form.find('input[name=address]').val(worker.address);
            this.$workers_form.find('input[name=phone]').val(worker.phone);
            this.$workers_form.find('input[name=email]').val(worker.email);
            this.$workers_form.find('input[name=id]').val(worker.id);
        }
        // $('#WorkersModal').modal('show');
    }

    deleteCustomer(){
        if(confirm('Are you sure you want to delete this customer?')){
            $.ajax({
                method: 'GET',
                url:'/customers/${id}/delete',
                success: rec => {
                    alert("Customer deleted");
                },
                error: err => {
                    alert("Something went wrong")
                    console.log(err);
                }
            });
        }
    }

}