import ClassInterface from "./ClassInterface.js";

export default class Worker extends ClassInterface{
    headers = ["Id", "Department", "First Name", "Last Name", "Address", "Email", "Phone", "", ""];
    $workers_form = $('#workers_form');

    constructor(root, matches = null){
        super();
        this.root = root;
        this.matches = matches;
        this.addSubmitEvent();
    }

    onLoad(){
        $.ajax({
            method: 'GET',
            url: '/workers/show',
            success: res => {
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
            html += `<td>${dt.department_name}</td>`;
            html += `<td>${dt.first_name}</td>`;
            html += `<td>${dt.last_name}</td>`;
            html += `<td>${dt.address}</td>`;
            html += `<td>${dt.email}</td>`;
            html += `<td>${dt.phone}</td>`;
            html += `<td><button data-toggle="modal" data-target="#WorkersModal" class="btn btn-primary worker-btn" data-id="${dt.id}" id="update_worker">Update</button></td>`;
            html += `<td><button class="btn btn-danger worker-btn" data-id="${dt.id}" id="delete_worker">Delete</button></td>`;
            html += `</tr>`;
        });

        this.root.html(html);
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
                    this.deleteCustomer(worker_id);
                    break;               
            }
        });
    }

    addSubmitEvent(){
        $('#submit_workers').on('click', (e) => {

            const form_data = $("#workers_form").serializeArray();

            const worker = {};
            form_data.forEach(input => {
                worker[input.name] = input.value
            });

            const url = worker.id == "" ? "/workers/create" : `/workers/${worker.id}/update`; 
            delete worker.id;

            $.post({
                data: worker,
                url:url,
                success: res => {
                    const result = JSON.parse(res);
                    
                    if(result.success)
                        this.onLoad();
                        
                    alert(result.message);
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
    }

    deleteCustomer(id){
        if(confirm('Are you sure you want to delete this customer?')){
            $.ajax({
                method: 'GET',
                url:`/workers/${id}/delete`,
                success: rec => {
                    this.onLoad();
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