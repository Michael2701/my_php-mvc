export const tmpl = `
    <table class="table table-responsive">
        <thead>    
            <tr>
                <td>{{titles.id}}</td>
                <td>{{titles.name}}</td>
                <td>{{titles.desc}}</td>
                <td></td>
                <td></td>
            </tr>
        <thead>
        <tbody>
            {{#departments}}
                <tr>
                    <td> {{id}} </td>
                    <td> {{department_name}}
                    <td> {{department_description}} </td>
                    <td> <button class="btn btn-primary">Update</button> </td>
                    <td> <button class="btn btn-danger">Delete</button> </td>
                </tr>  
            {{/departments}}
        <tbody>
    </table>
`;
