<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Create Task</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         <form id="form">
            <input class="d-none" type="text" id="task_id">
            <div class="mb-3">
                <label for="title">Title</label>
                <input class="form-control" type="text" name="title" id="title" placeholder="write a title...">
            </div>
            <div class="mb-3">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="5"></textarea>
            </div>
         </form>
        </div>
        <div class="modal-footer">
          <button id="closeBtn" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button onclick="handleSubmit()" id="submitBtn" type="button" class="btn btn-primary">Add Task</button>
        </div>
      </div>
    </div>
  </div>

  <script>

    function formReset(){
            $("#form")[0].reset();
            $("#submitBtn").html("Add Task")
        }

        async function handleSubmit(){
                let task_id = $("#task_id").val()
                let title = $("#title").val()                
                let description = $("#description").val()

                if(title === ""){
                errorToast("Please enter Task Title")
                }else{
                showLoader();
                let res = await axios.post("/create-task",{title: title,task_id: task_id,description: description})
                hideLoader();

                if(res.status === 200 && res.data['status'] === "success"){
                    $("#cat_id").val("")
                    document.getElementById("closeBtn").click()
                    formReset()
                    successToast(res.data['message'])
                    await getTask();

                }else{
                    document.getElementById("closeBtn").click()
                    formReset()
                    errorToast(res.data['message'])
                }
                }
} 
  </script>