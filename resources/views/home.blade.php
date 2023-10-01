@extends('layouts.layout')

@section('content')

{{-- header part start --}}
<header class="mt-3">
    <div class="container">
        <div class="task_headeing d-flex align-items-center justify-content-between shadow-lg p-3 bg-white">
            <h1>Task Management</h1>
            <div>
                <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-outline-success">Create a Task</button>
            </div>
        </div>
    </div>
</header>
{{-- header part end --}}

@include('components.modal')
{{-- task table start  --}}
<div class="container mt-5">
    <table id="table" class="mt-5">
        <thead>
            <tr>
                <th>SL.</th>
                <th>Title</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="tbody"></tbody>
    </table>
</div>
{{-- task table end --}}

<script>
    getTask();

    // Get task
    async function getTask(){
        let table = $("#table");
        let tbody = $("#tbody");

        showLoader();
        let res = await axios.get("/get-task");
        hideLoader();
        if(res.status === 200){

        table.DataTable().destroy();
        tbody.empty()

        res.data.forEach((element ,index)=> {

            let row = `<tr>
                    <td>${index + 1}</td>
                    <td>${element.title}</td>
                    <td>
                        ${element.completed ? "<span class='text-success'>Completed</span>" : "<span class='text-danger'>Pending</span>"}
                    </td>
                    <td>
                        <button data-id="${element.id}" class="btn btn-sm btn-outline-success editData">Edit</button>
                        <button data-id="${element.id}" class="btn btn-sm btn-outline-danger deleteData">Delete</button>
                    </td>
                </tr>`;

                tbody.append(row)
            
        });
    }
    new DataTable('#table', {
            responsive: true,

        });
    }


    // Delete Task
    $("#tbody").on("click",".deleteData", async function(){

        let id = $(this).data('id')

        if(confirm("Are you want Delete")){
            
            let res = await axios.post("/delete-task",{taskId: id})
            if(res.status === 200 && res.data["status"] === "success"){
                successToast(res.data["message"])
                await getTask();
            }else{
                errorToast(res.data["message"])
            }
        }

    })

    
    //Edit task 
    $("#tbody").on("click",".editData",async function(){
        let id = $(this).data("id")
        
        showLoader();
        let res = await axios.get(`/task-by-id/${id}`)
        hideLoader();
        if( res.status === 200){
            $("#task_id").val(res.data['id'])
            $("#title").val(res.data['title'])
            $("#description").val(res.data['description'])
            $("#submitBtn").html("Update Task")
            $('#exampleModal').modal('show');
        }
        
    })

</script>

    
@endsection